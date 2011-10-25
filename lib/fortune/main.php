<?php
require_once("./lib/fortune/fortune.php");
$f = new Fortune; 
// if needed : 
//$f->createIndexFile("./inc/fortune/cn");
echo $f->getRandomQuote("./lib/fortune/fortunes/cn.dat");
?>
