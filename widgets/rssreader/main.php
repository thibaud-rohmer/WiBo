<?php
$feedUrl = $wconf['rss'];
$rawFeed = file_get_contents($feedUrl); 
$xml = new SimpleXmlElement($rawFeed);

$arr=$xml->channel->item;

if($wconf['type']=="news" || $wconf['type']=="newslong"){
	echo "<table>";
	$counter=0;
	foreach ($arr as $item) 
	{     
	    $article = array();
	    $article['title'] = $item->title;
	    $article['link'] = $item->link; 
	    $article['desc'] = $item->description; 

	echo "<tr><td>";
	echo "<a href='".$article['link'].">".$article['title']."</a></br>";
	if($wconf['type']=="newslong") echo $article['desc'];
	echo "</td></tr>";
	if( ++$counter > $wconf['maxitems']) break;
	}
	echo "</table>";
}elseif($wconf['type']=='image' || $wconf['type']=='imagestretch'){
	if($wconf['type']=='imagestretch')
		echo "<div class='img_stretch'>";
	else
		echo "<div class='img_center'>";
	$img = $xml->channel->item[0]->description;
	echo $img;
	echo "</div>";
}
?>
