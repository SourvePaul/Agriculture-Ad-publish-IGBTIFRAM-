<?php
  require_once('php_action/db_connection_checker.php'); 
  require_once('php_action/db_connect.php');
  $admin_id = $_SESSION['adminId'];
  
   $count = count($_POST['product_id']);
   echo $id_implode = implode('#',$_POST['product_id'])."<br>";
   $id_explode = explode('#',$id_implode);
   $qty_implode = implode('#',$_POST['product_qty'])."<br>";
   $qty_explode = explode('#',$qty_implode);
  
  for($i=0;$i<$count;$i++){
  
  $product_id = $id_explode[$i];
  //Selling Price, In stock
  $sql = "SELECT product_selling_price,product_qty FROM products where product_id = '$product_id' ";  
 	$result = $connection->query($sql);
    while($row = $result->fetch_assoc())  { 
		$product_id[$i];
		$in_stock = $row['product_qty'];
		$product_selling_price = $row['product_selling_price'];
		$qty_explode[$i];
    }
    $total = $qty_explode[$i] * $product_selling_price;
	
		
	$cart_sql = "INSERT INTO carts (product_id,product_selling_price,in_stock,quantity,total,admin_id) 
		VALUES ('$product_id','$product_selling_price','$in_stock','$qty_explode[$i]','$total','$admin_id')";
	$connection->query($cart_sql);
  }
  
	header('Location: sales-add-test.php');


	


?>
                