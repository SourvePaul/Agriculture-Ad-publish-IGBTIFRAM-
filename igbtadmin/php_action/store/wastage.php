<?php
session_start();

require('../db_connect.php');


// Receiving data
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity']; 
$details = $_POST['details'];
$date = $_POST['date'];

$cost_sql = "SELECT * FROM products where product_id = '$product_id'";
  $result = $connection->query($cost_sql);              
    while($c_row = $result->fetch_assoc()) {  
    $cost = $c_row['product_purchase_price'];  
   }
$total_cost =  $cost * $quantity;

//Deduct quantity
$p_sql = "UPDATE products set product_qty = (product_qty - '$quantity') where product_id = '$product_id' ";
$connection->query($p_sql);

//Add in wastage table
$sql = "INSERT INTO wastages (product_id,quantity,cost,details,date) 
		VALUES ('$product_id','$quantity','$total_cost','$details','$date')";

if ($connection->query($sql) === TRUE) {
  
   $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> New Wastage Info added successfully.
		</div>" ;
		header('Location: ../../wastage.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Wastage could not be added.
		</div>" ;
		header('Location: ../../wastage.php');
 
}

$connection->close();

?>