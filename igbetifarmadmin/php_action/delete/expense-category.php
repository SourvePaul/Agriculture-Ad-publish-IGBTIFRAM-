<?php
 session_start();

require('../db_connect.php');


// Receiving data
$id = $_GET['id'];

 $sql = "DELETE FROM expense_categories where expense_cat_id = '$id' ";  
 	$result = $connection->query($sql);


if ($connection->query($sql) === TRUE) {

		header('Location: ../../expense-category.php');
   
} else {

		header('Location: ../../expense-category.php');
 
}

$connection->close();

?>