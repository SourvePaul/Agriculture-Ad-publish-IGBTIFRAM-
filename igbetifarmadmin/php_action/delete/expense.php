<?php
 session_start();

require('../db_connect.php');


// Receiving data
$id = $_GET['id'];

 $sql = "DELETE FROM expenses where expenses_id = '$id' ";  
 	$result = $connection->query($sql);


if ($connection->query($sql) === TRUE) {

		header('Location: ../../expense.php');
   
} else {

		header('Location: ../../expense.php');
 
}

$connection->close();

?>