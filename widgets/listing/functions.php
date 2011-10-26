<?php
function badwolf($dir,$default){
	$myscope=realpath($default);
	$path_required=realpath($dir);
	return (strncmp($path_required, $myscope, strlen($myscope)) != 0);
}
?>
