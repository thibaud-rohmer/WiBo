<?php
require_once("./widgets/".$wconf['widget']."/fortune.php");
$f = new Fortune; 
echo $f->getRandomQuote("./widgets/".$wconf['widget']."/fortunes/cn.dat");
?>
