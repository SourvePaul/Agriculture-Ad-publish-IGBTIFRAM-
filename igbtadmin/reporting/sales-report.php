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
  $net_sub_total = 0;
  $net_disc = 0;
  $net_svc = 0; 
  $net_total = 0; 
  $net_paid = 0;  
  $net_due = 0;  
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
        SALES REPORT
      </h3>

		<table>

			<tr>
				<th>From: </th>
				<td>
						<?php 
						if($_GET['start_date']!=''){  
                           echo $_GET['start_date'];                          		
						}
						else{
							echo date('Y-m-01');
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
                  <th style="width:4%">#Inv</th>
                  <th style="width:12%">Client</th>
                  <th style="width:9%">Date</th>
                  <th style="width:8%;text-align: center">Sub-Total</th>
                  <th style="width:8%;text-align: center">Vat</th>
                  <th style="width:8%;text-align: center">Disc</th>
                  <th style="width:8%;text-align: center">SVC</th>
                  <th style="width:8%;text-align: center">Total</th>
                  <th style="width:8%;text-align: center">Paid</th>
                  <th style="width:8%;text-align: center">Due</th>
                  <th style="width:11%">Type</th>
                  <th style="width:6%">User</th>
                </tr>
				
                </thead>
                <tbody>
                 <?php

                  if($_GET['start_date']=='' && $_GET['end_date']==''){

                  $start_date = date('Y-m-01') ;
                  
                  $sql = "SELECT * FROM orders WHERE date >= '$start_date' ";  
                  $result = $connection->query($sql);
                  while($row = $result->fetch_assoc())  {  
                  ?> 
                
                <tr>
                  <td><?php echo $row['order_id']; ?></td>
                  <td><?php 
                  $cust_id = $row['cust_id'];
                  $c_sql = "SELECT cust_name FROM customers WHERE cust_id = '$cust_id'";
                  $c_result = $connection->query($c_sql);                  
                   while($c_row = $c_result->fetch_assoc()) {  
                  echo $c_row['cust_name']; 
                   }
 
                   ?></td>
                  <td><?php echo $row['date']; ?></td>
                  <td style="text-align: right"><p><?php echo $net_sub_total+=$row['sub_total']; ?></p></td>
                  <td style="text-align: right"><?php echo $row['vat']; ?></td>
                  <td style="text-align: right"><?php echo $net_disc+=$row['discount']; ?></td>
                  <td style="text-align: right"><?php echo $net_svc+=$row['svc']; ?></td>
                  <td style="text-align: right"><?php echo $net_total+=$row['grand_total']; ?></td>
                  <td style="text-align: right"><?php echo $net_paid+=$row['paid']; ?></td>
                  <td style="text-align: right"><?php echo $net_due+=$row['due']; ?></td>
                  <td><?php echo $row['payment_type']; ?></td>
                  <td><?php 
                  $admin_id = $row['admin_id'];
                  $c_sql = "SELECT username FROM users WHERE admin_id = '$admin_id'";
                  $c_result = $connection->query($c_sql);                  
                   while($c_row = $c_result->fetch_assoc()) {  
                  echo $c_row['username']; 
                   }
 
                   ?></td>
                </tr>
                <?php } }
                ?>

                <?php

                  if($_GET['start_date']!='' && $_GET['end_date']!=''){

                  $start_date = $_GET['start_date'];
                  $end_date = $_GET['end_date'];

                  $sql = "SELECT * FROM orders WHERE date between '$start_date' AND '$end_date' "; 
                  $result = $connection->query($sql);
                  while($row = $result->fetch_assoc())  {  
                  ?> 
                
                <tr>
                  <td><?php echo $row['order_id']; ?></td>
                  <td><?php 
                  $cust_id = $row['cust_id'];
                  $c_sql = "SELECT cust_name FROM customers WHERE cust_id = '$cust_id'";
                  $c_result = $connection->query($c_sql);                  
                   while($c_row = $c_result->fetch_assoc()) {  
                  echo $c_row['cust_name']; 
                   }
 
                   ?></td>
                  <td><?php echo $row['date']; ?></td>
                  <td style="text-align: right"><p><?php $net_sub_total+=$row['sub_total']; echo $row['sub_total'];?></p></td>
                  <td style="text-align: right"><?php echo $row['vat']; ?></td>
                  <td style="text-align: right"><?php $net_disc+=$row['discount'];echo $row['discount']; ?></td>
                  <td style="text-align: right"><?php $net_svc+=$row['svc'];echo $row['svc']; ?></td>
                  <td style="text-align: right"><?php $net_total+=$row['grand_total'];echo $row['grand_total']; ?></td>
                  <td style="text-align: right"><?php $net_paid+=$row['paid'];echo $row['paid']; ?></td>
                  <td style="text-align: right"><?php $net_due+=$row['due'];echo $row['due']; ?></td>
                  <td><?php echo $row['payment_type']; ?></td>
                  <td><?php 
                  $admin_id = $row['admin_id'];
                  $c_sql = "SELECT username FROM users WHERE admin_id = '$admin_id'";
                  $c_result = $connection->query($c_sql);                  
                   while($c_row = $c_result->fetch_assoc()) {  
                  echo $c_row['username']; 
                   }
 
                   ?></td>
                </tr>
                <?php } }
                ?>
				
                <tr>
                  <th colspan="3" style="text-align: center">
                    NET
                  </th>
                  <th style="text-align: right">
                  <?php echo $net_sub_total; ?>
                  </th>
                  <th>
                  
                  </th>
                  <th style="text-align: right">
                  <?php echo $net_disc; ?>
                  </th>
                  <th style="text-align: right">
                  <?php echo $net_svc; ?>
                  </th>
                  <th style="text-align: right">
                  <?php echo $net_total; ?>
                  </th>
                  <th style="text-align: right">
                  <?php echo $net_paid; ?>
                  </th> 
                  <th style="text-align: right">
                  <?php echo $net_due; ?>
                  </th>
                  <th>
                
                  </th>   
                  <th>
                  
                  </th>                                                                                                                          
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
