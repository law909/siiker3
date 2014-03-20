<?php
$SITEVARS = parse_ini_file("config.ini", true);

define("DBHost", $SITEVARS['config']['db.host'].':'.$SITEVARS['config']['db.port']);
define("DBUser", $SITEVARS['config']['db.username']);
define("DBPass", $SITEVARS['config']['db.password']);
define("DB", $SITEVARS['config']['db.dbname']);
define("DBLog", $SITEVARS['config']['sqldebug']);

define("temppath", "");

$DBConnection = null;
$DBRS = null;
$DBSelected = null;
$DBNR = 0;
$DBT = 0;

$hostnev = gethostbyaddr(getenv("REMOTE_ADDR"));
$hostcim = getenv("REMOTE_ADDR");


function write_log($dir, $text) {
	global $swname,$swversion,$hostnev,$hostcim;
	$handle = fopen("log.txt", "a");
	$log = "";
	$separator = " ## ";
	$log .= date('Y.m.d. H:i:s').$separator;
	$log .= $hostnev.$separator;
	$log .= $hostcim.$separator;
	$log .= $swname.$separator;
	$log .= $swversion.$separator;
	$log .= $dir;
	$log .= $text;
	$log .= "\n";
	fwrite($handle, $log);
	fclose($handle);
}
function DBCommand($sql) {
	global $DBConnection,$DBRS,$DBSelected,$id,$DB_log,$DBNR,$DBT;
	if ($sql != '') {
		$DBConnection = mysql_connect(DBHost, DBUser, DBPass);
		$DBSelected = mysql_select_db(DB);
		$DBRS = mysql_query($sql, $DBConnection);
		if (is_resource($DBRS)) {
			$DBNR = mysql_num_rows($DBRS);
		} else {
			$DBNR = 0;
		}
		if (DBLog == 1)
			write_log("S".$id.": ", $sql);
		if (!((boolean)($DBConnection) && (boolean)($DBSelected) && (boolean)($DBRS))) {
			write_log("P".$id.": ", "DB ERROR: ".mysql_errno()."-".mysql_error());
		}
		return ((boolean)($DBConnection) && (boolean)($DBSelected) && (boolean)($DBRS));
	} else {
		return true;
	}
}
function DBFetch($dbresult) {
	global $DBT;
	if ($dbresult) {
		return $DBT = mysql_fetch_array($dbresult, MYSQL_ASSOC);
	} else {
		return false;
	}
}
function DBClose() {
	global $DBConnection;
	if ($DBConnection)
		mysql_close($DBConnection);
}

function ReplaceTableName($tname) {
	$table_replace = array('kontakt'=>'partner');
	if (array_key_exists((string) $tname, $table_replace)) {
		return $table_replace[(string) $tname];
	} else {
		return $tname;
	}
}
function GetFieldValue($tname, $rec, $mezo) {
	global $DBRS;
	$result = '';
	switch ($mezo['name']) {
		case 'syncstatus':
			$result = '0';
			break;
		default:
			if (($tname == 'partnerreferencia') && ($mezo['name'] == 'partner')) {
				$fa = simplexml_load_string($rec->asXML());
				$sid = $fa->xpath("//field[@name='partnersync_id']");
				foreach ($sid as $f) {
					DBCommand('SELECT kod FROM partner WHERE sync_id="'.(string) $f.'"');
					$res = DBFetch($DBRS);
					$result = $res['kod'];
				}
			} else {
				if (($tname == 'partnerfiles') && ($mezo['name'] == 'partner')) {
					$fa = simplexml_load_string($rec->asXML());
					$sid = $fa->xpath("//field[@name='partnersync_id']");
					foreach ($sid as $f) {
						DBCommand('SELECT kod FROM partner WHERE sync_id="'.(string) $f.'"');
						$res = DBFetch($DBRS);
						$result = $res['kod'];
					}
				} else {
					if ((string) $mezo == '') {
						$result = 'NULL';
					} else {
						if ($mezo['enclose'] == 'yes') {
							$result = "'".addslashes(str_replace('&apos;',"'",html_entity_decode($mezo)))."'";
						} else {
							$result = $mezo;
						}
					}
				}
			}
			break;
	}
	return $result;
}

function RecordExists($tablename, $rec) {
	global $DBRS;
	if ($rec->primarykey['enclose'] == 'yes') {
		$ok = DBCommand('SELECT COUNT(*) AS db FROM '.$tablename.' WHERE '.$rec->primarykey['field'].'="'.$rec->primarykey.'"');
	} else {
		$ok = DBCommand('SELECT COUNT(*) AS db FROM '.$tablename.' WHERE '.$rec->primarykey['field'].'='.$rec->primarykey);
	}
	$sor = DBFetch($DBRS);
	if ($ok && $sor) {
		return ($sor['db'] > 0);
	} else {
		return false;
	}
}
function GetFields($tablename) {
	global $DBRS;
	$arr = array();
	$ok = DBCommand('SHOW COLUMNS FROM '.$tablename);
	$sor = DBFetch($DBRS);
	while ($sor) {
		$arr[] = $sor['Field'];
		$sor = DBFetch($DBRS);
	}
	return $arr;
}
function CreateInsert($tablename, $rec, $mezoarr) {
	$sqlmondat = 'REPLACE INTO '.$tablename.' (';
	foreach ($rec->field as $field) {
		if (in_array($field['name'], $mezoarr)) {
			$sqlmondat .= $field['name'].',';
		}
	}
	$sqlmondat = rtrim($sqlmondat, ',').') VALUES (';
	foreach ($rec->field as $field) {
		if (in_array($field['name'], $mezoarr)) {
			$sqlmondat .= GetFieldValue($tablename, $rec, $field).',';
		}
	}
	$sqlmondat = rtrim($sqlmondat, ',').')';
	return $sqlmondat;
}
function CreateUpdate($tablename, $rec, $mezoarr) {
	$sqlmondat = 'UPDATE '.$tablename.' SET ';
	foreach ($rec->field as $field) {
		if (in_array($field['name'], $mezoarr)) {
			$sqlmondat .= $field['name'].'='.GetFieldValue($tablename, $rec, $field).',';
		}
	}
	if ($rec->primarykey['enclose'] == 'yes') {
		$sqlmondat = rtrim($sqlmondat, ',').' WHERE '.$rec->primarykey['field'].'="'.$rec->primarykey.'"';
	} else {
		$sqlmondat = rtrim($sqlmondat, ',').' WHERE '.$rec->primarykey['field'].'='.$rec->primarykey;
	}
	return $sqlmondat;
}
function CreateDelete($tablename, $rec) {
	$sqlmondat = '';
	if ($tablename <> '') {
		if ($rec->primarykey['enclose'] == 'yes') {
			$sqlmondat = 'DELETE FROM '.$tablename.' WHERE '.$rec->primarykey['field'].'="'.$rec->primarykey.'"';
		} else {
			$sqlmondat = 'DELETE FROM '.$tablename.' WHERE '.$rec->primarykey['field'].'='.$rec->primarykey;
		}
	}
	return $sqlmondat;
}
function CreatePartnerXML(&$pxml, $mit) {
	global $DBRS;
	switch ($mit) {
		case 1:
			$tname = 'partner';
			break;
		case 2:
			$tname = 'kontakt';
			break;
	}
	$partner = $pxml->addChild('table', '');
	$partner->addAttribute('name', $tname);
	DBCommand("SELECT * FROM partner WHERE (syncstatus>0) AND (partnertipus=$mit)");
	while ($sor = DBFetch($DBRS)) {
		$rekord = $partner->addChild('rekord');
		switch ($sor['syncstatus']) {
			case 1:
				$rekord->addAttribute('command', 'new');
				break;
			case 2:
				$rekord->addAttribute('command', 'edit');
				break;
			case 3:
				$rekord->addAttribute('command', 'del');
				break;
		}
		$primary = $rekord->addChild('primarykey', htmlentities($sor['sync_id']));
		$primary->addAttribute('field', 'sync_id');
		$primary->addAttribute('enclose', 'yes');
		foreach ($sor as $mezonev=>$tartalom) {
			if (($mezonev <> 'kod') && (!is_null($tartalom))) {
				$mezo = $rekord->addChild('field', htmlentities($tartalom));
				$mezo->addAttribute('name', $mezonev);
			}
		}
	}
}
function CreateBizFejXML(&$pxml) {
	global $DBRS;
	$fejmezok = array(
        'kod'=>'kod',
        'user_kod'=>'userkod',
        'mikor'=>'kelt',
        'szam_irszam'=>'szlairszam',
        'szam_varos'=>'szlavaros',
        'szam_utca'=>'szlautca',
        'szal_irszam'=>'szallirszam',
        'szal_varos'=>'szallvaros',
        'szal_utca'=>'szallutca',
        'osszeg'=>'bruttohuf',
        'valid'=>'valid',
        'megjegyzes'=>'megjegyzes',
        'szam_cegnev'=>'szlanev',
        'szal_cegnev'=>'szallnev',
        'szam_adoszam'=>'szlaadoszam',
        'bizonylatszam'=>'bizonylat',
        'cegkod'=>'partner',
        'statuskod'=>'statuskod',
        'lemondva'=>'lemondva',
        'valuta_kod'=>'rendszervalutanem',
        'igenyelt_hatarido'=>'hatarido',
        'nettoosszeg'=>'nettohuf',
        'v_osszeg'=>'brutto',
        'v_nettoosszeg'=>'netto',
        'idegenvaluta_kod'=>'valutanem',
        'fizmod_kod'=>'fizmod');
	$tetelmezok = array(
        'kod'=>'kod',
        'megrendeles_kod'=>'megrendeles',
        'termek_kod'=>'termek',
        'mennyiseg'=>'mennyiseg',
        'ar'=>'bruttoegysarhuf',
        'sorosszeg'=>'bruttohuf',
        'megjegyzes'=>'megjegyzes',
        'valuta_kod'=>'rendszervalutanem',
        'me'=>'me',
        'lemondva'=>'lemondva',
        'statuskod'=>'statuskod',
        'szamlazott'=>'szamlazott',
        'szallitott'=>'szallitott',
        'nettoar'=>'nettoegysarhuf',
        'v_ar'=>'bruttoegysar',
        'v_nettoar'=>'nettoegysar',
        'nettosorosszeg'=>'nettohuf',
        'v_sorosszeg'=>'brutto',
        'v_nettosorosszeg'=>'netto',
        'idegenvaluta_kod'=>'valutanem');
	DBCommand('SELECT * FROM web_ws_megrendeles WHERE (bizonylatszam="") OR (bizonylatszam IS NULL)');
	$fejRS = $DBRS;
	while ($fej = DBFetch($fejRS)) {
		$megrendNode = $pxml->addChild('megrendeles');
		$primary = $megrendNode->addChild('primarykey', $fej['kod']);
		$primary->addAttribute('field', 'kod');
		foreach ($fej as $mezonev=>$tartalom) {
			switch ($mezonev) {
				case 'cegkod':
				case 'user_kod':
					DBCommand('SELECT sync_id FROM partner WHERE kod='.$tartalom);
					$syncid = DBFetch($DBRS);
					$tartalom = $syncid['sync_id'];
					break;
			}
			$mezo = $megrendNode->addChild('field', htmlentities($tartalom));
			$mezo->addAttribute('name', $fejmezok[$mezonev]);
		}
		DBCommand('SELECT * FROM web_ws_megrendeltek WHERE (megrendeles_kod='.$fej['kod'].')');
		$tetelRS = $DBRS;
		while ($tetel = DBFetch($tetelRS)) {
			$tetelNode = $megrendNode->addChild('tetel');
			$primary = $tetelNode->addChild('primarykey', $tetel['kod']);
			$primary->addAttribute('field', 'kod');
			foreach ($tetel as $mezonev=>$tartalom) {
				$mezo = $tetelNode->addChild('field', htmlentities($tartalom));
				$mezo->addAttribute('name', $tetelmezok[$mezonev]);
			}
		}
	}
}

$contenttype = "text/plain";
$content = "";
$logcontent = $content;

$id = '';
$par = '';
$req = '';

if (isset($_GET["id"])) {
	$id = $_GET["id"];
}
if (isset($_GET["req"])) {
	$req = $_GET["req"];
}
if (isset($_GET["par"])) {
	$par = $_GET["par"];
}

if (isset($_POST["id"])) {
	$id = $_POST["id"];
}

if (isset($_POST["req"])) {
	$req = $_POST["req"];
}


switch ($req) {
	case 'HELLO':
		write_log("Q".$id.": ", $req." ".$par);
		$content = 'HELLO';
		$logcontent = $content;
		break;
	case "STARTSTOP":
		switch ($par) {
			case "START":
				if (DBCommand("DELETE FROM parameterek WHERE par='WEB_kikaplcsolva'")) {
					$content = 'OK';
				} else {
					$content = 'ERROR';
				}
				break;
			case "STOP":
				$content = 'ERROR';
				if (DBCommand("DELETE FROM parameterek WHERE par='WEB_kikaplcsolva'")) {
					if (DBCommand("INSERT INTO parameterek (par,ertek) VALUES ('WEB_kikaplcsolva','1')")) {
						$content = 'OK';
					}
				}
				break;
			default:
				break;
		}
		$logcontent = $content;
		break;
	case 'GETRUNNINGSZINKRON':
		write_log("Q".$id.": ", $req." ".$par);
		$ok = DBCommand('SELECT ertek FROM parameterek WHERE par="webszinkron"');
		$sor = DBFetch($DBRS);
		if ($ok) {
			if ($sor) {
				$content = $sor['ertek'];
			} else {
				$content = '';
			}
		}
		$logcontent = $content;
		break;
	case 'STARTSZINKRON':
		write_log("Q".$id.": ", $req." ".$par);
		$ok = DBCommand('DELETE FROM parameterek WHERE par="webszinkron"');
		$ok = DBCommand('INSERT INTO parameterek (par,ertek) VALUES ("webszinkron","'.$par.'")');
		if ($ok) {
			$content = 'OK';
		}
		$logcontent = $content;
		break;
	case 'STOPSZINKRON':
		write_log("Q".$id.": ", $req." ".$par);
		$ok = DBCommand('DELETE FROM parameterek WHERE par="webszinkron"');
		if ($ok) {
			$content = 'OK';
		}
		$logcontent = $content;
		break;
	case 'SZINKRON':
		$content = 'OK';
		$mehet = true;
		if (file_exists(temppath."szinkron.xml")) {
			$mehet = unlink(temppath."szinkron.xml");
		}
		if ($mehet) {
			if (move_uploaded_file($_FILES["filename"]["tmp_name"], temppath."szinkron.xml")) {
				$xml = simplexml_load_file(temppath."szinkron.xml");
				$ok = true;
				foreach ($xml->truncate as $truncate) {
					$tablanev = ReplaceTableName($truncate['table']);
					write_log("Q".$id.": ", "TRUNCATE ".$tablanev);
					$ok = DBCommand('DELETE FROM '.$tablanev);
				}
				if ($ok) {
					foreach ($xml->table as $table) {
						$tablanev = ReplaceTableName($table['name']);
						write_log("Q".$id.": ", 'SZINKRON '.$tablanev);
						$letezomezok = GetFields($tablanev);
						foreach ($table->record as $rekord) {
							switch ((string) $rekord['command']) {
								case 'none':
									$sqlmondat = '';
									break;
								case 'new':
								case 'edit':
									if ($table['searchrecord'] == 'yes') {
										if (RecordExists($tablanev, $rekord)) {
											$sqlmondat = CreateUpdate($tablanev, $rekord, $letezomezok);
										} else {
											$sqlmondat = CreateInsert($tablanev, $rekord, $letezomezok);
										}
									} else {
										// a CreateInsert REPLACE INTO-t csinal, MySQL specific
										$sqlmondat = CreateInsert($tablanev, $rekord, $letezomezok);
									}
									break;
								case 'del':
									$sqlmondat = CreateDelete($tablanev, $rekord);
									break;
							}
							$ok = DBCommand($sqlmondat);
						}
					}
				}
				if (!$ok) {
					$content = 'ERROR: sync error (db)';
				}
				if (file_exists(temppath."szinkron.xml")) {
					unlink(temppath."szinkron.xml");
				}
			} else {
				$content = "ERROR: can't find uploaded file";
			}
		} else {
			$content = "ERROR: can't delete sync file";
		}
		$logcontent = $content;
		break;
	case 'GETPARTNER':
		write_log('Q'.$id.': ', $req);
		$content = 'OK';
		$logcontent = $content;
		DBCommand('SELECT COUNT(*) AS db FROM partner WHERE syncstatus>0');
		$sor = DBFetch($DBRS);
		if ($sor['db'] > 0) {
			$repxml = new SimpleXMLElement('<siikere></siikere>');
			CreatePartnerXML($repxml, 1);
			CreatePartnerXML($repxml, 2);
			$content = $repxml->asXML();
			DBCommand('UPDATE partner SET syncstatus=0');
		}
		break;
	case 'GETMEGRENDELES':
		write_log('Q'.$id.': ', $req);
		$content = 'OK';
		$logcontent = $content;
		DBCommand('SELECT COUNT(*) AS db FROM web_ws_megrendeles WHERE (bizonylatszam="") OR (bizonylatszam IS NULL)');
		$sor = DBFetch($DBRS);
		if ($sor['db'] > 0) {
			$repxml = new SimpleXMLElement('<siikere></siikere>');
			CreateBizFejXML($repxml);
			$content = $repxml->asXML();
		}
		break;
}

header("Content-Type: ".$contenttype);
echo $content;
write_log("A".$id.": ", $logcontent);

?>
