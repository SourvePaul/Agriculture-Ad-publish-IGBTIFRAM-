<?php
 session_start();

require('../db_connect.php');


// Receiving data
$id = $_GET['id'];

 $sql = "DELETE FROM staffs where staff_id = '$id' ";  
 	$result = $connection->query($sql);


if ($connection->query($sql) === TRUE) {

		header('Location: ../../staff.php');
   
} else {

		header('Location: ../../staff.php');
 
}

$connection->close();

?>