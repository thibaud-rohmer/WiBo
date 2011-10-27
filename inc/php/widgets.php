<?php

function display_conf($widget,$edit=false){
	echo "<table>";
	foreach ($widget as $set => $value){
		echo "<tr><td>$set</td><td>$value</td></tr>";
	}
	echo "</table>";
}

function save_conf($wlist){
	$f=fopen('newconf.ini','w+');

	foreach($wlist as $i => $widget){
		fprintf($f,"[$i]\n");
		foreach ($widget as $set => $val){
			fprintf($f,"$set\t=\t");
			fprintf($f,is_numeric($val)? "$val\n" : "\"$val\"\n" );			
		}
		fprintf($f,"\n");
	}
	fclose($f);
}

?>
