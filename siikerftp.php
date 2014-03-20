<?php

define("filespath","files/");

$id='';
if (isset($_GET["id"])) {
 $id=$_GET["id"];
}
$req='';
if (isset($_GET["req"])) {
 $req=$_GET["req"];
}
$par='';
if (isset($_GET["par"])) {
 $par=$_GET["par"];
}

if (isset($_POST["id"])) {
 $id=$_POST["id"];
}
if (isset($_POST["req"])) {
 $req=$_POST["req"];
}

$contenttype="text/plain";
$content="";


function write_log($dir,$text) {
 $handle=fopen("log.txt","a");
 $log="";
 $separator=" ## ";
 $log.=date('Y.m.d. H:i:s').$separator;
 $log.=gethostbyaddr(getenv("REMOTE_ADDR")).$separator;
 $log.=getenv("REMOTE_ADDR").$separator;
 $log.=$dir;
 $log.=$text;
 $log.="\n";
 fwrite($handle,$log);
 fclose($handle);
}

function auth($id) {
 $result=($id="siikerftp");
 if (!$result)
 {$content="AUTH ERROR";}
 return $result;
}


$excludedfiles=array("index.html",
  "index.php",
  "index.htm",
$_SERVER['PHP_SELF']);
$excludedextensions=array("php");

write_log("Q".$id.": ",$req." ".$par);

$filename=basename($par);
switch ($req) {

 case "HELLO":
  $content="HELLO";
  break;

 case "DELETEFILE":
  if (auth($id)) {
   if ($filename!='') {
    clearstatcache();
    $diry=dir(filespath);
    $filearr=Array();
    $path_parts=pathinfo($filename);
    while ($entry=$diry->read()) {
     $fname=basename($entry);
     if (($entry!=".") && ($entry!="..") &&
     (substr($fname,0,strlen($path_parts['filename']))==$path_parts['filename']) &&
     (file_exists(filespath.$fname)) &&
     (!in_array($filename,$excludedfiles)))
     {$filearr[]=$fname;}
    }
    $jo=true;
    foreach ($filearr as $fname) {
     $jo=$jo && unlink(filespath.$fname);
    }
   }
   else
   {$jo=false;}
   if ($jo)
   {$content="OK";}
   else
   {$content="ERROR";}
  }
  break;

 case "DELETEALL":
  if (auth($id)) {
   $diry=dir(filespath);
   $filearr=Array();
   while ($entry=$diry->read()) {
    $filename=basename($entry);
    if (($entry!=".") && ($entry!="..") &&
    (!in_array($filename,$excludedfiles)))
    {$filearr[]=$filename;}
   }
   $jo=true;
   foreach ($filearr as $fname) {
    $jo=$jo && unlink(filespath.$fname);
   }
   if ($jo)
   {$content="OK";}
   else
   {$content="ERROR";}
  }
  break;

 case "UPLOAD":
  if (auth($id)) {
   $filename=$_FILES["filename"]["name"];
   $path_parts=pathinfo($filename);
   $extension=$path_parts["extension"];
   if ((!in_array($filename,$excludedfiles)) &&
   (!in_array($extension,$excludedextensions))) {
    if (move_uploaded_file($_FILES["filename"]["tmp_name"],filespath.basename($_FILES["filename"]["name"])))
    {$content="OK";}
    else
    {$content="ERROR";}
   }
  }
  break;

 case "GETVER":
  $content=file_get_contents("ws_version.txt");
  break;

 case "UPDATE":

  if (!file_exists("ws_version.txt"))
  {$content="NOT INSTALLED";}
  else
  {$content='OK';}
  break;

 case "EXTRACT":
  $content="FILE UP OK";
  break;

}

Header("Content-Type: ".$contenttype);
echo $content;
write_log("A".$id.": ",$content);

?>
