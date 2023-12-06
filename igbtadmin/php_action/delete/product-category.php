<?php
 session_start();

require('../db_connect.php');


// Receiving data
$cat_id = $_GET['id'];

 $sql = "DELETE FROM categories where cat_id = '$cat_id' ";  
 	$result = $connection->query($sql);


if ($connection->query($sql) === TRUE) {

		header('Location: ../../product-category.php');
   
} else {

		header('Location: ../../product-category.php');
 
}

$connection->close();

?>