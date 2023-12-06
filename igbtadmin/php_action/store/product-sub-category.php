<?php
 session_start();

require('../db_connect.php');


// Receiving data
$sub_cat_name = $_POST['sub_cat_name'];
$sub_cat_desc = $_POST['sub_cat_desc'];
$cat_id = $_POST['cat_id'];

$sql = "INSERT INTO sub_categories (sub_cat_name,sub_cat_desc,cat_id) 
		VALUES ('$sub_cat_name','$sub_cat_desc','$cat_id')";

if ($connection->query($sql) === TRUE) {
  
   $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> New Sub-Category added successfully.
		</div>" ;
		header('Location: ../../product-sub-category-add.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Sub-Category could not be added.
		</div>" ;
		header('Location: ../../product-sub-category-add.php');
 
}

$connection->close();

?>