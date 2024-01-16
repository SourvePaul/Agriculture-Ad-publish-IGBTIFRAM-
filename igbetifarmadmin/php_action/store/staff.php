<?php
 session_start();

require('../db_connect.php');

var_dump($_POST);
//This block is for image upload
$staff_image = time().$_FILES['staff_image']['name'];
$temporary_location= $_FILES['staff_image']['tmp_name'];
$myLocation= '../../images/staffs/'.$staff_image;
move_uploaded_file($temporary_location, $myLocation );
//End of image block

// Receiving data
$staff_name = $_POST['staff_name'];
$identification_no = $_POST['identification_no'];
$address = $_POST['address'];
$phone = $_POST['phone'];

$sql = "INSERT INTO `staffs` ( `address`, `phone`, `staff_name`, `identification_no`,  `staff_image`) VALUES ('$address','$phone','$staff_name','$identification_no','$staff_image')";

if ($connection->query($sql) === TRUE) {
  
   $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> New product added successfully.
		</div>" ;
		header('Location: ../../staff-add.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> product could not be added.
		</div>" ;
		header('Location: ../../staff-add.php');
 
}

$connection->close();

?>