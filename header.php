<meta name="viewport" content="width=device-width, initial-scale = 1.0,maximum-scale = 1.0, user-scalable=0" />
<link rel='stylesheet' media='screen and (max-width: 499px)' href="http://shldz.us/css/mobile_style.css" type="text/css"/>
<link rel="stylesheet" media='screen and (min-width: 500px)' href="http://shldz.us/css/style.css" type="text/css" />
<link rel="stylesheet" href="http://shldz.us/css/nyroModal.css" type="text/css" media="screen" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="http://shldz.us/js/jquery.nyroModal.custom.js"></script>
<!--[if IE 6]>
	<script type="text/javascript" src="http://shldz.us/js/jquery.nyroModal-ie6.min.js"></script>
<![endif]-->
<!-- NyroModal -->
<title>Troy Shields</title>


<script>
	$(function() {
  		$('.nyroModal').nyroModal();
	});
</script>

<?php 
	
	function getBrowser()
	{
		$u_agent = $_SERVER['HTTP_USER_AGENT'];
		$ub = '';
		if(preg_match('/MSIE/i',$u_agent))
		{
			$ub = "ie";
		}
		elseif(preg_match('/Firefox/i',$u_agent))
		{
			$ub = "firefox";
		}
		elseif(preg_match('/Safari/i',$u_agent))
		{
			$ub = "safari";
		}
		elseif(preg_match('/Chrome/i',$u_agent))
		{
			$ub = "chrome";
		}
		elseif(preg_match('/Flock/i',$u_agent))
		{
			$ub = "flock";
		}
		elseif(preg_match('/Opera/i',$u_agent))
		{
			$ub = "opera";
		}

		return $ub;
	}
?>	