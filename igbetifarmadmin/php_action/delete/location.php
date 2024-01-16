<?php
 session_start();

require('../db_connect.php');


// Receiving data
$location_id = $_GET['location_id'];

 $sql = "DELETE FROM locations where location_id = '$location_id' ";  
 	$result = $connection->query($sql);


if ($connection->query($sql) === TRUE) {

		header('Location: ../../add_location.php');
   
} else {

		header('Location: ../../add_location.php');
 
}

$connection->close();

?>