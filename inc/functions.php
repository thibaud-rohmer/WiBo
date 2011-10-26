<?php
function gener_grid($w){
	global $grid;
	foreach($w as $widget){
		if(isset($widget['x']) && isset($widget['y']))  $grid=update_grid($grid,$widget);
	}
}

function update_grid($grid,$wconf){
	for($i=$wconf['y'];$i<$wconf['y']+$wconf['h'];$i++){
		for($j=$wconf['x'];$j<$wconf['x'] + $wconf['w'];$j++){
			$grid[$i][$j]=1;
		}	
	}
	return $grid;
}

function free_space($grid,$y,$x,$h,$w){
	for($i=$y; $i < $y+$h; $i++){
		for($j=$x; $j < $x+$w; $j++){
			if($grid[$i][$j]==1) return 0;
		}	
	}
	return 1;
}

function autoplace($grid,$wconf,$col){
	$coord['x']=0;
	$coord['y']=0;
	if(isset($wconf['h']))
		$coord['h']=$wconf['h'];
	else
		$coord['h']=1;

	if(isset($wconf['w']))
		$coord['w']=$wconf['w'];
	else
		$coord['w']=1;


	if($coord['w']>$col) $coord['w']=$col;

	while(!(free_space($grid,$coord['y'],$coord['x'],$coord['h'],$coord['w']))){
		if($coord['x']+$coord['w']>$col){
			$coord['x']=0;
			$coord['y']++;
		}else{
			$coord['x']++;
		}
	}
	return $coord;	
}



function createbox($id,$wconf,$bw,$bh,$bpl){
        global $grid,$columns;
        if(!isset($wconf['x']) || !isset($wconf['y'])){
                $coord=autoplace($grid,$wconf,$columns);
                $wconf['x']=$coord['x'];
                $wconf['y']=$coord['y'];
        }
        $grid=update_grid($grid,$wconf);

        $param['left']  =       $wconf['x']*$bw+ ($wconf['x']>0?10*($wconf['x']):0)."px";
        $param['top']   =       $wconf['y']*$bh+ ($wconf['y']>0?10*($wconf['y']):0)."px";
        $param['height']=       $wconf['h']*$bh+10*($wconf['h']-1)."px";
        $param['width'] =       $wconf['w']*$bw+10*($wconf['w']-1)."px";
        
        if(file_exists("./widgets/".$wconf['widget']."/style.css"))
                echo '<link rel="stylesheet" href="./widgets/'.$wconf['widget'].'/style.css" type="text/css" media="screen" charset="utf-8">';

        echo "<div id='$id' class='box ".$wconf['color']."'";
        echo "style=' ";
        foreach($param as $a => $b){
                echo("$a:$b; ");
        }
        echo ("'>");

        if(isset($wconf['name'])) 
                echo "<div class='boxtitle'>".$wconf['name']."</div><div class='altshow refresh'>R</div><div class='content'>";
        else
                echo "<div class='content'>";
        include("./widgets/".$wconf['widget']."/main.php");
        echo("</div></div>");
        return 1;

}


?>
