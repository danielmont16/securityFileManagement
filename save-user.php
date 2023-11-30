<?php
	// connection
	require './inc/database.php';
	// variables
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm = $_POST['confirm'];
	// validate inputs
	$ok = true;
	
		if (empty($first_name)) {
			echo '<p>First name required</p>';
			$ok = false;
		}
		if (empty($last_name)) {
			echo '<p>Last name required</p>';
			$ok = false;
		}
		if (empty($username)) {
			echo '<p>Username required</p>';
			$ok = false;
		}
		if ((empty($password)) || ($password != $confirm)) {
			echo '<p>Invalid passwords</p>';
			$ok = false;
		}
	
	if ($ok){
		$password = hash('sha512', $password);
		// set up the sql
		$sql = "INSERT INTO phpusers (first_name, last_name, username, password) 
		VALUES ('$first_name', '$last_name', '$username', '$password');";
		$database->execute($sql);

		// echo '<p>User created</p>';
    	
		header("Location: signin.php"); 		
		
	}
	?>
