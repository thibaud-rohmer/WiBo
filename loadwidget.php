<?php

require_once('./inc/php/widgets.php');
if(!isset($_GET['id']))
	die();


$id=$_GET['id'];
$wlist=parse_ini_file('conf.ini',true);
$wconf=$wlist[$id];


$inf="load";
if(isset($_GET['inf']))
	$inf=$_GET['inf'];

if($inf=="load"){
	echo $opt;
	include("./widgets/".$wconf['widget']."/main.php");
	echo '<script type="text/javascript" src="inc/js/wibojs.js"></script>';
}elseif($inf=="conf"){
	display_conf($wconf);
}
?>
