<?php
 session_start();

require('../db_connect.php');


//This block is for image upload
$staff_image = time().$_FILES['staff_image']['name'];
$temporary_location= $_FILES['staff_image']['tmp_name'];
$myLocation= '../../images/staffs/'.$staff_image;
move_uploaded_file($temporary_location, $myLocation );
//End of image block

// Receiving data
$staff_id = $_POST['staff_id'];
$staff_name = $_POST['staff_name'];
$identification_no = $_POST['identification_no'];
$address = $_POST['address'];
$phone = $_POST['phone'];  


	$sql = "UPDATE staffs set staff_name='$staff_name', identification_no = '$identification_no',
	 address='$address', phone = '$phone',staff_image = '$staff_image' where staff_id = ".$staff_id;

if ($connection->query($sql) === TRUE) {
  
	$_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> Staff Updated Successfully.
		</div>" ;
		header('Location: ../../staff.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Staff could not be Updated.
		</div>" ;
		header('Location: ../../staff.php');
 
}



$connection->close();

?>