<?php
 session_start();

require('../db_connect.php');

var_dump($_POST);
//This block is for image upload
$banner_img = time().$_FILES['banner_img']['name'];
$temporary_location= $_FILES['banner_img']['tmp_name'];
$myLocation= '../../images/banner/'.$banner_img;
move_uploaded_file($temporary_location, $myLocation );
//End of image block

// Receiving data
$publish = $_POST['publish'];


$sql = "INSERT INTO `banner` (`publish`,  `banner_img`) VALUES ('$publish','$banner_img')";

if ($connection->query($sql) === TRUE) {
  
   $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> New product added successfully.
		</div>" ;
		header('Location: ../../change-banner.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> product could not be added.
		</div>" ;
		header('Location: ../../change-banner.php');
 
}

$connection->close();

?>