<?php
	require_once("functions.php");
	
	//Restriction - Not logged in
	if(isset($_SESSION["user_id"])){
		//redirect user to restricted page
		header("Location: restrict.php");
	}

	//login=something is in the URL
	if(isset($_POST["login"])){
		
		//login
		
		echo "logging in ...";
		
				if (!empty($_POST["username"]) && !empty ($_POST["password"])){
			
			//save to DB
			
			login($_POST["username"], $_POST["password"]);
		}else{
			
			echo "Both fields are required!";
		}
		
	//signup button clicked
	}else if(isset($_POST["signup"])){
		
		//signup
		
		echo "signing up ...";
		
		//Check the fields are not empty
		if (!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["username"]) && !empty ($_POST["password"])){
			
			//save to DB
			
			signup($_POST["first_name"], $_POST["last_name"], $_POST["username"], $_POST["password"]);
		}else{
			
			echo "All fields are required!";
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

	<input type="text" placeholder="Enter your first name" name="first_name"><br>
	<input type="text" placeholder="Enter your last name" name="last_name"><br>
	<input type="text" placeholder="Enter your chosen username" name="username"><br>
	<input type="password" placeholder="Input your chosen password" name="password"><br><br>
	
	<input type="submit" name="signup" value="Sign Up">

</form>