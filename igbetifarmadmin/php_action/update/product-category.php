<?php
 session_start();

require('../db_connect.php');


// Receiving data
$cat_id = $_POST['cat_id'];
$cat_name = $_POST['cat_name'];
$cat_desc = $_POST['cat_desc'];


	$sql = "UPDATE categories set cat_name='$cat_name', cat_desc = '$cat_desc'
	  where cat_id = ".$cat_id;

if ($connection->query($sql) === TRUE) {
  
	$_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> Product Categorry Updated Successfully.
		</div>" ;
		header("Location: ../../product-category-edit.php?id=$cat_id");
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Product Categorry could not be Updated.
		</div>" ;
		header("Location: ../../product-category-edit.php?id=$cat_id");
 
}



$connection->close();

?>