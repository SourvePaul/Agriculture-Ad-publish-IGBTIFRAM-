<?php
 session_start();

require('../db_connect.php');


// Receiving data
$cust_name = $_POST['cust_name'];
$cust_add = $_POST['cust_add'];
$cust_phone = $_POST['cust_phone'];
$cust_type = $_POST['cust_type'];

$sql = "INSERT INTO customers (cust_name,cust_add,cust_phone,cust_type) 
		VALUES ('$cust_name','$cust_add','$cust_phone','$cust_type')";

if ($connection->query($sql) === TRUE) {
  
   $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> New customer added successfully.
		</div>" ;
		header('Location: ../../clients-add.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Customer could not be added.
		</div>" ;
		header('Location: ../../clients-add.php');
 
}

$connection->close();

?>