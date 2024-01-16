<?php
  error_reporting(0);
  require_once('../php_action/db_connection_checker.php'); 
  require_once('../php_action/db_connect.php');
  $raw_product_id = $_POST['generate'];
  $sql = "SELECT * FROM raw_products where raw_product_id = '$raw_product_id'";
  $result = $connection->query($sql);
  // output data of each row  
   while($row = $result->fetch_assoc()) { 
   $raw_product_code = $row['raw_product_code'];
   $price = $row['raw_product_purchase_price'];
}					   
?>
<style type="text/css">
      @page 
      {
          
          width: 8.99922cm;
          height: 5.99948cm;
          size: auto;   /* auto is the initial value */
          margin: 0mm;  /* this affects the margin in the printer settings */
      }
   
</style>
<script>
window.print();
</script>
<?php
error_reporting(0);
include 'barcode128.php';
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


 margin-top:3px;
 margin-right:26px;
 margin-left:26px;
}
.element {
  font-size: 2em;
}
body {
        width: 8.99922cm;
        height:5.99948cm;
        }
</style>
</head>
<body>
<?php
while($var!=0){
?>
<p><?php echo bar128(stripcslashes("$raw_product_code")); echo " "; echo "Price Dh "; echo $price; ?><br>Raw
</p>
<?php //echo bar128(stripcslashes("$product_code&nbsp;TK:$price"))?><?php //echo ""; ?>
<?php $var--; } 
if($var == 0){
	header('Location : ../barcode_raw.php');
}
?>
</body>
</html>