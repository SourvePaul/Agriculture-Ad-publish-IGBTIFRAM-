<?php
 session_start();

require('../db_connect.php');


// Receiving data
$id = $_GET['id'];

 $sql = "DELETE FROM suppliers where supplier_id = '$id' ";  
 	$result = $connection->query($sql);


if ($connection->query($sql) === TRUE) {

		header('Location: ../../suppliers.php');
   
} else {

		header('Location: ../../suppliers.php');
 
}

$connection->close();

?>