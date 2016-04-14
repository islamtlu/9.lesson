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
	
	//someone clicked the button "add"
	if(isset($_GET["add_new_interest"])){
		
		if(!empty($_GET["new_interest"])){
		saveInterest($_GET["new_interest"]);
	}else{
		echo "You left the Interest field empty";
	}
	
	}
	
//someone clicked the button select_interest
if(isset($_GET["select_interest"])){
	if(!empty($_GET["debattle_user_interest"])){
		
	saveUserInterest($_GET["debattle_user_interest"]);
	
}else{
	echo "error";
}
}

?>

<h2> Howdy <?=$_SESSION["first_name"];?> <?=$_SESSION["last_name"];?> (<?=$_SESSION["user_id"];?>) </h2>

<a href="?logout=1" >Log Out</a>

<h2> Add interest</h2>
<form>

	<input type="text" name="new_interest"> 
	<input type="submit" name="add_new_interest">
	
</form>

<h2>Select user interest</h2>
<form>

<?php 	createInterestDropdown(); ?>
<input type="submit" name="select_interest" value="Select">

</form>

<h1>Interests</h1>

<?php 	createUserInterestList(); ?>
