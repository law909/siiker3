<?php
$SITEVARS = parse_ini_file("config.ini", true);

define("DBHost", $SITEVARS['config']['db.host'].':'.$SITEVARS['config']['db.port']);
define("DBUser", $SITEVARS['config']['db.username']);
define("DBPass", $SITEVARS['config']['db.password']);
define("DB", $SITEVARS['config']['db.dbname']);
define("DBLog", 0);

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



if ($_GET['code'] != "909gC0F8i3") {
	exit;
}
else {
	if (is_numeric($_GET['tol'])) {
		$i = 0;    //számláló
		$ok = DBCommand('SELECT t.kod,tn.nev,tn.nev2,tn.nev3,tn.nev4,tn.nev5,tn.rovidleiras,'.
			'tn.leiras,tn.weboldalcim,t.permalink '.
			'FROM termek t '.
			'INNER JOIN termeknev tn ON (t.kod=tn.termek) AND (tn.nyelv="HU")'.
			'WHERE (t.lathato=1) ORDER BY t.kod LIMIT '.$_GET['tol'].',100');
		while ($termek = DBFetch($DBRS)) {
			$URL = 'http://ventusmagyarorszag.hu/index.php?com=termek&par='.$termek['kod'];    //Teljes elérési úttal (http:// -vel kezdve)
			$img_URL = $termek['URL'];    //Teljes elérési úttal (http:// -vel kezdve)
			if ($i > 0) {
				echo '<';    //termék tagoló karakter
			}
			echo str_replace('<','(',str_replace('>',')',strip_tags($termek['nev']))).'>'; // munkakör
			echo str_replace('<','(',str_replace('>',')',strip_tags($termek['leiras']))).'>'; // leírás
			echo str_replace('<','(',str_replace('>',')',strip_tags(''))).'>'; // ár
			echo str_replace('<','(',str_replace('>',')',strip_tags($URL))).'>'; // adatlap URL
			echo str_replace('<','(',str_replace('>',')',strip_tags(''))); // termék kép URL
			$i++;
		}
		echo '<'.$i;    //termékek száma
		DBClose();
	}
}
?>