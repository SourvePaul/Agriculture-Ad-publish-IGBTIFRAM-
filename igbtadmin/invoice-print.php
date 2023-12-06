<?php 
require_once('php_action/db_connection_checker.php'); 
require_once('php_action/db_connect.php'); 
  
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
    }
  $sys_sql = "SELECT * FROM settings";
  $result = $connection->query($sys_sql);              
  while($sys_row = $result->fetch_assoc()) {  
    $system_name = $sys_row['system_name'];
    $address = $sys_row['address']; 
    $mobile = $sys_row['phone']; 
    }
    
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php include('php_action/title.php'); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <style type="text/css" media="print">
      @page 
      {
          size: auto;   /* auto is the initial value */
          margin: 0mm;  /* this affects the margin in the printer settings */
      }
  </style>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="container">
<div class="wrapper">
  <!-- Main content -->
 <div class="row">
        <div class="col-xs-12" style="text-align:center">
          <h2 class="page-header">
            <?php echo $system_name; ?>
          </h2>

        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <strong>PAYMENT TO</strong>
          <address>
            <?php echo $system_name; ?><br>
            <?php echo $address; ?><br>
            Mob: <?php echo $mobile; ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <strong>INVOICE INFO</strong>
      <address>
       Customer : <b>
        <?php 
             $sql = "SELECT cust_name FROM customers WHERE cust_id = '$cust_id'";
              $result = $connection->query($sql);                  
                while($row = $result->fetch_assoc()) {  
                echo $row['cust_name']; 
                }
        ?>
         
       </b> <br>
       Invoice No : <b><?php echo $order_id; ?></b> <br>
       Status : <b><?php if($due == 0) {echo "Paid";} else echo "Has Due";?></b> <br>
      </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <strong>DATE</strong>
      <p><?php echo $date; ?></p>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Description</th>
              <th>Rate</th>
              <th>Qty</th>
              <th>Total</th>
            </tr>
            </thead>
            <tbody>
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
                  <td><?php echo $srl; ?></td>
                  <td><?php 
                         $p_sql = "SELECT product_name FROM products WHERE product_id = '$single_product[$srl]'";
                         $p_result = $connection->query($p_sql);                 
                          while($p_row = $p_result->fetch_assoc()) {  
                           echo $p_row['product_name']; 
                          } 
                      ?>
                  </td>
                  <td><?php echo "".$single_rate[$srl];; ?></td>
                  <td><?php echo $single_quantity[$srl]; ?></td>
                  <td><?php echo "".($single_rate[$srl]*$single_quantity[$srl]); ?></td>
                </tr>
                <?php 
                  $count--;
                  $srl++; 
                    } 
                  } 
                ?>

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
    
        <div class="col-xs-6">
    <!--
          <p class="lead">Payment Methods:</p>
          <img src="dist/img/credit/visa.png" alt="Visa">
          <img src="dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="dist/img/credit/american-express.png" alt="American Express">
          <img src="dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>
        -->
        </div>
  
        <!-- /.col -->
        <div class="col-xs-6">
          <!--<p class="lead">Amount Due 2/22/2014</p>-->

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:80%">Subtotal:</th>
                <td style="text-align:right"><?php echo $sub_total; ?></td>
              </tr>
               <tr>
                <th style="width:80%">Vat:</th>
                <td style="text-align:right"><?php echo $vat; ?></td>
              </tr>
              <tr>
                <th style="width:80%">Discount</th>
                <td style="text-align:right"><?php echo $discount; ?></td>
              </tr>
              <tr>
                <th style="width:80%">Grand Total:</th>
                <td style="text-align:right"><?php echo $grand_total; ?></td>
              </tr>
              <tr>
                <th style="width:80%">Paid:</th>
                <td style="text-align:right"><?php echo $paid; ?></td>
              </tr>
              <tr>
                <th style="width:80%">Due:</th>
                <td style="text-align:right"><?php echo $due; ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->

    </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</div>
</body>
</html>
