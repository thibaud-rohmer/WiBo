<?php

if(!isset($_GET['id']))
	die();

$id=$_GET['id'];

$wlist=parse_ini_file('conf.ini',true);
$wconf=$wlist[$id];

include("./widgets/".$wconf['widget']."/main.php");

?>
