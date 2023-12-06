<?php
session_start();
error_reporting(0);
require('../db_connect.php');

//var_dump($_POST);
//This block is for image upload
$raw_product_image = time().$_FILES['raw_product_image']['name'];
$temporary_location= $_FILES['raw_product_image']['tmp_name'];
$myLocation= '../../images/products/'.$raw_product_image;
move_uploaded_file($temporary_location, $myLocation );
//End of image block

// Receiving data
$date = $_POST['date'];
$raw_product_name = $_POST['raw_product_name'];
$raw_product_code = $_POST['raw_product_code'];
//$cat_id = $_POST['cat_id'];
//$sub_cat_id = $_POST['sub_cat_id'];
$raw_product_qty = $_POST['raw_product_qty'];
$raw_product_purchase_price = $_POST['raw_product_purchase_price'];
//$product_selling_price = $_POST['product_selling_price'];
$supplier_id = $_POST['supplier_id'];
$comments = $_POST['comments'];
//var_dump($_POST);

$sql = "INSERT INTO `raw_products` ( `date`,`raw_product_name`, `raw_product_code`, `raw_product_purchase_price`, `raw_product_qty`, `raw_product_image`, `supplier_id`, `comments`) VALUES ('$date','$raw_product_name','$raw_product_code','$raw_product_purchase_price','$raw_product_qty','$raw_product_image','$supplier_id','$comments')";

if ($connection->query($sql) === TRUE) {
  
   $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> New Raw product added successfully.
		</div>" ;
		header('Location: ../../purchase-rawmaeetrial.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> This Raw Product Code already been used. Raw Product Code Should be Unique.
		</div>" ;
		header('Location: ../../purchase-rawmaeetrial.php');
 
}

$connection->close();

?>