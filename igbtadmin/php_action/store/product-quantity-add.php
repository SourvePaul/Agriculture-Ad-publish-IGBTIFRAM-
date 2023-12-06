<?php
 session_start();

require('../db_connect.php');

var_dump($_POST);


// Receiving data  

$product_id = $_POST['product_id'];
$product_qty = $_POST['product_qty'];
$product_purchase_price = $_POST['product_purchase_price'];

  $ex_sql = "SELECT * FROM products WHERE product_id = '$product_id'";  
  $result = $connection->query($ex_sql);
  while($row = $result->fetch_assoc())  {  

    $ex_product_qty  = $row['product_qty'];
    $ex_product_purchase_price  = $row['product_purchase_price'];

  }

$multiply_current = $product_qty * $product_purchase_price;
$multiply_ex = $ex_product_qty * $ex_product_purchase_price;

$total_of_multiply = $multiply_current + $multiply_ex;
$total_of_qty = $product_qty + $ex_product_qty;

$current_rate = $total_of_multiply/$total_of_qty ;
$product_purchase_price =  number_format($current_rate, 2);

$sql = "UPDATE products set product_purchase_price = '$product_purchase_price', product_qty = '$total_of_qty'
	  where product_id = ".$product_id;

if ($connection->query($sql) === TRUE) {
  
	$_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> Product Quantity Updated Successfully.
		</div>" ;
		header("Location: ../../product-list.php");
   
}
else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Product Quantity could not be Updated.
		</div>" ;
		header("Location: ../../product-list.php");
 
}

$connection->close();

?>