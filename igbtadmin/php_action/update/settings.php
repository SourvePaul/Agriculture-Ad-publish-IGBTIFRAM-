<?php
session_start();
require('../db_connect.php');

if($_FILES['logo_new']['name'] != ''){
//This block is for image upload
$logo = time().$_FILES['logo_new']['name'];
$temporary_location= $_FILES['logo_new']['tmp_name'];
$myLocation= '../../images/'.$logo;
move_uploaded_file($temporary_location, $myLocation );
//End of image block
}
else{
  $logo = $_POST['logo'];
}

// Receiving data
$system_name = $_POST['system_name'];
$title = $_POST['title'];
$address = $_POST['address'];
$phone = $_POST['phone']; 
$email = $_POST['email']; 
$vat = $_POST['vat']; 
$stock_warning_limit = $_POST['stock_warning_limit'];  
$currency = $_POST['currency'];
$vat_reg_no = $_POST['vat_reg_no'];

$sql = "UPDATE settings set 
system_name='$system_name', 
title = '$title', 
address='$address', 
phone = '$phone', 
email='$email', 
vat = '$vat', 
currency = '$currency',
vat_reg_no = '$vat_reg_no',
logo = '$logo'
where setting_id ='1' ";

if ($connection->query($sql) === TRUE) {
  
	$_SESSION['message'] = "<div class=\"alert alert-success alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                <h4><i class=\"icon fa fa-check\"></i> Success!</h4>
                Settings Updated Successfully.
              </div>";
		header('Location: ../../settings.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                <h4><i class=\"icon fa fa-ban\"></i> Failed!</h4>
                Settings could not be updated.
              </div>";
		header('Location: ../../settings.php');
 
}





$connection->close();

?>