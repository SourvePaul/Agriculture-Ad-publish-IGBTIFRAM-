<?php
 session_start();

require('../db_connect.php');


// Receiving data
$supplier_id = $_POST['supplier_id'];
$supplier_name = $_POST['supplier_name'];
$supplier_address = $_POST['supplier_address'];
$supplier_phone = $_POST['supplier_phone'];
$supplier_email = $_POST['supplier_email']; 
$supplier_description = $_POST['supplier_description'];  


	$sql = "UPDATE suppliers set supplier_name='$supplier_name', supplier_address = '$supplier_address',
	 supplier_phone='$supplier_phone', supplier_email = '$supplier_email', supplier_description = '$supplier_description' where supplier_id = ".$supplier_id;

if ($connection->query($sql) === TRUE) {
  
	$_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> Supplier Updated Successfully.
		</div>" ;
		header("Location: ../../suppliers-edit.php?id=$supplier_id");
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Supplier could not be Updated.
		</div>" ;
		header("Location: ../../suppliers-edit.php?id=$supplier_id");
 
}



$connection->close();

?>