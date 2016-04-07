<?php

	require_once ("../../config.php");
	
	
	
	function signup($user, $pass){
		
		
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