<?php
	
	//we need functions file for dealing with session
	require_once("functions.php");
	
		//Restriction -  logged in
	if(!isset($_SESSION["user_id"])){
		//redirect not logged in user to login page
		header("Location: login.php");
	}
	
	//?logout is in the URL
	if(isset($_GET["logout"])){
		
		//delete the session
		session_destroy();
		
		header("Location: login.php");
	}

?>

<h2> Welcome <?=$_SESSION["username"];?> (<?=$_SESSION["user_id"];?>) </h2>

<a href="?logout=1" >Log Out</a>
