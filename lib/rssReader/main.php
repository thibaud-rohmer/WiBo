<?php
echo '<link rel="stylesheet" href="./lib/rssReader/style.css" type="text/css" media="screen" charset="utf-8">';


$feedUrl = $wconf['rss'];
$rawFeed = file_get_contents($feedUrl); 
$xml = new SimpleXmlElement($rawFeed);


if($wconf['type']=="news"){
	echo "<table>";
	foreach ($xml->channel->item as $item) 
	{     
	    $article = array();
	    $article['title'] = $item->title;
	    $article['link'] = $item->link; 
	    $article['desc'] = $item->description; 

	echo "<tr><td>";
	echo "<a href='".$article['link'].">".$article['title']."</a></br>";
	if($wconf['desc']) echo $article['desc'];
	echo "</td></tr>";
	}
	echo "</table>";
}elseif($wconf['type']=='image'){
	if($wconf['stretch'])
		echo "<div class='img_stretch'>";
	else
		echo "<div class='img_center'>";
	$img = $xml->channel->item[0]->description;
	echo $img;
	echo "</div>";
}




?>
