 <?php
		$files = array(	
		"Troy Shields/Personal/Contact/Facebook",
		"Contact/Email",
		
		"Personal/Projects/Shldz.us - Family Website",
		"Projects/GroupThink",
		"Projects/Maze",
		
		"Troy Shields/Education/MVHS",
		"Education/Brigham Young University",
		
		"Troy Shields/Professional/Imagine Learning",	
		"Professional/USAA",
		"Professional/HydroDesktop",
		
		

		);
		
		$links = array(
		"about:blank",
		"about:blank",
		
		"about:blank",
		"about:blank",
		"www.troylelandshields.me/MouseRace.aspx",
		
		"about:blank",
		"about:blank",
		
		"about:blank",
		"about:blank",
		"about:blank"
		
		);
		
		
		$nodes = array();
		$edges = array();
		$keys = array();
		
		for ($j=0; $j<sizeof($files); $j++)
		{
			$f = $files[$j];
			
			$nodeNames = explode("/", $f);
			
			for ($k=0; $k<sizeof($nodeNames); $k++)
			{
				$nodeNames[$k] = "\"" . $nodeNames[$k] . "\"";
			}
		
			for ($i=0; $i<sizeof($nodeNames); $i++)
			{
				$name = $nodeNames[$i];
				
				array_push($keys, $name);
			
				$extra = "";
				if($i == 0){
					$color = "#101E2E";
					$shape = "dot";
					$alpha = 1;
					$root = "t";
					$extra = "," . "year:\"". $root ."\"";
				}
				else if($i == (sizeof($nodeNames)-1)){
					if($links[$j] == "about:blank"){
						$color = "#969696";
					}
					else{
						$color = "#922E00";
					}
					$alpha = 0;
					$shape = "rectangle";
					$extra = "," . "link:\"". $links[$j] ."\"";
				}
				else{
					$color = "#1F3D5C";
					$shape = "dot";	
					$alpha = 0;
					$root = "f";
					$extra = "," . "year:\"". $root ."\"";
				}

		
				$node =  $name . ":{" . "color:\"". $color ."\"," . "shape:\"". $shape ."\"," . "alpha:". $alpha . $extra . "}";
				
				if(!array_key_exists($name, $nodes)){
					$nodes[$name] = $node;
				}
				
				if($i < (sizeof($nodeNames)-1)){
					if(!array_key_exists($name, $edges)){
						$edge = $name . ":{" . $nodeNames[$i+1] . ":{}";
						$edges[$name] = $edge;
					}
					else{
						$edge = $nodeNames[$i+1] . ":{length:.85}";
						$edges[$name] = $edges[$name] . ", " . $edge;
					}
				}
				
				array_push($edges, $edge);
			}		
		}
	$nodesStr = printNodes($nodes, $keys);
	$edgesStr = printEdges($edges, $keys);
	
	echo "<script> var theUI = {nodes:{" . $nodesStr . "}, edges:{" . $edgesStr . "}} </script>";

	function printNodes($n, $names){
		$str = "";
		
		for ($j=0; $j<sizeof($names); $j++)
		{		
			if($str != ""){
				$str = $str . ", ";
			}
			$str = $str . $n[$names[$j]];
		}
		return $str;
	}
	
	function printEdges($e, $names){
		$str = "";

		for ($j=0; $j<sizeof($names); $j++)
		{		
			if($str != "" && substr($str,-2) != ", "){
				$str = $str ."}, ";
			}
			$str = $str . $e[$names[$j]];
		}
		
		return $str;
	}

?>
