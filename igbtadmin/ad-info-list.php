<?php 
  require_once('php_action/db_connection_checker.php'); 
  require_once('php_action/db_connect.php'); 
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include('includes/title.php'); ?>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include('includes/header.php'); ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php include('includes/main_sidebar.php'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Advertisement Information List
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <a href="ad-info-add.php" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New Ad-Info</a>
                <br></br>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width:12%">Image</th>
                                            <th style="width:25%">Detail Image</th>
                                            <th style="width:5%">Title</th>
                                            <th style="width:7%">Description</th>
                                            <th style="width:5%">Phone</th>
                                            <th style="width:5%">Category</th>
                                            <th style="width:5%">Sub-Category</th>
                                            <th style="width:5%">Price</th>
                                            <th style="width:5%">Location</th>
                                            <th style="width:5%">User</th>
                                            <th style="width:7%">Status</th>
                                            <th style="width:10%">Options</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM ad_info";  
                                        $result = $connection->query($sql);
                                        while($row = $result->fetch_assoc())  {
                                            
                                        ?>
                                        <tr>
                                            <td>
                                                <img src="images/advertisement/<?php echo $row['ad_feature_image']; ?>"
                                                    height="100" width="100">
                                            </td>
                                            <td>
                                                <?php
                                                    // Fetch multiple images for each row
                                                    $ad_id = $row['ad_id']; // Assuming 'ad_id' is the primary key for ad_info table
                                                    $sql_images = "SELECT multiple_images FROM ad_info WHERE ad_id = '$ad_id'";
                                                    $result_images = $connection->query($sql_images);

                                                    // Display the fetched images in the table cell
                                                    if ($result_images && $result_images->num_rows > 0) {
                                                        while ($image_row = $result_images->fetch_assoc()) {
                                                ?>
                                                <img src="images/advertisement/<?php echo $image_row['multiple_images']; ?>"
                                                    alt="Multiple Image" height="40" width="40">
                                                <?php
                                                        }
                                                    } else {
                                                        echo "No images found"; // If no images are associated with the ad_id
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $row['ad_title']; ?></td>
                                            <td><?php echo $row['ad_description']; ?></td>
                                            <td><?php echo $row['ad_phone']; ?></td>
                                            <td>
                                                <?php 
                                                    $cat_id = $row['cat_id'];
                                                    $c_sql = "SELECT cat_name FROM categories WHERE cat_id = '$cat_id'";
                                                    $c_result = $connection->query($c_sql);                  
                                                    while($c_row = $c_result->fetch_assoc()) {  
                                                    echo $c_row['cat_name']; 
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    $sub_cat_id = $row['sub_cat_id'];
                                                    $c_sql = "SELECT sub_cat_name FROM sub_categories WHERE sub_cat_id = '$sub_cat_id'";
                                                    $c_result = $connection->query($c_sql);                  
                                                    while($c_row = $c_result->fetch_assoc()) {  
                                                    echo $c_row['sub_cat_name']; 
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php if($_SESSION['adminType']=='admin' || $_SESSION['adminType']=='moderator'){?>
                                                BDT <?php echo $row['ad_price']; } ?>
                                            </td>
                                            <td><?php echo $row['ad_location']; ?></td>
                                            <td>
                                                <?php 
                                                    $user_id = $row['user_id'];
                                                    $c_sql = "SELECT user_name FROM userinfo WHERE user_id = '$user_id'";
                                                    $c_result = $connection->query($c_sql);                  
                                                    while($c_row = $c_result->fetch_assoc()) {  
                                                    echo $c_row['user_name']; 
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if($row['status'] == 1){
                                                    echo '<p><a href="php_action/store/active.php?ad_id=' . $row['ad_id'] . '&status=0" class="btn btn-success"> Active </a></p>';
                                                }else {
                                                    echo '<p><a href="php_action/store/active.php?ad_id=' . $row['ad_id'] . '&status=1" class="btn btn-danger"> In-Active </a></p>';
                                                }
                                            ?>
                                            </td>
                                            <td><?php if($_SESSION['adminType']=='admin' || $_SESSION['adminType']=='moderator'){ ?>
                                                <a title="Add Quantity" href="#" class="btn btn-primary"><i
                                                        class="fa fa-plus-circle"></i>
                                                </a>
                                                <a title="Edit" href="#" class="btn btn-warning"><i
                                                        class="fa fa-pencil-square-o"></i>
                                                </a>
                                                <a title="Delete" href="#" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                                } }
                                        ?>
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
                                <a href="javascript:void(0)" class="text-red pull-right">
                                    <i class="fa fa-trash-o"></i>
                                </a>
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
    <!-- DataTables -->
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
    </script>
</body>

</html>