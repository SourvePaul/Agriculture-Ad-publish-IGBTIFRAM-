<?php
 session_start();

require('../db_connect.php');


// Receiving data
$id = $_GET['id'];

$o_i_sql = "DELETE FROM order_items where order_id = '$id' ";
$connection->query($o_i_sql);


 $sql = "DELETE FROM orders where order_id = '$id' ";
 $result = $connection->query($sql);


if ($connection->query($sql) === TRUE) {

		header('Location: ../../sales-reporting-list.php');
   
} else {

		header('Location: ../../sales-reporting-list.php');
 
}

$connection->close();

?>