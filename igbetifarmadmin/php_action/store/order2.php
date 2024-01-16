<?php
session_start();

require_once('../db_connect.php');

$admin_id = $_SESSION['adminId'];

// Receiving data

//Checking if new Customer
if($_POST['cust_name']!=""){

	$cust_name = $_POST['cust_name'];
	$cust_phone = $_POST['cust_phone'];
	$cust_add = "";
	$cust_type = "Regular";

	$c_sql = "INSERT INTO customers (cust_name,cust_phone,cust_add,cust_type) 
		VALUES ('$cust_name','$cust_phone','$cust_add','$cust_type')";		
	$connection->query($c_sql);

	$c_id_sql = "SELECT MAX(cust_id) FROM customers";
	$excute = mysqli_query($connection,$c_id_sql);                
   	while($c_id_row=mysqli_fetch_array($excute)){ 
    $cust_id = $c_id_row[0]; 
    }
}

elseif($_POST['customer_id']!=""){

	$cust_id = $_POST['customer_id'];
}

else{

	$cust_id = '6';
}


//End Checking if new Customer

$date = $_POST['date'];
$sub_total = $_POST['sub_total'];
$vat = $_POST['vat'];
$discount = $_POST['discount'];
$grand_total = $_POST['grand_total'];
$paid = $_POST['paid'];
$due = $_POST['due'];

$cash = $_POST['cash'];
$changed = $_POST['changed'];

$payment_type = $_POST['payment_type'];

if($due == 0){
	$payment_status = 1;
}
else{
	$payment_status = 0;
}

/*
$sql = "INSERT INTO orders 
       (date,cust_id,sub_total,vat,discount,grand_total,paid,due,payment_type,payment_status) 
		VALUES 
		('$date','$cust_id',$sub_total',$vat','$discount','$grand_total','$paid','$due','$payment_type','$payment_status')";
*/
$sql = "INSERT INTO orders (date,cust_id,sub_total,vat,discount,grand_total,paid,due,cash,changed,payment_type,payment_status) 
		VALUES ('$date','$cust_id','$sub_total','$vat','$discount','$grand_total','$paid','$due','$cash','$changed','$payment_type','$payment_status')";		

if ($connection->query($sql) === TRUE) {

$sql = "select Max(order_id) from orders";
$excute = mysqli_query($connection,$sql);

while($row=mysqli_fetch_array($excute)){

    $order_id = $row[0];

}

$product_id = array();
$quantity = array();
$rate = array();

$sql = "select * from carts";
$excute = mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($excute)){
    
    $qt = $row['quantity'];
    $sql2 = "UPDATE products set product_qty = product_qty - '$qt' where product_id = ".$row['product_id'];
    $connection->query($sql2);

    array_push($product_id,$row['product_id']);
    array_push($quantity,$row['quantity']);
    array_push($rate,$row['product_selling_price']);

}
 $product_id = implode(",",$product_id);
 $quantity = implode(",",$quantity);
 $rate = implode(",",$rate);

$sql = "INSERT INTO order_items (order_id,product_id,quantity,rate) 
		VALUES ('$order_id','$product_id','$quantity','$rate')";		

$connection->query($sql);

/*
$sql3 = "DELETE FROM carts WHERE admin_id = '$admin_id'";
$connection->query($sql3);
*/

$sql3 = "DELETE FROM carts";
$connection->query($sql3);
  
	$_SESSION['message'] = "<div class=\"alert alert-success alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                <h4><i class=\"icon fa fa-check\"></i> Success!</h4>
                New Sales added successfully.
              </div>";
		header('Location: ../../sales-addnp.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                <h4><i class=\"icon fa fa-ban\"></i> Failed!</h4>
                Something went wrong!
              </div>";
		header('Location: ../../sales-addnp.php');
 
}

$connection->close();

?>