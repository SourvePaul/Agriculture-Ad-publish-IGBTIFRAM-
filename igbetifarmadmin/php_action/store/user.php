<?php
session_start();

require('../db_connect.php');

// Receiving data
$user_username = $_POST['user_username'];
$user_type = $_POST['user_type'];
$user_password = $_POST['user_password']; 
$user_c_password = $_POST['user_c_password'];

if("$user_password" != "$user_c_password"){
		$_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Password does not match!</strong>
		</div>" ;
		header('Location: ../../profile.php');
}
else{
	
$user_password = md5($_POST['user_password']); 
$user_c_password = md5($_POST['user_c_password']);	
//Add table
$sql = "INSERT INTO users (username,user_type,password) 
		VALUES ('$user_username','$user_type','$user_password')";

if ($connection->query($sql) === TRUE) {
  
   $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> New User added successfully.
		</div>" ;
		header('Location: ../../profile.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> User could not be added.
		</div>" ;
		header('Location: ../../profile.php');
 
}
}
$connection->close();

?>