<?php
session_start();
error_reporting(0);
require('../db_connect.php');

//var_dump($_POST);
//This block is for image upload
$product_image = time().$_FILES['product_image']['name'];
$temporary_location= $_FILES['product_image']['tmp_name'];
$myLocation= '../../images/products/'.$product_image;
move_uploaded_file($temporary_location, $myLocation );
//End of image block

// Receiving data
$product_name = $_POST['product_name'];
$product_code = $_POST['product_code'];
$cat_id = $_POST['cat_id'];
$sub_cat_id = $_POST['sub_cat_id'];
$product_qty = $_POST['product_qty'];
$product_purchase_price = $_POST['product_purchase_price'];
$product_selling_price = $_POST['product_selling_price'];
$supplier_id = $_POST['supplier_id'];

//var_dump($_POST);

$sql = "INSERT INTO `products` ( `cat_id`, `sub_cat_id`, `product_name`, `product_code`, `product_purchase_price`, `product_selling_price`, `product_qty`, `product_image`, `supplier_id`) VALUES ('$cat_id','$sub_cat_id','$product_name','$product_code','$product_purchase_price','$product_selling_price','$product_qty','$product_image','$supplier_id')";

if ($connection->query($sql) === TRUE) {
  
   $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> New product added successfully.
		</div>" ;
		header('Location: ../../product-add.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> This Product Code already been used. Product Code Should be Unique.
		</div>" ;
		header('Location: ../../product-add.php');
 
}

$connection->close();

?>