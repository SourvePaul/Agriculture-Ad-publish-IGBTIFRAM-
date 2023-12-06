<?php 
 $start_date = $_POST['start_date'];
 $end_date = $_POST['end_date'];
 //echo $start_date;
// echo "<br>";
// echo $end_date;
  require_once('php_action/db_connection_checker.php'); 
  require_once('php_action/db_connect.php'); 
  if($_SESSION['adminType']=='sales'){
    header('Location: 404-error.php');
  }
  $sale_sql = "SELECT SUM(grand_total) FROM orders where date between '$start_date' AND '$end_date' ";
  $excute = mysqli_query($connection,$sale_sql);                
    while($sale_row=mysqli_fetch_array($excute)){ 
    $gross_sale = $sale_row[0]; 
    }
  $vat_sql = "SELECT SUM(vat) FROM orders where date between '$start_date' AND '$end_date'";
  $excute = mysqli_query($connection,$vat_sql);                
    while($vat_row=mysqli_fetch_array($excute)){ 
    $vat = $vat_row[0]; 
    }
  $discount_sql = "SELECT SUM(discount) FROM orders where date between '$start_date' AND '$end_date'";
  $excute = mysqli_query($connection,$discount_sql);                
    while($discount_row=mysqli_fetch_array($excute)){ 
    $discount = $discount_row[0]; 
    }
  $due_sql = "SELECT SUM(due) FROM orders where date between '$start_date' AND '$end_date'";
  $excute = mysqli_query($connection,$due_sql);                
    while($due_row=mysqli_fetch_array($excute)){ 
    $due = $due_row[0]; 
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   <?php include('includes/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('includes/main_sidebar.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        REPORTING For Date From <font color="black"><b><?php echo  $start_date; ?></b></font> To <font color="black"><b><?php echo $end_date; ?></b></font> 
        <?php
        
        // exit();
        ?>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Income</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width:80%">Gross Sales</th>
                  <th style="width:20%">BDT <?php echo $gross_sale;?></th>  
                </tr>
                <tr>
                  <th style="width:80%">Total Vat</th>
                  <th style="width:20%">BDT <?php echo $vat;?></th>  
                </tr>
                <tr>
                  <th style="width:80%">Total Discount</th>
                  <th style="width:20%">BDT <?php echo $discount;?></th>  
                </tr>
                <tr>
                  <th style="width:80%">Due Amount</th>
                  <th style="width:20%">BDT <?php echo $due;?></th>  
                </tr>
              </table>
              <h1>Total Income Cost <b><?php echo $gross_sale; ?></b></h1>
            </div>
          </div>
          <!-- /.box -->

        
        <!-- /.col -->
      </div>
	   </div>
	  
	 <div class="row">
	    <div class="col-md-6"> 
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Expense</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
              
                  <th style="width:80%">Category</th>
                  <th style="width:20%">Amount</th>  
                </tr>
                <?php
                  $exp_cat_sql = "SELECT * FROM expense_categories";
                  $grand_exp = 0;
                  $excute = mysqli_query($connection,$exp_cat_sql);                
                    while($exp_cat_row=mysqli_fetch_array($excute)){ 
                      $expense_cat_id = $exp_cat_row['expense_cat_id'];
                      $expense_cat_name  = $exp_cat_row['expense_cat_name'];
                       $total_exp_cat_sql = "SELECT SUM(amount) FROM expenses WHERE expense_cat_id = '$expense_cat_id' AND date between '$start_date' AND '$end_date' ";
                       $excute2 = mysqli_query($connection,$total_exp_cat_sql);                
                         while($total_exp_cat_row=mysqli_fetch_array($excute2)){ 
                         $total_exp_cat = $total_exp_cat_row[0];
                         $grand_exp += $total_exp_cat;
                        }
                ?>
				        <tr>
                  <td style="width:80%"><?php echo $expense_cat_name; ?></td>
                  <td style="width:20%">BDT <?php echo $total_exp_cat; ?></td>  
                </tr>
                <?php } ?>
                <tr>
                  <th style="width:80%">Total</th>
                  <th style="width:20%">BDT <?php echo $grand_exp; ?></th>  
                </tr>
              </table>
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->

        
        <!-- /.col -->
      </div>

       <!--raw materials -->
      <div class="col-md-6"> 
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Expense Raw Material</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 
                  <th style="width:11%">Date</th>
                   <th style="width:11%">Name</th>
				           <th style="width:7%">Code</th>
                   <th style="width:7%">Quantity</th>                   
               
				           <th style="width:7%">Purchase Cost</th>
				         
                   <th style="width:8%">Supplier</th>
                   <th style="width:8%">Comments</th>
				         
                </tr>
                </thead>
                <tbody>
                 <?php
                  $sql = "SELECT * FROM raw_products where date between '$start_date' AND '$end_date'";  
                  $total_amount = 0;
                  $result = $connection->query($sql);
                  while($row = $result->fetch_assoc())  {  
                  $total_amount =   ( $total_amount) + ($row['raw_product_purchase_price']);
                  ?> 
                
              <tr>
                 
                  <td><?php echo $row['date']; ?></td>
				          <td><?php echo $row['raw_product_name']; ?></td>
                  <td><?php echo $row['raw_product_code']; ?></td>
                  <td><?php echo $row['raw_product_qty']; ?></td>                  
                  <td><?php echo $row['raw_product_purchase_price']; ?></td>     
				         
				 
                  <td>
                  <?php 
                  
                  $supplier_id = $row['supplier_id'];
                  $c_sql = "SELECT supplier_name FROM suppliers WHERE supplier_id = '$supplier_id'";
                  $c_result = $connection->query($c_sql);                  
                   while($c_row = $c_result->fetch_assoc()) {  
                  echo $c_row['supplier_name']; 
                   }
                  ?>
                  </td>
				          <td><?php echo $row['comments']; ?></td>     
                  
				      
            <?php
               } 
              ?> 

                </tfoot>
                <tr>
                    <td>
                      '<h4>Total Amount  =   <?php echo $total_amount ?></h4>
                    </td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->

        
        <!-- /.col -->
      </div>
    </div>
    <div class="row">

        <div class="col-md-6">   
          <h1>Total Expense Cost
              <?php
                  $total_expense_cost= 0;
                  $total_expense_cost =  $grand_exp+ $total_amount;
                echo "<b>";  echo  $total_expense_cost; echo "</b>";
               ?> 
               </h1>
        </div>
    </div>
            <!-- /.box-body -->
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
	<?php include('includes/footer.php'); ?>
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
