<?php
 session_start();

require('../db_connect.php');


// Receiving data
$supplier_name = $_POST['supplier_name'];
$supplier_address = $_POST['supplier_address'];
$supplier_phone = $_POST['supplier_phone'];
$supplier_email = $_POST['supplier_email'];
$supplier_description = $_POST['supplier_description'];

$sql = "INSERT INTO suppliers (supplier_name,supplier_address,supplier_phone,supplier_email,supplier_description) 
		VALUES ('$supplier_name','$supplier_address','$supplier_phone','$supplier_email','$supplier_description')";

if ($connection->query($sql) === TRUE) {
  
   $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> New supplier added successfully.
		</div>" ;
		header('Location: ../../suppliers-add.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> supplier could not be added.
		</div>" ;
		header('Location: ../../suppliers-add.php');
 
}

$connection->close();

?>