<?php
	if (isset($_POST)){
		echo "Success post " + $_POST['tag'];
	}
	if (isset($_GET)){
		echo "Success get " + $_GET['tag'];
	}
	if (isset($_REQUEST)){
		echo "Success request " + $_REQUEST['tag'];
	}
echo "Done";
	
?>