<?php 

if(!isset($wconf)){

	if(isset($_GET['id'])) $id=$_GET['id'];
	$widget=parse_ini_file("../../conf.ini",true);
	$wconf=$widget[$id];
	if($wconf['dir'][0]!='/') $wconf['dir']="../../".$wconf['dir'];
	if(isset($_GET['dir']) && $_GET['dir'][0] != '/') $dir="../../".$_GET['dir'];

	$id="";
	require_once('../../widgets/listing/functions.php');
	
}else{
	require_once('widgets/listing/functions.php');
}

if(isset($wconf['dir'])){
	$default=$wconf['dir'];
}else{
	exit;
}

if(isset($_GET['id'])){
	if($id==$_GET['id']){
		if(isset($_GET['dir'])) $dir=$_GET['dir'];
	}
}

if(!isset($dir)){
	$dir = $default;
}

if(badwolf($dir,$default)){
	$dir = $default;
}

if(is_file($dir)){
   	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename='.basename($dir));
	header('Content-Transfer-Encoding: binary');
	readfile($dir);
	exit();

}
echo '<link rel="stylesheet" href="widgets/listing/style.css" type="text/css" media="screen" charset="utf-8">';
echo"<table>";
if(is_dir($dir)){
	$files=scandir($dir);
	foreach($files as $file){
		if($file!="."){
			if(realpath($default)!=realpath($dir) || $file!=".."){
				if(is_file($dir.'/'.$file)){
					echo "<tr><td class='file'></td><td><a href='widgets/".$wconf['widget']."/main.php?id=$id&dir=$dir/$file'>$file</a></td></tr>";
				}else{
					echo "<tr class='WIBOJS'><td class='folder'></td><td><a id='$dir/$file' href='?id=$id&dir=$dir/$file#$id'>$file</a></td></tr>";
				}
			}
		}
	}
}
echo"</table>";
?>
</html>
