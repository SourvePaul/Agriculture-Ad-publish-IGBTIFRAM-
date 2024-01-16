<?php
 session_start();

require('../db_connect.php');


// Receiving data
$cart_id = $_GET['id'];

 $sql = "DELETE FROM carts where cart_id = '$cart_id' ";  
 	$result = $connection->query($sql);


if ($connection->query($sql) === TRUE) {

		header('Location: ../../sales-add.php');
   
} else {

		header('Location: ../../sales-add.php');
 
}

$connection->close();

?>