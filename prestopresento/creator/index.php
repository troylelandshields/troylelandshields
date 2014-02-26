<?php session_start(); 
	if(isset($_POST['clear'])){
		unset($_SESSION['branches']);
		session_destroy();
	}
	else{
	
		if(!isset($_SESSION['branches'])){
			$_SESSION['branches'] = array();
			$_SESSION['links'] = array();
		}

		//array_push($_SESSION['branches'], $_POST['branch']);
		//array_push($_SESSION['links'], $_POST['link']);
	
		if($_POST['branch'] != ""){
			$_SESSION['branches'][] = $_POST['branch'];
			if($_POST['link'] != ""){
				$_SESSION['links'][] = $_POST['link'];
			}
			else{
				$_SESSION['links'][] = "about:blank";
			}
		}
	}
	
	//print_r($_SESSION['branches']);
	//echo "<br>" . $i . "<br>";
	//echo $_POST['branch'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Presto Presento Creator</title>
	<link rel="stylesheet" href="style.css" type="text/css">

	<!-- NyroModal -->
	<link rel="stylesheet" href="nyroModal.css" type="text/css" media="screen" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/jquery.nyroModal.custom.js"></script>
	<!--[if IE 6]>
		<script type="text/javascript" src="js/jquery.nyroModal-ie6.min.js"></script>
	<![endif]-->
	<!-- NyroModal -->
</head>
<body>

<div>
	<p>Type paths in the Branch field below, using "/" as a delimiter. For example, "Root/Branch/Leaf". <br>
	The leaf of any path can link to one or more webpages by including a URL in the Link field. Divide multiple links with ";". </p>
</div>
<div>
	<form action="index.php" method="post">
		Branch: <input type="text" name="branch">
		Link: <input type="text" name="link">
		<input type="submit" name="submit">
		<input type="submit" name="clear" value="Clear">
	</form>
</div>

<br>
  <canvas id="sitemap" width="800" height="1000"></canvas>
  <br>
  <!--<iframe id="target" width="1200" height="600" frameborder="0"></iframe> -->
  
  <!-- run from the minified library file: -->
  <script src="../lib/arbor.js"></script>
  <script src="../lib/arbor-graphics.js"></script>
  <script src="../lib/arbor-tween.js"></script>

  <?php include 'fileexplorer.php'; ?>
  <?php 
  	if(sizeof($_SESSION['branches']) >= 1){
  		$theUI =  createGraph($_SESSION['branches'], $_SESSION['links']);
  		echo $theUI;
  		echo "<code>" .  getCode($theUI) . "</code>";
  	}
  ?>
  <script src="../lib/prestopresento.js"></script>
</body>
</html>
