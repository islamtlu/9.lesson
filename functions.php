<?php

	require_once ("../../config.php");
	
	//start server session to store data
	//in every file you want to access session
	//you should require functions file
	
	session_start();
	
	function login($user, $pass){
		
		//hash the password
		$pass = hash ("sha512", $pass);	

		//GLOBALS - access outside variable in function, this is to access the configuration file
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_islam");	

		$stmt = $mysql->prepare("SELECT id FROM debattle_users WHERE username=? and password=?");
		
		echo $mysql->error;
		
		$stmt->bind_param("ss", $user, $pass);
		
		$stmt->bind_result($id);
		
		$stmt->execute();
		
		//Get the data
		if ($stmt->fetch()){
			echo "User with id ".$id." logged in!";
			
			//create sessions variables
			//redirect user
			$_SESSION["user_id"] = $id;
			$_SESSION["username"] = $user;
			
			//redirection part
			header ("Location: restrict.php");
			
		}else{
			//username was wrong, password was wrong, or both
			echo $stmt->error;
			echo "Worng login credentials.";
		}
		
	}
	
	function signup($user, $pass){
		
		//hash the password
		$pass = hash ("sha512", $pass);
		
		//GLOBALS - access outside variable in function, this is to access the configuration file
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_islam");
		
		$stmt = $mysql->prepare("INSERT INTO debattle_users (username, password) VALUES (?,?)");
		
		echo $mysql->error;
		
		$stmt->bind_param("ss", $user, $pass);
		
		if($stmt->execute()){
			echo "User has been created successfully!";
		}else{
			//this is to show if there is a SQL error
			echo $stmt->error;
		}
	}
	


	/*$name = "Islam";

	hello($name, "thursday", 7);
	hello("Toomas", "thursday", 1);

	function hello ($received_name, $day_of_the_week, $day){
		echo "Hello " .$received_name."!";
		echo "<br>";
		echo "Today is ".$day_of_the_week." ".$day;
		echo "<br>";
	}*/


?>