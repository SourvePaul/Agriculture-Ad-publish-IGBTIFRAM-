<?php
  session_start();
  require_once('../db_connect.php');
  $admin_id = $_SESSION['adminId'];
  
   $count = count($_POST['product_id']);
   $id_implode = implode('#',$_POST['product_id'])."<br>";
   $id_explode = explode('#',$id_implode);
   $qty_implode = implode('#',$_POST['product_qty'])."<br>";
   $qty_explode = explode('#',$qty_implode);
  
  for($i=0;$i<$count;$i++){
  
  $product_id = $id_explode[$i];
  //Selling Price, In stock
  $sql = "SELECT product_selling_price,product_qty,product_code FROM products where product_id = '$product_id' ";  
 	$result = $connection->query($sql);
    while($row = $result->fetch_assoc())  { 
		$product_id[$i];
		$in_stock = $row['product_qty'];
		$product_selling_price = $row['product_selling_price'];
    $product_code = $row['product_code'];
		$qty_explode[$i];
    }
    $total = $qty_explode[$i] * $product_selling_price;
	
  if(intval($qty_explode[$i]) > intval($in_stock)){

         $_SESSION['discard_invoice_print'] = 'true';
         $_SESSION['message'] = "<div class=\"alert alert-danger alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                <h4><i class=\"icon fa fa-ban\"></i> Failed!</h4>
                This Product is out of Stock.<br>
                Product Code  : ".$product_code."<br>
                Current Stock : ".$in_stock."
              </div>";
    header('Location: ../../sales-addnp.php');
  }
  else{
	$cart_sql = "INSERT INTO carts (product_id,product_selling_price,in_stock,quantity,total,admin_id) 
		VALUES ('$product_id','$product_selling_price','$in_stock','$qty_explode[$i]','$total','$admin_id')";
	$connection->query($cart_sql);
  }
  }
  
	header('Location: ../../sales-addnp.php');

           
$connection->close();

?>