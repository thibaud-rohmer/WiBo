<?php
if(isset($wconf['h'])){
	echo "<div class='img_center' style='background:url(\"".$wconf['img']."\") no-repeat center center;'>";
	echo "</div>";
}else{
	$wconf['img']="../osiPhoto/photos/Australie/Favorites/";
	if(is_dir($wconf['img'])){
		$dir=$wconf['img'];
		$dlist=scandir($dir);
		$f='';
		shuffle($dlist);
		while(sizeof($dlist)>0 && !(is_file($dir."/".$f))){
			$f=array_pop($dlist);
		}
		if(is_file($dir."/".$f)){
			$wconf['img']=$dir."/".$f;
		}else{
			echo "error";
			$wconf['img']="";
		}
	}
	$size=getimagesize($wconf['img']);
	if($size[0]>$size[1]){
		$wconf['h']=1;
		$wconf['w']=2;
	}else{
		$wconf['w']=1;
		$wconf['h']=2;
	}
	$i=rand(1,5);
	if($i>4){
		$wconf['h']=2;
		$wconf['w']=2;
	}
	if($i<2){
		$wconf['h']=1;
		$wconf['w']=1;
	}

	$free=getnumberoffreespace($grid);
	if($remaining<=$free){
		$wconf['h']=1;
		$wconf['w']=1;
	}
}
?>
