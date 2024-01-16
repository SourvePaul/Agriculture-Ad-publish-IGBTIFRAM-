<?php
 session_start();

require('../db_connect.php');

var_dump($_POST);

// Receiving data
$publish = $_POST['publish'];
$location_title = $_POST['location_title'];


$sql = "INSERT INTO `locations` (`publish`, `location_title`) VALUES ('$publish', '$location_title')";

if ($connection->query($sql) === TRUE) {
  
   $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> New location added successfully.
		</div>" ;
		header('Location: ../../add_location.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> product could not be added.
		</div>" ;
		header('Location: ../../add_location.php');
 
}

$connection->close();

?>