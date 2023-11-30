
<?php
//store the user inputs in variables and hash the password
$username = $_POST['username'];
$password = hash('sha512', $_POST['password']);

//connect to db
require 'database.php';

//set up and run the query
$sql = "SELECT user_id FROM phpusers
WHERE username = '$username' AND password = '$password'";
$result = $database->getData($sql);
//store the number of results in a variable
//check if any matches found
if (!empty($result)){

	foreach  ($result as $row){
		//access the existing session created automatically by the server
		session_start();
		//take the user's id from the database and store it in a session variable
		$_SESSION['user_id'] = $row['user_id'];
		//redirect the user
		Header('Location: ../profile.php');
	}

}
else {
	echo 'Invalid Login, Please verify username and password';
}
$database = null;
?>
