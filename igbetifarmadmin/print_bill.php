<?php
  require_once('php_action/db_connection_checker.php');
  require_once('php_action/db_connect.php');
  //require_once('php_action/GetCurrencyClass.php');
  $currency = "Dirham";
  $order_id = $_GET['order_id'];

  $sql = "SELECT * FROM orders WHERE order_id = '$order_id'";
  $result = $connection->query($sql);              
  while($row = $result->fetch_assoc()) {  
    $cust_id = $row['cust_id'];
    $date = $row['date']; 
    $sub_total = $row['sub_total']; 
    $vat = $row['vat']; 
    $discount = $row['discount']; 
    $grand_total = $row['grand_total']; 
    $paid = $row['paid']; 
    $due = $row['due']; 
    // CASH & RECEIVED
   $cash = $row['cash']; 
   $changed = $row['changed']; 
    // END CASH & RECEIVED
    }
  $sys_sql = "SELECT * FROM settings";
  $result = $connection->query($sys_sql);              
  while($sys_row = $result->fetch_assoc()) {  
    $system_name = $sys_row['system_name'];
    $address = $sys_row['address']; 
    $mobile = $sys_row['phone']; 
    }
?>
<style>
html *
{
   font-size: 12 !important;
   color: #000 !important;
   font-family: sans-serif !important;
}
div.ex1 {
    width:250px;
    margin: auto;


}

.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 3px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
}

.button1:hover {
    background-color: #4CAF50;
    color: white;
} 

.button2 {
    background-color: white; 
    color: black; 
    border: 2px solid #008CBA;
} 

.button2:hover {
    background-color: #008CBA;
    color: white;
}

.button3 {
    background-color: white; 
    color: black; 
    border: 2px solid #f44336;
} 

.button3:hover {
    background-color: #f44336;
    color: white;
}

.button4 {
    background-color: white;
    color: black;
    border: 2px solid #e7e7e7;
}

.button4:hover {background-color: #e7e7e7;}

.button5 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
}

.button5:hover {
    background-color: #555555;
    color: white;
}
	
	div.fontsize {
	font-size: 15px !important;
	}	
	div.fontsize1 {
	font-size: 20px !important;
	 font-weight: bold;
	}	
</style>

	
<!Doctype html>
<div class="ex1">
<html>


<!-- Changes here! -->
<style type="text/css" media="print">
.dontprint
{ display: none; }
</style>
  <style type="text/css" media="print">
      @page 
      {
          height: auto;
          size: auto;   /* auto is the initial value */
          margin: 0mm;  /* this affects the margin in the printer settings */
      }
  </style>
<div class="dontprint">
<!--<a href="clear_reciept.php" onclick="if (window.print) window.print();" autofocus><strong><center>[PRINT]</center></strong></a>-->

</div>
<!-- Changes here! -->
	<head>
		<meta charset="utf-8">
		<title>Customer Invoice</title>
		

	</head>
<body onload="window.print();">
	
			
				
				<strong>
				<center>
				<?php echo $system_name; ?><br/>
				</strong>
			     Cafe Shop<br/>
				<?php echo $address; ?>
				<?php echo "052-613 0141"; ?>
				</center>
				<center>------------------------------------------------------------- <br /></center>
				<center>
				
				<strong>CUSTOMER INVOICE</strong><br>
					
				
						<!--<br />-->
				<?php date_default_timezone_set('Asia/Dhaka');						
					echo $date = date('F j, Y h:i:s a', time()); 
				?>
				</center>
				<table class="table table-bordered">
				<tbody>				
				<tr><!--border-style: solid; to check the width below--> 
					<td><div style='width: 140px; text-align: left;'>Invoice: <?php echo $order_id ; ?></div></td>	
					<td><div style='width: 90px; text-align: right;'>User: <?php echo $_SESSION['adminName']; ?></div></td>
				</tr>
				</tbody>
				</table>
				<center>------------------------------------------------------------- <br /></center>
				<center>
	
				<strong>TOTAL: </strong><br />
				<div class="fontsize1">
				<?php echo "$currency ".number_format($grand_total,2); ?>				
				</div>
				
				
				</center>
				<center>-------------------------------------------------------------</center>

				<table class="table table-bordered">
					<tbody>
				<tr><!--border-style: solid; to check the width below--> 
					<th><div style='width: 135; text-align: left;'>Item</div></th>
					<th><div style='width: 30; text-align: right;'>Rate</div></th>	
					<th><div style='width: 30; text-align: right;'>Qty</div></th>
					<th><div style='width: 30; text-align: right;'>Total</div></th>
				</tr>
			
			 <?php
                  $srl= 0;
                  $sql = "SELECT * FROM order_items WHERE order_id = '$order_id' ";  
                  $result = $connection->query($sql);
                  while($row = $result->fetch_assoc())  { 
                    $count = count(explode("," ,$row['product_id']));
                    $single_product = explode("," ,$row['product_id']); 
                    $single_rate = explode("," ,$row['rate']); 
                    $single_quantity = explode("," ,$row['quantity']); 
                    while($count>0){
                  ?> 
               
                <tr>
                
                  <td>
                  <div style='width: 135; text-align: left;'>
                  <?php 
                         $p_sql = "SELECT product_name FROM products WHERE product_id = '$single_product[$srl]'";
                         $p_result = $connection->query($p_sql);                 
                          while($p_row = $p_result->fetch_assoc()) {  
                           echo $p_row['product_name']; 
                          } 
                      ?>
                  </div></td>
                  <td><div style='width: 30; text-align: right;'><?php echo "".$single_rate[$srl];; ?></div></td>
                  <td><div style='width: 30; text-align: right;'><?php echo $single_quantity[$srl]; ?></div></td>
                  <td><div style='width: 30; text-align: right;'><?php echo "".($single_rate[$srl]*$single_quantity[$srl]); ?></div></td>
                </tr>
                <?php 
                  $count--;
                  $srl++; 
                    } 
                  } 
                ?>		

				</tbody>
				</table>
										
					
					
				<center>------------------------------------------------------------- <br /></center>
				<table class="table table-bordered">
					<tbody>
						<tr><!--border-style: solid; to check the width below--> 
							<td><div style='width: 140px; text-align: left;'><strong>Due:</strong></div></td>	
							<td><div style='width: 90px; text-align: right;'><?php echo $due; ?></div></td>
						</tr>
						
						<tr><!--border-style: solid; to check the width below--> 
							<td><div style='width: 140px; text-align: left;'><strong>Discount:</strong></div></td>	
							<td><div style='width: 90px; text-align: right;'><?php echo $discount; ?></div></td>
						</tr>
						<tr><!--border-style: solid; to check the width below--> 
							<td><div style='width: 140px; text-align: left;'><strong>Paid:</strong></div></td>	
							<td><div style='width: 90px; text-align: right;'><?php echo $paid; ?></div></td>
						</tr>
						<tr><!--border-style: solid; to check the width below--> 
							<td><div style='width: 140px; text-align: left;'><strong>Received:</strong></div></td>	
							<td><div style='width: 90px; text-align: right;'><?php echo $cash; ?></div></td>
						</tr>
						<tr><!--border-style: solid; to check the width below--> 
							<td><div style='width: 140px; text-align: left;'><strong>Changed:</strong></div></td>	
							<td><div style='width: 90px; text-align: right;'><?php echo $changed; ?></div></td>
						</tr>
            <tr><!--border-style: solid; to check the width below--> 
							<td><div style='width: 140px; text-align: left;'><strong>Vat:</strong></div></td>	
							<td><div style='width: 90px; text-align: right;'><?php echo $vat; ?></div></td>
						</tr>
						<tr><!--border-style: solid; to check the width below--> 
							<td><div style='width: 140px; text-align: left;'><strong>Grand Total:</strong></div></td>	
							<td><div style='width: 90px; text-align: right;'><?php echo $sub_total; ?></div></td>
						</tr>
						<tr><!--border-style: solid; to check the width below--> 
							<td colspan='2'><div style='text-align: left;'><?php //echo "<b>In Words:</b> ".getCurrency($sub_total); ?></div></td>				
						</tr>																
					</tbody>
				</table>								
				<center>------------------------------------------------------------- <br /></center>

				<center>
				<strong><?php echo  $system_name; ?></strong>
				<br><br>
				Thank you <strong>shopping at <?php echo  $system_name; ?></strong>
				<br>
			
				</center>
	
</html>
</div>
<br /><br />
