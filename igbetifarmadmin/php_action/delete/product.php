<?php
 session_start();

require('../db_connect.php');


// Receiving data
$id = $_GET['id'];

 $sql = "DELETE FROM products where product_id = '$id' ";  
 	$result = $connection->query($sql);


if ($connection->query($sql) === TRUE) {

		header('Location: ../../product-list.php');
   
} else {

		header('Location: ../../product-list.php');
 
}

$connection->close();

?>