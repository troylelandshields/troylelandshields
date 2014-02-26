<?php
	$qs = $_SERVER['QUERY_STRING'];
	$resource = null;
	if($qs){
		$strs = explode("+", $qs);
		$place = $strs[0];
		$resource = $strs[1];
		$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		/*if($resource){
			echo "<meta property='og:image' content='$resource' />";
			echo "<meta property='og:url' content='$url' />";
			echo "<meta property='og:type' content='website' />";
			echo "<meta property='og:title' content='Troy and Lindsay go to $place' />";
			echo "<meta property='og:site_name' content='shldz.us'/>";
			//echo "<meta property='fb:admins' content='shldz.us'/>";
		} */
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<?php 
		include "header.php";
	?>
	<meta name="description=" content="">
	<!-- <link rel='stylesheet' href="style.css" type="text/css"/> -->
	<link rel='stylesheet' href="Styles/resume-item.css" type="text/css"/>

</head>
<body>

  <br>

  <!-- run from the minified library file: -->
  <!-- <script src="http://shldz.us/lib/arbor.js"></script>
  <script src="http://shldz.us/lib/arbor-graphics.js"></script>
  <script src="http://shldz.us/lib/arbor-tween.js"></script> -->
  
  <script src="lib/arbor.js"></script>
  <script src="lib/arbor-graphics.js"></script>
  <script src="lib/arbor-tween.js"></script>
  <h1 class="main-header" style="margin-left:10px;"> Troy Leland Shields</h1>
  <!-- <a href="instructions.php" target="_blank" class="nyroModal" style="margin-left:25px;">Instructions</a>
  <div style="float:clear"></div> -->
  <br><br>
  
 	<?php
 		if(getBrowser() == "ie"){
 			//echo "<script>$.nmTop();</script>";
 		}
 		echo "<canvas id='sitemap' width='100%' height='600'></canvas>";
 	 	include 'fileexplorer.php';  	 ?>
 	 <div class="center" style="margin-top:25px">
 	 	<p><a href="http://troylelandshields.me/TroyShields-resume.pdf">Click to view my flat resume.</a></p>
 	 	<p><a href="mailto:troy.leland.shields@gmail.com">Contact me</p>
 	 </div>
  <!-- <script src='http://shldz.us/lib/prestopresento.js'></script> -->
  <script src='lib/prestopresento.js'></script>
</div>
<?php include 'tracking.php'; ?>

</body>
</html>
