<?php
 session_start();

require('../db_connect.php');


//Handling image
$product_image_new = $_FILES['product_image_new']['name'];
if($product_image_new != ""){
	$product_image = time().$_FILES['product_image_new']['name'];
	$temporary_location= $_FILES['product_image_new']['tmp_name'];
	$myLocation= '../../images/products/'.$product_image;
	move_uploaded_file($temporary_location, $myLocation );
}
else {
	$product_image = $_POST['product_image']; 
}
//End of Handling image 

// Receiving data
	$product_id = $_POST['product_id'];
    $cat_id  = $_POST['cat_id'];
    $sub_cat_id  = $_POST['sub_cat_id'];
    $product_name  = $_POST['product_name'];
    $product_code  = $_POST['product_code'];
    $product_purchase_price  = $_POST['product_purchase_price'];
    $product_selling_price  = $_POST['product_selling_price'];
    $product_qty  = $_POST['product_qty'];
    $product_image  = $product_image;
    $supplier_id  = $_POST['supplier_id'];
    $status  = $_POST['status'];


	$sql = "UPDATE products set product_name='$product_name', cat_id = '$cat_id',
	 sub_cat_id='$sub_cat_id', product_code = '$product_code', product_purchase_price = '$product_purchase_price',
	 product_selling_price='$product_selling_price', product_qty = '$product_qty', product_image = '$product_image',supplier_id='$supplier_id', status = '$status'
	  where product_id = ".$product_id;

if ($connection->query($sql) === TRUE) {
  
	$_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> Product Updated Successfully.
		</div>" ;
		header("Location: ../../product-list.php");
   
}
else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Product could not be Updated.
		</div>" ;
		header("Location: ../../product-list.php");
 
}



$connection->close();

?>