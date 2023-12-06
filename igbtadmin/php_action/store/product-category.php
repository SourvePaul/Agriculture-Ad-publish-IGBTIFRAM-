<?php
 session_start();

require('../db_connect.php');


// Receiving data
$cat_name = $_POST['cat_name'];
$cat_desc = $_POST['cat_desc'];

$sql = "INSERT INTO categories (cat_name,cat_desc) 
		VALUES ('$cat_name','$cat_desc')";

if ($connection->query($sql) === TRUE) {
  
   $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> New Category added successfully.
		</div>" ;
		header('Location: ../../product-category-add.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Category could not be added.
		</div>" ;
		header('Location: ../../product-category-add.php');
 
}

$connection->close();

?>