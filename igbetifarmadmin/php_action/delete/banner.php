<?php
 session_start();

require('../db_connect.php');


// Receiving data
$bannre_id = $_GET['bannre_id'];

 $sql = "DELETE FROM banner where bannre_id = '$bannre_id' ";  
 	$result = $connection->query($sql);


if ($connection->query($sql) === TRUE) {

		header('Location: ../../change-banner.php');
   
} else {

		header('Location: ../../change-banner.php');
 
}

$connection->close();

?>