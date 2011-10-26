<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<?php
if(file_exists("./conf.ini")) 
	$conf=parse_ini_file("./conf.ini",true);
else 
	die('Missing file : conf.ini');
?>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $conf['WiBo']['page_title']; ?></title>
	<meta name="author" content="Thibaud Rohmer">
	<link rel="stylesheet" href="inc/style/<?php echo $conf['WiBo']['style']; ?>.css" type="text/css" media="screen" charset="utf-8">
	 <script type="text/javascript" src="inc/jQuery/jquery.min.js"></script>          
	 <script type="text/javascript" src="inc/jQuery/jquery-ui.min.js"></script>          
	 <script type="text/javascript" src="inc/js/buttons.js"></script>          
	 <script type="text/javascript" src="inc/js/infiniteflow.js"></script>          
</head>

<body>
	<div id="header">
	<div class="boxtitle"><?php echo $conf['WiBo']['site_name']; ?></div>
	</div>
	<div id="container">
<?php

/** Let's get the parameters **/

$pagewidth=$conf['WiBo']['pagewidth'];
$box_width=($pagewidth - 10* ($conf['WiBo']['columns']-1))/ $conf['WiBo']['columns'];
$box_height=$conf['WiBo']['boxheight'];
$columns=$conf['WiBo']['columns'];

include('inc/functions.php');
gener_grid($conf);

foreach ($conf as $id => $widget){
	if($val!='WiBo')
		createbox($id,$widget,$box_width,$box_height,$conf['WiBo']['columns']);
}
?>
	</div>
	<div id="footer">
</div>
