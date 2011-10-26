<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<?php
$conf=parse_ini_file("./conf.ini",true);
?>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $conf['page_title']; ?></title>
	<meta name="author" content="Thibaud Rohmer">
	<link rel="stylesheet" href="inc/style/<?php echo $conf['design']['style']; ?>.css" type="text/css" media="screen" charset="utf-8">
	 <script type="text/javascript" src="inc/jQuery/jquery.min.js"></script>          
	 <script type="text/javascript" src="inc/jQuery/jquery-ui.min.js"></script>          
	 <script type="text/javascript" src="inc/js/infiniteflow.js"></script>          
</head>

<body>
	<div id="header">
	<div class="boxtitle"><?php echo $conf['names']['site_name']; ?></div>
	</div>
	<div id="container">
<?php

/** Let's get the parameters **/

$pagewidth=$conf['design']['pagewidth'];
$box_width=($pagewidth - 10* ($conf['design']['columns']-1))/ $conf['design']['columns'];
$box_height=200;
$widgets = scandir("widgets");
$id=0;

function createbox($id,$widget,$bw,$bh,$bpl){
	$wpath="widgets/$widget";

	if(!file_exists("$wpath/conf.ini")) return 0;
	$wconf=parse_ini_file("$wpath/conf.ini");
	$param['left']	=	$wconf['x']*$bw+ ($wconf['x']>0?10*($wconf['x']):0)."px";
	$param['top']	=	$wconf['y']*$bh+ ($wconf['y']>0?10*($wconf['y']):0)."px";
	$param['height']=	$wconf['h']*$bh+10*($wconf['h']-1)."px";
	$param['width'] =	$wconf['w']*$bw+10*($wconf['w']-1)."px";
	
	echo "<div id='box_$id' class='box ".$wconf['color']."'";
	echo "style=' ";
	foreach($param as $a => $b){
		echo("$a:$b; ");
	}
	echo ("'>");

	echo "<div class='boxtitle'>".$wconf['name']."</div><div class='content'>";
	include("./widgets/$widget/main.php");
	echo("</div>");
	return 1;

}

for($i=0;$i< sizeof($widgets);$i++){
	$boxcontent=$widgets[$i];
	if($boxcontent[0]!='.')
	{
		$id=$id + createbox($id,$boxcontent,$box_width,$box_height,$conf['design']['columns']);
	}
}
?>
	</div>
	<div id="footer">
</div>
