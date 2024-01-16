<?php

require_once 'db_connect.php';

if(!empty($_POST['product_id'])) {
	
	$product_id= $_POST['product_id'];
	
	$sql = mysqli_query($connection,"select product_selling_price from products where product_id = '$product_id'");

    while($value=mysqli_fetch_array($sql)){

	$rate = $value['product_selling_price'];
    }
	
	echo $rate;
	
}

?>