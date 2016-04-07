<?php
	require_once("functions.php");

	//login=something is in the URL
	if(isset($_POST["login"])){
		
		//login
		
		echo "logging in ...";
		
	//signup button clicked
	}else if(isset($_POST["signup"])){
		
		//signup
		
		echo "signing up ...";
		
		//Check the fields are not empty
		if (!empty($_POST["username"]) && !empty ($_POST["password"])){
			
			//save to DB
			
			signup($_POST["username"], $_POST["password"]);
		}else{
			
			echo "Both fields are required!";
		}
	}



?>



<h1>Log In</h1>
<form method="POST">

	<input type="text" placeholder="Enter your username" name="username">
	<input type="password" placeholder="Input your password" name="password">
	
	<input type="submit" name="login" value="Log in">

</form>


<h1>Sign Up</h1>
<form method="POST">

	<input type="text" placeholder="Enter your username" name="username">
	<input type="password" placeholder="Input your password" name="password">
	
	<input type="submit" name="signup" value="Sign Up">

</form>