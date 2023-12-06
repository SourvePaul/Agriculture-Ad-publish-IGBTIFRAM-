<?php 
  error_reporting(0);
  require_once('../php_action/db_connection_checker.php'); 
  require_once('../php_action/db_connect.php'); 
  $sys_sql = "SELECT * FROM settings";
  $result = $connection->query($sys_sql);              
  while($sys_row = $result->fetch_assoc()) {  
    $system_name = $sys_row['system_name'];  
    $address = $sys_row['address'];  
  }
  $net_buy = 0;
  $net_sell = 0;
  $net_qty = 0; 
  $net_total = 0;  
?>    
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php include('../php_action/title.php'); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">

  <style type="text/css" media="print">
      @page 
      {
          size: auto;   /* auto is the initial value */
          margin: 0mm;  /* this affects the margin in the printer settings */
      }
  </style>
  
  </head>
<body onload="window.print();" style="margin-top: 5%;">
<div class="container">
  <center>
  <h1><?php echo $system_name;?></h1>
  <p><?php echo $address;?></p>
  </center>	 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3>
        SOLD PRODUCTS
      </h3>

		<table>
			<tr>
				<th>Product: </th>
				<td>
						<?php 
						if($_GET['product_id']!=''){
						$product_id = $_GET['product_id'];
                         $p_sql = "SELECT product_name FROM products WHERE product_id = '$product_id'";
                         $p_result = $connection->query($p_sql);                 
                          while($p_row = $p_result->fetch_assoc()) {  
                           echo $p_row['product_name']; 
                          }			
						}
						else {
							echo "All";
							}
						?>
				</td>
			</tr>
			<tr>
				<th>From: </th>
				<td>
						<?php 
						if($_GET['start_date']!=''){  
                           echo $_GET['start_date'];                          		
						}
						else{
							echo "From the begining";
						}
						?>
				</td>
			</tr>
			<tr>
				<th>To: </th>
				<td>
						<?php 
						if($_GET['end_date']!=''){  
                           echo $_GET['end_date'];                          		
						}
						else{
							echo date('Y-m-d');
						}
						?>
				</td>
			</tr>			
		</table>
		<br>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">


        <div class="col-md-12">
         

          <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width:2%">#</th>
                   <th style="width:25%">Name</th>
				   <th style="width:7%;text-align:center">#Invoice</th>
                   <th style="width:7%;text-align:center">Date</th>				   
				   <th style="width:7%;text-align:center">Buy/Unit</th>
                   <th style="width:7%;text-align:center">Sell/Unit</th>
                   <th style="width:7%;text-align:center">Qty</th>                   
                   <th style="width:7%;text-align:center">Total</th>                                                                                                                                                            
                </tr>
				
                </thead>
                <tbody>
                <?php

                  if(($_GET['product_id']=='') && ($_GET['start_date']=='') && ($_GET['end_date']=='')){

                  $number = 1; 
                  $sql = "SELECT * FROM order_items ";  
                  $result = $connection->query($sql);
                   while($row = $result->fetch_assoc())  { 
                   
                   $srl= 0;
                   $count = count(explode("," ,$row['product_id']));
                   $single_product = explode("," ,$row['product_id']); 
                   $single_rate = explode("," ,$row['rate']); 
                   $single_quantity = explode("," ,$row['quantity']); 
                   while($count>0){
                  ?> 
               
                <tr>
                  <td><?php echo $number++; ?></td>
                  <td><?php 
                         $p_sql = "SELECT product_name FROM products WHERE product_id = '$single_product[$srl]'";
                         $p_result = $connection->query($p_sql);                 
                          while($p_row = $p_result->fetch_assoc()) {  
                           echo $p_row['product_name']; 
                          } 
                      ?>
                  </td>
                  <td>
                  <?php echo $row['order_id']; ?>
                  </td>
                  <td>
                     <?php 
                         $p_sql = "SELECT date FROM orders WHERE order_id = ".$row['order_id'];
                         $p_result = $connection->query($p_sql);                 
                          while($p_row = $p_result->fetch_assoc()) {  
                           echo $p_row['date']; 
                          } 
                      ?> 
                  </td>                    
                  <td style="text-align:right"><?php 
                         $p_sql = "SELECT product_purchase_price FROM products WHERE product_id = '$single_product[$srl]'";
                         $p_result = $connection->query($p_sql);                 
                          while($p_row = $p_result->fetch_assoc()) {  
                           $net_buy+=$p_row['product_purchase_price']; echo " ".$p_row['product_purchase_price']; 
                          } 
                      ?>
                  </td> 
                  <td style="text-align:right"><?php echo " ".$single_rate[$srl];; ?></td>  
                  <td style="width:7%;text-align:center"><?php $net_qty+=$single_quantity[$srl];echo$single_quantity[$srl]; ?></td>
                  <td style="text-align:right"><?php $net_total+=($single_rate[$srl]*$single_quantity[$srl]); echo " ".($single_rate[$srl]*$single_quantity[$srl]); ?></td>

                </tr>
                <?php 
                  $count--;
                  $srl++; 
                    } 
                  } 
                 } 
                ?>

                <?php

                  if($_GET['product_id']=='' && isset($_GET['start_date']) && isset($_GET['end_date'])){

                  
                  $start_date = $_GET['start_date'];
                  $end_date = $_GET['end_date'];
                  $number = 1; 
                  $sql = "SELECT * FROM order_items";  
                  $result = $connection->query($sql);

                   while($row = $result->fetch_assoc())  { 
                    
                    $p_sql = "SELECT date FROM orders WHERE order_id = ".$row['order_id'];
                    $p_result = $connection->query($p_sql);                 
                    while($p_row = $p_result->fetch_assoc()) {  
                           $order_date = $p_row['date']; 
                          } 
                   if($order_date >= $start_date && $order_date <= $end_date){    
                   $srl= 0;
                   $count = count(explode("," ,$row['product_id']));
                   $single_product = explode("," ,$row['product_id']); 
                   $single_rate = explode("," ,$row['rate']); 
                   $single_quantity = explode("," ,$row['quantity']); 
                   while($count>0){
                  ?> 
               
                <tr>
                  <td><?php echo $number++; ?></td>
                  <td><?php 
                         $p_sql = "SELECT product_name FROM products WHERE product_id = '$single_product[$srl]'";
                         $p_result = $connection->query($p_sql);                 
                          while($p_row = $p_result->fetch_assoc()) {  
                           echo $p_row['product_name']; 
                          } 
                      ?>
                  </td>
                  <td>
                  <?php echo $row['order_id']; ?>
				  </td>
                  <td>
                     <?php 
                         $p_sql = "SELECT date FROM orders WHERE order_id = ".$row['order_id'];
                         $p_result = $connection->query($p_sql);                 
                          while($p_row = $p_result->fetch_assoc()) {  
                           echo $p_row['date']; 
                          } 
                      ?> 
                  </td>                    
                  <td style="text-align:right"><?php 
                         $p_sql = "SELECT product_purchase_price FROM products WHERE product_id = '$single_product[$srl]'";
                         $p_result = $connection->query($p_sql);                 
                          while($p_row = $p_result->fetch_assoc()) {  
                           $net_buy+=$p_row['product_purchase_price']; echo " ".$p_row['product_purchase_price'];  
                          } 
                      ?>
                  </td> 
                  <td style="text-align:right"><?php echo " ".$single_rate[$srl];; ?></td>  
                  <td style="width:7%;text-align:center"><?php $net_qty+=$single_quantity[$srl];echo$single_quantity[$srl]; ?></td>
                  <td style="text-align:right"><?php $net_total+=($single_rate[$srl]*$single_quantity[$srl]); echo " ".($single_rate[$srl]*$single_quantity[$srl]); ?></td>

                </tr>
                <?php 
                  $count--;
                  $srl++; 
                    } 
                  } 
                 } 
               }
                ?>

                <?php

                  if($_GET['product_id']!='' && isset($_GET['start_date']) && isset($_GET['end_date'])){

                  $search_product_id = $_GET['product_id'];
                  $start_date = $_GET['start_date'];
                  $end_date = $_GET['end_date'];
                  $number = 1; 
                  $sql = "SELECT * FROM order_items";  
                  $result = $connection->query($sql);

                   while($row = $result->fetch_assoc())  { 
                    
                    $p_sql = "SELECT date FROM orders WHERE order_id = ".$row['order_id'];
                    $p_result = $connection->query($p_sql);                 
                    while($p_row = $p_result->fetch_assoc()) {  
                           $order_date = $p_row['date']; 
                          } 

                   if($order_date >= $start_date && $order_date <= $end_date){ 

                   $srl= 0;
                   $count = count(explode("," ,$row['product_id']));
                   $single_product = explode("," ,$row['product_id']); 
                   $single_rate = explode("," ,$row['rate']); 
                   $single_quantity = explode("," ,$row['quantity']); 

                   while($count>0){
                    if($search_product_id == $single_product[$srl]){
                  ?> 
               
                <tr>
                  <td><?php echo $number++; ?></td>
                  <td><?php 
                         $p_sql = "SELECT product_name FROM products WHERE product_id = '$single_product[$srl]'";
                         $p_result = $connection->query($p_sql);                 
                          while($p_row = $p_result->fetch_assoc()) {  
                           echo $p_row['product_name']; 
                          } 
                      ?>
                  </td>
                   <td>
                   <?php echo $row['order_id']; ?>
				  </td>
                  <td>
                     <?php 
                         $p_sql = "SELECT date FROM orders WHERE order_id = ".$row['order_id'];
                         $p_result = $connection->query($p_sql);                 
                          while($p_row = $p_result->fetch_assoc()) {  
                           echo $p_row['date']; 
                          } 
                      ?> 
                  </td>                   
                  <td style="text-align:right"><?php 
                         $p_sql = "SELECT product_purchase_price FROM products WHERE product_id = '$single_product[$srl]'";
                         $p_result = $connection->query($p_sql);                 
                          while($p_row = $p_result->fetch_assoc()) {  
                           $net_buy+=$p_row['product_purchase_price']; echo " ".$p_row['product_purchase_price']; 
                          } 
                      ?>
                  </td> 
                  <td style="text-align:right"><?php echo " ".$single_rate[$srl];; ?></td>  
                  <td style="width:7%;text-align:center"><?php $net_qty+=$single_quantity[$srl];echo$single_quantity[$srl]; ?></td>
                  <td style="text-align:right"><?php $net_total+=($single_rate[$srl]*$single_quantity[$srl]); echo " ".($single_rate[$srl]*$single_quantity[$srl]); ?></td>

                </tr>
                <?php 
                  $count--;
                  $srl++; 
                    } 
                   else{
                    $count--;
                   $srl++; 
                   } 
                  } 
                }
                 } 
               }
                ?>
				
                <tr>
				   <th colspan="4" style="text-align:center">Net</th>
				   <th style="text-align:right"><?php echo $net_buy; ?></th>
                   <th style="text-align:right"></th>
                   <th style="text-align:center"><?php echo $net_qty; ?></th>                   
                   <th style="text-align:right"><?php echo $net_total; ?></th>                                                                                                                                                                           
                </tr>
				<tr>
				   <th colspan="4" style="text-align:center">Profit From Products</th>
				   <th colspan="4" style="text-align:right"><?php echo $net_total; echo "-"; echo $net_buy; echo"="; echo $net_total-$net_buy; ?></th>                                                                                                                                                                           
                </tr>
			
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->

</body>
</html>
