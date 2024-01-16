<?php
  error_reporting(0);
//  echo "test page";
//  exit();
  
  require_once('../php_action/db_connection_checker.php'); 
  require_once('../php_action/db_connect.php');
  $product_id = $_POST['generate'];
  $sql = "SELECT * FROM products where product_id = '$product_id'";
  $result = $connection->query($sql);
  // output data of each row  
   while($row = $result->fetch_assoc()) { 
   $product_code = $row['product_code'];
   $price = $row['product_selling_price'];
}					   
?>
<style type="text/css">
      @page 
      {
          
          width: 12.2cm;
          height: 3.99948cm;
          size: auto;   /* auto is the initial value */
          margin: 0mm;  /* this affects the margin in the printer settings */
      }
   
</style>
<script>
window.print();
</script>
<?php
error_reporting(0);
include 'barcode1282.php';
$var = $_POST['number'];
?>
<!DOCTYPE html>
<html>
<head>
<style>
p{
 display:inline;
 word-wrap: break-word;
 float:left;
font-size:12px;


 margin-top: 6px;
 margin-right: 13px;
 margin-left: 26px;
}
.element {
  font-size: 2em;
}
body {
        width: 12.2cm;
        height: 3.99948cm;
        }
</style>
</head>
<body>
<?php
while($var!=0){
?>
<p><?php echo bar128(stripcslashes("$product_code")); echo " "; echo "Price Tk "; echo $price; ?><br>Grocery
</p>
<?php //echo bar128(stripcslashes("$product_code&nbsp;TK:$price"))?><?php //echo ""; ?>
<?php $var--; } 
if($var == 0){
	header('Location : ../barcode.php');
}
?>
</body>
</html>