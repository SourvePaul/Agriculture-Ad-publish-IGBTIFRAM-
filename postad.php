<?php 
ob_start();
include "db_connect.php";
session_cache_limiter( FALSE );
session_start(); 
if (isset($_SESSION['user_email'])) {
    
    $user_email = $_SESSION['user_email'];

    $sql = "SELECT * FROM userinfo where user_email='$user_email'";  
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    $user_name = $row['user_name'];
    $fullname = $row['fullname'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Post Ad</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@200;300;400;500;700&family=Smooch&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="css/component.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="fonts/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="fonts/icomoon2/style.css" />
    <link rel="stylesheet" href="fonts/icomoon1/style.css" />

</head>


<body>
    <div class="wrapper">
        <?php include "header.php"; ?>
        <main class="main">
            <section class="page-register page-bg-color">
                <div class="row">
                    <div class="col-md-12">
                        <?php  
                            if(isset($_SESSION['message'])){
                            echo $_SESSION['message'];
                            $_SESSION['message'] = NULL;
                            }
                        ?>
                    </div>
                    <!-- left column -->
                    <form role="form" id="form" action="assest/user_store/postad_DB.php" method="POST"
                        enctype="multipart/form-data">
                        <div class="box-form" style="margin-bottom:-20px;">
                            <div class="col-md-12" style="padding: 20px 1px;">
                                <h4 class="form-title" style="padding: 8px 1px;"><?php echo  $row['user_name']; ?></h4>
                                <h4 class="form-title"
                                    style="width:100%; background-color:#42BC35; color:#fff; text-align:center; align-items:center; justify-content:center; padding:15px 1px; border-radius: 5px;">
                                    Post Ad</h4>
                            </div>
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <div class="box-header with-border"></div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <div class="box-body">
                                        <div class="form-group" style="padding: 5px 1px;">
                                            <label for="exampleInputAdTitle"
                                                style="padding: 8px 0px; font-weight:bold;">Ad-Title</label>
                                            <input type="text" class="form-control" id="exampleInputAdTitle"
                                                name="ad_title" required>
                                        </div>
                                        <div class="form-group" style="padding: 5px 1px;">
                                            <label for="exampleInputAdDescription"
                                                style="padding: 8px 0px; font-weight:bold;">Ad-Description</label>
                                            <textarea id="exampleInputAdDescription" name="ad_description" rows="4"
                                                cols="50" class="form-control" required>
                                            </textarea>
                                        </div>
                                        <div class="form-group" style="padding: 5px 1px;">
                                            <label style="padding: 8px 0px; font-weight:bold;">Category</label>
                                            <select class="form-control" name="cat_id" id="category-select" required="">
                                                <option value="">---Select Category---</option>
                                                <?php
                                                // Read data
                                                $sql = "SELECT * FROM categories ORDER BY cat_name ASC";
                                                $result = $connection->query($sql);
                                                // output data of each row  
                                                while($row = $result->fetch_assoc()) {  
                                                ?>
                                                <option value="<?php echo $row['cat_id']; ?>">
                                                    <?php echo $row['cat_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <label style="padding: 8px 0px; font-weight:bold;">Sub-Category</label>
                                        <select class="form-control " name="sub_cat_id" id="subcategory-select">
                                        </select>
                                        <br>

                                        <div class="form-group" style="padding: 5px 1px;">
                                            <label for="exampleInputAdPrice"
                                                style="padding: 8px 0px; font-weight:bold;">Ad-Price</label>
                                            <input type="number" class="form-control" id="exampleInputAdPrice"
                                                name="ad_price" required>
                                        </div>
                                        <div class="form-group" style="padding: 5px 1px;">
                                            <label for="exampleInputAdPhone"
                                                style="padding: 8px 0px; font-weight:bold;">Ad-Phone</label>
                                            <input type="number" class="form-control" id="exampleInputAdPhone"
                                                name="ad_phone" required>
                                        </div>
                                        <div class="form-group" style="padding: 5px 1px;">
                                            <label for="exampleInputAdLocation"
                                                style="padding: 8px 0px; font-weight:bold;">Ad-Location</label>
                                            <input type="text" class="form-control" id="exampleInputAdLocation"
                                                name="ad_location" required>
                                        </div>
                                        <div class="form-group" style="padding: 5px 1px;">
                                            <label style="padding: 8px 0px; font-weight:bold;">User</label>
                                            <select class="form-control select2" name="user_id">
                                                <!-- required="" -->
                                                <option value="">---Select User---</option>
                                                <?php
                                                // Read data
                                                $sql = "SELECT * FROM userinfo ORDER BY user_name ASC";
                                                $result = $connection->query($sql);
                                                // output data of each row  
                                                while($row = $result->fetch_assoc()) {  
                                                ?>
                                                <option value="<?php echo $row['user_id']; ?>">
                                                    <?php echo $row['user_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group" style="padding: 10px 1px;">
                                            <label for="exampleInputAdFeatureImage"
                                                style="padding: 8px 0px; font-weight:bold;">Ad-Feature
                                                Image</label>
                                            <input type="file" class="form-control" id="exampleInputAdFeatureImage"
                                                accept="image/*" name="ad_feature_image">
                                        </div>
                                        <div class="form-group" style="padding: 10px 1px;">
                                            <label for="exampleInputAdMultipleImage"
                                                style="padding: 8px 0px; font-weight:bold;">Ad-Multiple Image</label>
                                            <input type="file" name="multiple_images[]" multiple class="form-control"
                                                id="exampleInputAdMultipleImage" accept="image/*">
                                        </div>
                                        <div class="box-footer" style="padding: 15px 1px; margin-bottom: -40px;">
                                            <button type="submit"
                                                class="btn btn-success btn-hover-animate d-flex align-items-center justify-content-center fw-bold">
                                                <div class="text">Save Post</div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>

                        </div>
                    </form>
                    <script>
                    function updateSubcategories() {
                        var cat_select = document.getElementById("category-select");
                        var subcat_select = document.getElementById("subcategory-select");

                        var cat_id = cat_select.options[cat_select.selectedIndex].value;

                        var url = 'subcategories.php?category_id=' + cat_id;

                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', url, true);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                subcat_select.innerHTML = xhr.responseText;
                                subcat_select.style.display = 'inline';
                            }
                        }
                        xhr.send();
                    }

                    var cat_select = document.getElementById("category-select");
                    cat_select.addEventListener("change", updateSubcategories);
                    </script>
                </div>
            </section>
        </main>
        <footer class="footer footer-bg-color">
            <?php include "footer.php"; ?>
        </footer>
    </div>

    <!--Left MENU-->
    <div class="left__menu">
        <div class="offcanvas offcanvas-start" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrollingLeftMenu"
            data-aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-body">
                <ul>
                    <li>
                        <a href="index.html">
                            <span class="icon_left_menu"><i class="fa-solid fa-house"></i></span>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon_left_menu"><i class="fa-sharp fa-solid fa-people-group"></i></span>
                            About Us
                        </a>
                    </li>
                    <li class="active-link">
                        <a href="#">
                            <span class="icon_left_menu"><i class="fa-solid fa-list"></i></span>
                            Listings
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon_left_menu"><i class="fa-solid fa-newspaper"></i></span>
                            Our News
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon_left_menu"><i class="fa fa-wrench" aria-hidden="true"></i></span>
                            Contact
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>

    <script src="assest/jquery 3.6.0.js"></script>
    <script src="assest/jquery-migrate-1.2.1.js"></script>
    <script src="assest/uikit.min.js"></script>
    <script src="assest/slick.min.js"></script>
    <script src="assest/modernizr.custom.js"></script>
    <script src="assest/jquery.dlmenu.js"></script>
    <script src="assest/bootstrap.js"></script>
    <script src="assest/jquery.sticky.js"></script>
    <script src="assest/slider.js"></script>
    <script src="assest/custom.js"></script>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="bower_components/moment/min/moment.min.js"></script>
    <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap color picker -->
    <script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page script -->
    <script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            format: 'MM/DD/YYYY h:mm A'
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                    'MMMM D, YYYY'))
            }
        )

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    })
    </script>
</body>

</html>
<?php

} 
else {
    header ('Location: login_auth.php'); 
    exit();
    }    
    ob_flush();
?>