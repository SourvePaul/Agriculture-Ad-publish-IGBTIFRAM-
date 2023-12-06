<?php 
  require_once('php_action/db_connection_checker.php'); 
  require_once('php_action/db_connect.php'); 

  $sale_sql = "SELECT SUM(paid) FROM orders WHERE date = CURDATE()";
  $excute = mysqli_query($connection,$sale_sql);                
    while($sale_row=mysqli_fetch_array($excute)){ 
    $sale_today = $sale_row[0]; 
    }
  $n_sale_sql = "SELECT COUNT(order_id) FROM orders";
  $excute = mysqli_query($connection,$n_sale_sql);                
    while($n_sale_row=mysqli_fetch_array($excute)){ 
    $num_of_sale = $n_sale_row[0]; 
    } 
  $t_sale_sql = "SELECT SUM(paid) FROM orders";
  $excute = mysqli_query($connection,$t_sale_sql);                
    while($t_sale_row=mysqli_fetch_array($excute)){ 
    $total_sale = $t_sale_row[0]; 
    } 
  $n_exp_sql = "SELECT COUNT(order_id) FROM orders";
  $excute = mysqli_query($connection,$n_exp_sql);                
    while($n_sale_row=mysqli_fetch_array($excute)){ 
    $num_of_exp = $n_sale_row[0]; 
    } 
  $t_exp_sql = "SELECT SUM(amount) FROM expenses";
  $excute = mysqli_query($connection,$t_exp_sql);                
    while($t_sale_row=mysqli_fetch_array($excute)){ 
    $total_exp = $t_sale_row[0]; 
    }      
  $exp_sql = "SELECT SUM(amount) FROM expenses WHERE date = CURDATE()";
  $excute = mysqli_query($connection,$exp_sql);                
    while($exp_row = mysqli_fetch_array($excute)){ 
    $expense_today = $exp_row[0]; 
    }
  $product_sql = "SELECT COUNT(product_id) FROM products";
  $excute = mysqli_query($connection,$product_sql);                
    while($product_row = mysqli_fetch_array($excute)){ 
    $total_products = $product_row[0]; 
    }
  $staff_sql = "SELECT COUNT(staff_id) FROM staffs";
  $excute = mysqli_query($connection,$staff_sql);                
    while($staff_row = mysqli_fetch_array($excute)){ 
    $total_staff = $staff_row[0]; 
    }

    // In Stock
  $in_stock_sql = "SELECT SUM(product_qty) FROM products";
  $excute = mysqli_query($connection,$in_stock_sql);                
    while($in_stock_row = mysqli_fetch_array($excute)){ 
    $in_stock = $in_stock_row[0]; 
    }
  $sys_sql = "SELECT * FROM settings";
  $result = $connection->query($sys_sql);              
  while($sys_row = $result->fetch_assoc()) {  
    $system_name = $sys_row['system_name'];  
    $system_title = $sys_row['title']; 
    $stock_warning_limit = $sys_row['stock_warning_limit'];   
  }
    // Out of Stock
  $out_stock_sql = "SELECT product_qty FROM products";
  $out_stock = 0;
  $excute = mysqli_query($connection,$out_stock_sql);                
    while($out_stock_row = mysqli_fetch_array($excute)){ 
      if($out_stock_row['product_qty'] < $stock_warning_limit){
        $out_stock++;
      }
    }

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $system_title; ?></title>
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
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

</head>
<script type="text/javascript">
if (screen.width <= 2000) {
    document.write('<body class="hold-transition skin-blue sidebar-mini"">');
} else {
    document.write(
        '<body class="hold-transition skin-blue sidebar-mini" style="overflow:hidden; width: 100%; height: 100%;">');
}
</script>
<div class="wrapper">

    <?php include('includes/header.php'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php
        //if($_SESSION['adminType']=='admin'){
        include('includes/main_sidebar.php');
        // }
        // else
    
        //   if($_SESSION['adminType']=='sales')
        // {
        //   include('includes/sales_sidebar.php'); 
        // }
        ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 align="center">
                <?php echo strtoupper($system_name); ?> | MANAGEMENT SYSTEM
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php if($sale_today>0){echo $sale_today;} else {echo "0";} ?></h3>
                            <p>Product Sales</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php if($expense_today>0){echo $expense_today;} else {echo "0";} ?></h3>
                            <p>Expense Today</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo $out_stock; ?></h3>
                            <p>Low Stock</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?php echo $total_products; ?></h3>
                            <p>Product</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
            <!-- /.row -->

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-6 connectedSortable">
                    <!-- TO DO List -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <i class="ion ion-clipboard"></i>
                            <h3 class="box-title">Statistics</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                            <ul class="todo-list">

                                <li>
                                    <!-- drag handle -->
                                    <span class="handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <!-- checkbox -->

                                    <!-- todo text -->
                                    <span class="text">Number of Product Sale</span>
                                    <!-- Emphasis label -->
                                    <font color="black"><b><?php echo $num_of_sale; ?></b></font>
                                    <!-- General tools such as edit or delete-->

                                </li>
                                <li>
                                    <span class="handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>

                                    <span class="text">Total Sales</span>
                                    <font color="black"><b><?php echo $total_sale; ?></b></font>

                                </li>
                                <li>
                                    <span class="handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>

                                    <span class="text">Number of Expenses</span>
                                    <font color="black"><b> <?php echo $num_of_exp; ?></b></font>

                                </li>
                                <li>
                                    <span class="handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>

                                    <span class="text">Total Expense</span>
                                    <font color="black"><b><?php echo $total_exp; ?></b></font>

                                </li>
                                <li>
                                    <span class="handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>

                                    <span class="text">Number of Products</span>
                                    <font color="black"><b> <?php echo $total_products; ?></b></font>

                                </li>
                                <li>
                                    <span class="handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>

                                    <span class="text">In Stock Inventory Quantity</span>
                                    <font color="black"><b> <?php echo $in_stock; ?></b></font>

                                </li>
                                <li>
                                    <span class="handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>

                                    <span class="text">Number of Staff</span>
                                    <font color="black"><b> <?php echo $total_staff; ?></b></font>

                                </li>

                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </section>
                <!-- /.Left col -->

                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-6 connectedSortable">
                    <!--#### START Bar Chart-->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php 
                        
                    $array_of_data = array();
                    $current_year = date("Y");
                    $sql = "SELECT year(date), month(date), SUM(paid)
                    FROM orders where year(date) = '$current_year'
                    GROUP BY year(date), month(date)";
                    $excute = mysqli_query($connection,$sql);
                
                    while($row=mysqli_fetch_array($excute)){
                        $array_of_data =  $array_of_data + array("$row[1]"=>"$row[2]");
                    }
                        if(!array_key_exists("1",$array_of_data)){
                        $array_of_data =  $array_of_data + array("1"=>"0"); 
                        }
                        if(!array_key_exists("2",$array_of_data)){
                        $array_of_data =  $array_of_data + array("2"=>"0"); 
                        }
                        if(!array_key_exists("3",$array_of_data)){
                        $array_of_data =  $array_of_data + array("3"=>"0"); 
                        }
                        if(!array_key_exists("4",$array_of_data)){
                        $array_of_data =  $array_of_data + array("4"=>"0"); 
                        }
                        if(!array_key_exists("5",$array_of_data)){
                        $array_of_data =  $array_of_data + array("5"=>"0"); 
                        }
                        if(!array_key_exists("6",$array_of_data)){
                        $array_of_data =  $array_of_data + array("6"=>"0"); 
                        }
                        if(!array_key_exists("7",$array_of_data)){
                        $array_of_data =  $array_of_data + array("7"=>"0"); 
                        }
                        if(!array_key_exists("8",$array_of_data)){
                        $array_of_data =  $array_of_data + array("8"=>"0"); 
                        }
                        if(!array_key_exists("9",$array_of_data)){
                        $array_of_data =  $array_of_data + array("9"=>"0"); 
                        }
                        if(!array_key_exists("10",$array_of_data)){
                        $array_of_data =  $array_of_data + array("10"=>"0"); 
                        }
                        if(!array_key_exists("11",$array_of_data)){
                        $array_of_data =  $array_of_data + array("11"=>"0"); 
                        }
                        if(!array_key_exists("12",$array_of_data)){
                        $array_of_data =  $array_of_data + array("12"=>"0"); 
                        }
                    ?>
                            <canvas id="myChart" width="400" height="250"></canvas>
                            <script>
                            var ctx = document.getElementById("myChart");
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ["January", "February", "March", "April", "May", "June", "July",
                                        "August", "September", "October", "November", "December"
                                    ],
                                    datasets: [{
                                        label: '# of Sales in <?php echo $current_year; ?>',
                                        data: [
                                            <?php $var = 1; while($var <= 12){ echo $array_of_data[$var++];  echo ",";}  ?>
                                        ],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)',
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255,99,132,1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)',
                                            'rgba(255,99,132,1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)',
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                            </script>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!--#### END Bar Chart-->
                </section>
                <!-- right col -->
            </div>
            <!-- /NEW DESIGN START -->
            <div class="row">
                <div class="col-md-6">
                    <!-- calender start -->
                    <div class="box box-solid bg-green-gradient">
                        <div class="box-header">
                            <i class="fa fa-calendar"></i>
                            <h3 class="box-title">Calendar</h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <!-- button with a dropdown -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                        data-toggle="dropdown">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Add new event</a></li>
                                        <li><a href="#">Clear events</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">View calendar</a></li>
                                    </ul>
                                </div>
                                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i
                                        class="fa fa-times"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"></div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-black">
                            <div class="row">
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!--/.calender-end -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <!-- USERS LIST -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Users</h3>
                            <?php
                    $srl = 1;
                    $counter = 0;
                    $sql = "SELECT * FROM users";  
                    $result = $connection->query($sql);
                    while($row = $result->fetch_assoc())  {  
                    $counter = $counter + 1;
                    }
                    ?>
                            <div class="box-tools pull-right">
                                <span class="label label-danger"><?php echo $counter; ?> Users</span>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <ul class="users-list clearfix">
                                <?php
                        $srl = 1; 
                        $sql = "SELECT * FROM users";  
                        $result = $connection->query($sql);
                        while($row = $result->fetch_assoc())  {   
                    ?>
                                <li>
                                    <img src="dist/img/avatar5.png" alt="User Image" width="128" height="128">
                                    <a class="users-list-name" href="#"><?php echo $row['username']; ?></a>
                                    <span class="users-list-date"><?php echo $row['user_type']; ?></span>
                                </li>
                                <?php } ?>

                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="profile.php" class="uppercase">View All Users</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /NEW DESIGN END -->

            <!-- /.row (main row) -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include('includes/footer.php'); ?>

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
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>

</html>