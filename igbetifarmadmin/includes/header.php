<?php

  $sys_sql = "SELECT * FROM settings";
  $result = $connection->query($sys_sql);              
  while($sys_row = $result->fetch_assoc()) {  
    $system_name = $sys_row['system_name'];    
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

    // zero stock
  $zero_stock_sql = "SELECT product_qty FROM products";
  $zero_stock = 0;
  $excute = mysqli_query($connection,$zero_stock_sql);                
    while($zero_stock_row = mysqli_fetch_array($excute)){ 
      if($zero_stock_row['product_qty'] == 0){
        $zero_stock++;
      }
    }

?>
<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b>OS</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><?php echo $system_name; ?> </b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                <?php if(intval($out_stock)>0){ ?>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Stock Alarm
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning"><?php echo $out_stock; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have <?php echo $out_stock; ?> Products in low Stock</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">

                                <li>
                                    <a href="product-low-stock.php">
                                        View Low Stock products
                                    </a>
                                </li>
                                <li>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>
                <?php } ?>
                <?php if(intval($zero_stock)>0){ ?>
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-slash"></i>
                        <span class="label label-danger"><?php echo $zero_stock; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have <?php echo $zero_stock; ?> Products Out of Stock</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">

                                <li>
                                    <a href="product-out-of-stock.php">
                                        View Out of Stock products
                                    </a>
                                </li>
                                <li>

                            </ul>
                        </li>

                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <?php } ?>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="images/admin.png" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $system_name; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="images/admin.png" class="img-circle" alt="User Image">

                            </p>
                            <p>You are logged in as <b><?php echo $_SESSION['adminName']?></b></p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="settings.php" class="btn btn-default btn-flat">Settings</a>
                            </div>
                            <div class="pull-right">
                                <a href="php_action/logout.php" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>