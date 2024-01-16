<?php
 session_start();

require('../db_connect.php');

// Receiving data
$admin_id = $_POST['admin_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$c_password = $_POST['c_password'];  

if($c_password != $password){
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Password Does Not Match
		</div>" ;
		header('Location: ../../profile.php');
}

else{

	$password = md5($password);

	$sql = "UPDATE users set username='$username', password = '$password' where admin_id = ".$admin_id;

if ($connection->query($sql) === TRUE) {
  
	$_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> Profile Updated Successfully.
		</div>" ;
		header('Location: ../../profile.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Profile could not be Updated.
		</div>" ;
		header('Location: ../../profile.php');
 
}

}



$connection->close();

?>