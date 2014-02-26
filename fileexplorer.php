 <?php
 
	/* Configuration variables */
	$nodes = array(); 
	$edges = array();

	$non_color = "#acacac";
	
	$root = "Me";
	$root_color = "#000000";
	$root_shape = "dot";
	$root_alpha = 1;
	
	$branch_color = "#5C5C5C";
	$branch_shape = "dot";
	$branch_alpha = 1;
	
	$leaf_colors = array("#474791", "#FFA319", "#990000","#1F5C3D");
	$leaf_shape = "rectangle";
	$leaf_alpha = 0;
	
	//echo $_SERVER['DOCUMENT_ROOT'];

	$server_path = "D:\Hosting\\10021657\html";
	
	/* End*/
	
	createNodes($root, "", null);
	$nodesStr = printNodes($nodes);
	$edgesStr = printEdges($edges);

	echo "<script> var theUI = {nodes:{" . $nodesStr . "}, edges:{" . $edgesStr . "}}} </script>";
 		
	function printNodes($n){
		$str = "";
		
		for ($j=0; $j<sizeof($n); $j++)
		{	
			if($str != ""){
				$str = $str . ", ";
			}	
			$str = $str . $n[$j];
		}

		return $str;
	}
	
	function printEdges($e){
		$str = "";

		foreach ($e as $key => $value)
		{		
			if($str != "" && substr($str,-2) != ", "){
				$str = $str ."}, ";
			}

			$str = $str . $value;
		}

		return $str;
	}

	function createNodes($curr, $path, $parent){
		global $nodes, $server_path, $root, $root_color, $root_shape, $root_alpha, $branch_color, $branch_shape, $branch_alpha, $leaf_shape, $leaf_alpha;

		 $branch = false;
		 $folder_path = $server_path . $path . '\\' . $curr;
		 $new_path = $path . '\\' . $curr;
		 
		 $folders = scandir($folder_path);

		 for($j=0; $j<sizeof($folders); $j++){
			if ($folders[$j] == '.' or $folders[$j] == '..'){
				continue;
			}
			if (is_dir($folder_path . '\\' . $folders[$j])) {
				$branch = true;
				break;
			}
		 }
	 
		 if($curr == $root){
			 $root_node =  "\"". $root ."\"" . ":{" . "color:\"". $root_color ."\"," . "shape:\"". $root_shape ."\"," . "alpha:". $root_alpha . "}";
			 array_push($nodes, $root_node);
			 for($i=0; $i<sizeof($folders); $i++){
				if ($folders[$i] == '.' or $folders[$i]  == '..') continue;
				if (is_dir($folder_path . '\\' . $folders[$i])) {
					createNodes($folders[$i], $new_path, $curr);
				}
			 }
		 }
		 else{
			 if($branch){
			 	 $visibility = 0;
			 	 if($curr == "Projects" || $curr == "BYU"){ $visibility = 0;}
			 	 else{$visibility = $branch_alpha;}

				 $node =  "\"". $curr . "\"" . ":{" . "color:\"". $branch_color ."\"," . "shape:\"". $branch_shape ."\"," . "alpha:". $visibility . "}";
				 addBranch($curr, $parent);
				 array_push($nodes, $node);
				 for($i=0; $i<sizeof($folders); $i++){
					if ($folders[$i]  == '.' or $folders[$i]  == '..') continue;
					if (is_dir($folder_path . '\\' . $folders[$i])) {
						createNodes($folders[$i], $new_path, $curr);
					}
				 }
			}
			 else{
			 	$links = "";
				 for($i=0; $i<sizeof($folders); $i++){
					if ($folders[$i] == '.' or $folders[$i] == '..') continue;
					if (is_file($folder_path . '\\' . $folders[$i])) {
						if($links != ""){
							$links = $links . ";";
						}
						if(strpos($folders[$i],'list') !== false){
							$links = $links . str_replace("\\", "/", file_get_contents($folder_path . '/' . $folders[$i]));
						}
						else{
							$links = $links . "http://troylelandshields.me" . str_replace("\\", "/", $new_path) . '/' . str_replace("\\", "/", $folders[$i]);
						}
					}
				 }
				 if(!$links) { $links = "about:blank";}
				 $node =  "\"" . $curr . "\"" . ":{" . "color:\"". getLeafColor($links) ."\"," . "shape:\"". $leaf_shape ."\"," . "alpha:". $leaf_alpha . "," . "link:" . "\"" . $links . "\"" . "}";
				 addLeaf($curr, $parent);
				 array_push($nodes, $node);
			 }
		 }
	}
        
	function addBranch($curr, $parent){	
		global $edges;
		
		if(!array_key_exists($parent, $edges)){
			$edge = "\"". $parent . "\"" . ":{" . "\"" . $curr . "\"" . ":{}";
			$edges[$parent] = $edge;
		}
		else{
			$edge = "\"" . $curr . "\"" . ":{}";
			$edges[$parent] = $edges[$parent] . ", " . $edge;
		}		
	}
	
	function addLeaf($curr, $parent){
		global $edges;
		
		if(!array_key_exists($parent, $edges)){
			$edge = "\"" . $parent . "\"" . ":{" . "\"" . $curr . "\"" . ":{length:.5}";
			$edges[$parent] = $edge;
		}
		else{
			$edge = "\"". $curr . "\"" . ":{length:.5}";
			$edges[$parent] = $edges[$parent] . ", " . $edge;
		}	
	}
	
	function getLeafColor($link){
		global $leaf_colors, $non_color;
		if($link == "about:blank") return $non_color;

		return $leaf_colors[array_rand($leaf_colors)];
	}
	
?>





