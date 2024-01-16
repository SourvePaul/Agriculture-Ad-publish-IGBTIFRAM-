<?php
 session_start();

require('../db_connect.php');


// Receiving data
$admin_id = $_GET['id'];

 $sql = "DELETE FROM users where admin_id = '$admin_id' ";  
 	$result = $connection->query($sql);


if ($connection->query($sql) === TRUE) {
		$_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> User deleted successfully.
		</div>" ;
		header('Location: ../../profile.php');
   
} else {
   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong>
		</div>" ;
		header('Location: ../../profile.php');
 
}

$connection->close();

?>