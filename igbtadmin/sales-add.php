<?php 
  require_once('php_action/db_connection_checker.php'); 
  require_once('php_action/db_connect.php'); 
  error_reporting(0);
  $admin_id = $_SESSION['adminId'];

   $sql = "SELECT total FROM carts where admin_id = '$admin_id' ";
   $result = $connection->query($sql);
    $total = 0;                   
   while($row = $result->fetch_assoc()) {  
    $total = $total + $row['total']; 
    }

    $oreder_sql = "SELECT MAX(order_id) FROM orders";
    $excute = mysqli_query($connection,$oreder_sql);                
    while($o_id_row=mysqli_fetch_array($excute)){ 
    $last_ordered_item = $o_id_row[0]; 
    }

    $vat_sql = "SELECT vat FROM settings";  
    $vat_result = $connection->query($vat_sql);
    while($vat_row = $vat_result->fetch_assoc())  {  
    $vat  = $vat_row['vat'];
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
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        #subcategory-select {
            display: none;
        }
    </style>
  <script>
$(document).ready(function () {
    var counter = 0;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><select onChange="checkProductRate()" id="product_id" class="form-control select2" name="product_id[]" required=""><option value="">Select</option><?php $sql = "SELECT * FROM products where status = '1' ORDER BY product_code ASC";$result = $connection->query($sql); while($row = $result->fetch_assoc()) {  ?>  <option value="<?php echo $row['product_id']; ?>"><?php echo $row['product_code']; ?></option><?php } ?></select></td>';
        cols += '<td><input type="number" class="form-control" value="1" name="product_qty[]" ></td>';
        cols += '<td><a type="button" class="ibtnDel btn btn-md btn-danger "><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
		 Initialize();
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove(); 
		Initialize();		
        counter -= 1
    });


});



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}
  </script>
   <!--jQuery Ajax-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
  <script>
  function checkProductRate() {
  jQuery.ajax({
  url: "php_action/check_product_rate.php",
  data:'product_id='+$("#product_id[1]").val(),
  type: "POST",
  success:function(data){
    $("#rate[1]").val(data);
  },
  error:function (){}
  });
  }
  </script>
  <!--jQuery Ajax-->
  
 <!-- AJAX FORM SUBMIT -->
 
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
$("#btn").click(function(){
var product_id = $("#product_id").val();
var product_qty = $("#product_qty").val();


$.post("php_action/store/cart.php", //Required URL of the page on server
{ // Data Sending With Request To Server
product_id:product_id,
product_qty:product_qty
},
function(response,status){ // Required Callback Function
//alert("*----Received Data----*\n\nResponse : " + response+"\n\nStatus : " + status);//"response" receives - whatever written in echo of above PHP script.
$("#form")[0].reset();
});

});
});

</script>   

 
 <!-- AJAX FORM SUBMIT -->

</head>
<body OnLoad="document.my_form.mytext.focus();">
<script type="text/javascript">
  if (screen.width <= 699) {
      document.write('<body class="hold-transition skin-blue sidebar-mini"">');
  }
  else{
      document.write('<body class="hold-transition skin-blue sidebar-mini" style="  scrolling="auto" width: 100%;">');
  }
</script> 

  
   
</script>   
<div class="wrapper">

 <?php

  $sys_sql = "SELECT * FROM settings";
  $result = $connection->query($sys_sql);              
  while($sys_row = $result->fetch_assoc()) {  
    $system_name = $sys_row['system_name'];    
  }

?>
  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>OS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo $system_name; ?> </b>POS</span>
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

          <!-- User Account: style can be found in dropdown.less -->
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
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('includes/main_sidebar.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
            <h4>Sell Product</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
              <table class="table table-bordered">
              <tbody>
                <tr>
                  <td>
                    <div class="form-group">
                  <form role="form" id="my_form" name="my_form" action="php_action/store/cart.php" method="POST" enctype="multipart/form-data">
    <table id="myTable" class=" table order-list">
    <thead>
        <tr>
            <th style="width:70%">Product</th>
            <th style="width:20%">Quantity</th>
			<th style="width:10%; text-align:center;"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="">
                
                  <select class="form-control select2" onChange="checkProductRate();this.form.submit();" id="mytext" name="product_id[]"  >
                   <option value="" >Select</option>
                    <?php
                     // Read data
                     $sql = "SELECT * FROM products where status = '1' ORDER BY product_code ASC";
                      $result = $connection->query($sql);
                       // output data of each row  
                       while($row = $result->fetch_assoc()) {  
                         ?>  
                       <option value="<?php echo $row['product_id']; ?>" ><?php echo $row['product_code']; ?></option>
                      <?php } ?>
                  </select>
            </td>

            <td class="">
                <input type="number" name="product_qty[]" value="1" class="form-control"/>
            </td>

            <td class=""><a class="deleteRow"></a>

            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
		<td>
		</td>
			<td>
            <a type="button" onclick="document.forms[0].submit();return false;" class="btn btn-success pull-right" ><i class="fa fa-calculator"></i> Calculate</a>
			</td>
			
            <td>
              <a type="button" class="btn btn-primary pull-right" id="addrow" ><i class="fa fa-plus-circle"></i> </a>              
            </td>

        </tr>

    </tfoot>
</table>
<script>
  document.getElementById('my_form:product_id[]').focus();
</script>
                 </form>
                </td>


                </table>



              </div>

              </div>
              <!-- /.box-body -->
                  <div class="box box-primary">
            <div class="box-header with-border">      
         <div class="box-body">     
        <table id="" class="table-bordered" width="100%" style="text-align: center">

         <tbody>
             <thead>
                <tr>
                  <th style="text-align: center;">Serial</th>
                  <th style="text-align: center;">Product</th>
                  <th style="text-align: center;">Rate</th>
                  <th style="text-align: center;">In Stock</th>
                  <th style="text-align: center;">Quantity</th>
                  <th style="text-align: center;">Total</th>
                  <th style="text-align: center;">Option</th>
                </tr>
                </thead>
                 <?php
                 $sl=1;
                  $sql = "SELECT * FROM carts WHERE admin_id = '$admin_id' order by cart_id";  
                  $result = $connection->query($sql);
                  while($row = $result->fetch_assoc())  {  
                  ?> 
                
                <tr>
                  <td><?php echo $sl++; ?></td>
                  <td>
                     <?php
                     // Read data
                     $sql2 = "SELECT product_name FROM products where product_id = ".$row['product_id'];
                      $result2 = $connection->query($sql2);
                       // output data of each row  
                       while($row2 = $result2->fetch_assoc()) {  
                        echo $row2['product_name']; }
                    ?>
                  </td>
                  <td><?php echo $row['product_selling_price']; ?></td>
                  <td><?php echo $row['in_stock']; ?></td>
                  <td><?php echo $row['quantity']; ?></td>
                  <td><?php echo $row['total']; ?></td>
                  <td>
                    <a href="php_action/delete/cart.php?id=<?php echo $row['cart_id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Remove</a>
                  </td>
                </tr>
                <?php } ?>
            </tbody>  
          </table> <br> 
          <div>
				<?php  
					if(isset($_SESSION['message'])){
					echo $_SESSION['message'];
					$_SESSION['message'] = NULL;
					if($_SESSION['discard_invoice_print']!='true'){  
       
				?>
					<script>window.open('print_bill.php?order_id=<?php echo $last_ordered_item; ?>');</script> 
               <?php 
					}
					}
				?>
        
      </div>
          </div>
         </div>
        </div>
          </div>
    <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
            
            </div>
              <div class="box-body">
              <form role="form" action="php_action/store/order.php" method="POST">
                 <div class="form-group">
                  <label for="exampleInputEmail1">Date</label>
                  <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="date" required> 
                </div>
              <div class="form-group">
                  <label>Customer Name</label>
                  <select class="form-control select2" name="customer_id">
                   <option value="">--Select--</option>
                    <?php
                     // Read data
                     $sql = "SELECT * FROM customers ORDER BY cust_name ASC";
                      $result = $connection->query($sql);
                       // output data of each row  
                       while($row = $result->fetch_assoc()) { 
                       if($row['cust_id']!=6){ 
                         ?>  
                       <option value="<?php echo $row['cust_id']; ?>"><?php echo $row['cust_name']; ?></option>
                      <?php } } ?>
                  </select>
                </div>


    <table id="" class="">
      <a type="button" class="btn btn-primary pull-right" data-toggle="collapse" data-target="#demo"><i class="fa fa-plus-circle"></i> Add Customer</a>
      <br>
      <br>
      <div id="demo" class="collapse">
               <div class="col-md-6  form-group">
                 <label for="">Customer Name</label>
                  <input type="text" class="form-control" id=""  name="cust_name"  > 
                </div>
    
                <div class="col-md-6  form-group">
                 <label for="">Phone</label>
                  <input type="text" class="form-control" value="" id="cust_phone"  name="cust_phone"> 
                </div>
     </div>
     <br>

    <tbody>


        <tr>
         <td>
               <div class="form-group">
                 <label for="exampleInputEmail1">Sub Total</label>
                  <input type="number" class="form-control" id="sub_total"  name="sub_total" value="<?php echo $total; ?>" readonly> 
                </div>
          </td>
          <td>      
                <div class="form-group">
                 <label for="exampleInputEmail1">Vat %</label>
                  <input type="number" class="form-control" value="<?php echo $vat; ?>" id="vat"  name="vat" required> 
                </div>
            </td>
             <td>      
                <div class="form-group">
                 <label for="exampleInputEmail1">Discount</label>
                  <input type="number" class="form-control" value="0" id="discount"  name="discount" required> 
                </div>
            </td>
        </tr>
                <tr>
          <td>
               <div class="form-group">
                 <label for="exampleInputEmail1">Received</label>
                 
                   <input type="number" class="form-control" id="cash" name="cash"> 
                </div>
          </td>

           <td>
               <div class="form-group">
                 <label for="exampleInputEmail1">Change</label>
                 <input type="number" class="form-control" id="change" name="changed"> 
                </div>
          </td>


         <td>
               <div class="form-group">
                 <label for="exampleInputEmail1">Grand Total</label>
                  <input type="number" class="form-control" id="grand_total" name="grand_total" readonly=""> 
                </div>
          </td>
          <td>      
                <div class="form-group">
                 <label for="exampleInputEmail1">Paid</label>
                  <input type="number" class="form-control" id="paid"  name="paid" required> 
                </div>
            </td>
             <td>      
                <div class="form-group">
                 <label for="exampleInputEmail1">Due</label>
                  <input type="number" class="form-control" id="due"  name="due" readonly> 
                </div>
            </td>
        </tr>
    </tbody>
</table>
              <div class="form-group">
                  <label>Payment Type</label>
                  <select class="form-control" name="payment_type" required=""> 
                       <option value="Cash">Cash</option>
                       
                       <option value="Cash">Cheque</option>
                        <option value="Cash">Bkash</option>
                  </select>
                </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-lg btn-block btn-success">Ok</button>
              </div>
                </form>                      
              </div>
             </div>

              </div>

            </div>

              </div>


    </div>
  

   </form>



<script type="text/javascript">
  var sub_total = document.getElementById("sub_total").value;
  var vat = document.getElementById("vat").value;
  var sum = parseInt(sub_total) + parseInt(sub_total) * (parseInt(vat)/100);
  var discount = document.getElementById("discount").value;
  var final = parseInt(sum) - parseInt(discount);
  document.getElementById("grand_total").value = parseInt(final);
</script>

<script>
document.getElementById("vat").addEventListener("change", myFunction);
document.getElementById("discount").addEventListener("change", myFunction);
document.getElementById("paid").addEventListener("change", myFunctionForDue);
function myFunction() {
      var sub_total = document.getElementById("sub_total").value;
  var vat = document.getElementById("vat").value;
  var sum = parseInt(sub_total) + parseInt(sub_total) * (parseInt(vat)/100);
  var discount = document.getElementById("discount").value;
  var final = parseInt(sum) - parseInt(discount);
  document.getElementById("grand_total").value = parseInt(final);
}
function myFunctionForDue() {
  var grand_total = document.getElementById("grand_total").value;
  var paid = document.getElementById("paid").value;
  var due = parseInt(grand_total) - parseInt(paid);
  document.getElementById("due").value = parseInt(due);
}
</script>


<script>
document.getElementById("cash").addEventListener("change", myFunctionCash);

function myFunctionCash() {
  var cash = document.getElementById("cash").value;
  var grand_total = document.getElementById("grand_total").value;
  var change = parseInt(cash) - parseInt(grand_total);

  document.getElementById("change").value = parseInt(change);
}

</script>

<script type="text/javascript">
function updateValues() {
  var sub_total = document.getElementById("sub_total").value;
  var vat = document.getElementById("vat").value;
  var sum = parseInt(sub_total) + parseInt(sub_total) * (parseInt(vat)/100);
  var discount = document.getElementById("discount").value;
  var final = parseInt(sum) - parseInt(discount);
  document.getElementById("grand_total").value = parseInt(final);
</script>

<script>
    function updateSubcategories() {
        var cat_select = document.getElementById("category-select");
        var subcat_select = document.getElementById("subcategory-select");

        var cat_id = cat_select.options[cat_select.selectedIndex].value;

        var url = 'subcategories.php?category_id=' + cat_id;

        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onreadystatechange = function () {
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php // include('includes/footer.php'); ?>


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
function Initialize() {
	$('.select2').select2()
    } 
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
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
