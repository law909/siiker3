<?php
error_reporting(0);

define("DBHost", "localhost:3306");
define("DBUser", "siikerreg");
define("DBPass", "siiKerreg909");
define("DB", "siikerregistration");

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


$contenttype = "text/plain";
$content = "";
$logcontent = $content;

$id = '';
$req = '';
$swname='';
$swversion='';
$host='';
$db='';
$nev='';
$cim='';
$asz='';
$a11='';
$a12='';

if (isset($_GET['req'])) {
	$swname = $_GET['req'];
}
if (isset($_GET['swname'])) {
	$swname = $_GET['swname'];
}
if (isset($_GET['swversion'])) {
	$swversion = $_GET['swversion'];
}
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
if (isset($_GET['host'])) {
	$host = $_GET['host'];
}
if (isset($_GET['db'])) {
	$db = $_GET['db'];
}
if (isset($_GET['nev'])) {
	$nev = $_GET['nev'];
}
if (isset($_GET['cim'])) {
	$cim = $_GET['cim'];
}
if (isset($_GET['asz'])) {
	$asz = $_GET['asz'];
}
if (isset($_GET['a11'])) {
	$a11 = $_GET['a11'];
}
if (isset($_GET['a12'])) {
	$a12 = $_GET['a12'];
}

switch ($req) {
	case 'info':
		$content = 'OK';
		DBCommand('INSERT INTO siikerinfo (kod,swname,swversion,host,db,nev,cim,asz,a11,a12) VALUES '.
				'("'.$id.'","'.$swname.'","'.$swversion.'","'.$host.'","'.$db.'","'.$nev.'","'.$cim.'","'.$asz.'","'.$a11.'","'.$a12.'")');
		break;
}

header("Content-Type: ".$contenttype);
echo $content;
write_log("A".$id.": ", $logcontent);