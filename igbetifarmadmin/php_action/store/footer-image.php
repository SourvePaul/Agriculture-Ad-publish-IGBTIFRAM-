<?php
session_start();
error_reporting(0);
require('../db_connect.php');

//var_dump($_POST);
//This block is for image upload
    // Handle Single Image Upload
    if (!empty($_FILES['footer_top_image']['name'])) {
        $footer_top_image = time().$_FILES['footer_top_image']['name'];
        $footer_top_imageTemp = $_FILES['footer_top_image']['tmp_name'];

        // Move uploaded single image to desired location
        move_uploaded_file($footer_top_imageTemp, '../../images/footer/' . $footer_top_image);

        echo "Feature Image Uploaded: {$footer_top_image}<br>";
    } else {
        echo "No Feature image uploaded<br>";
    }
    
//End of image block

// Receiving data
//var_dump($_POST);

$sql = "INSERT INTO `footer_image` ( `footer_top_image`) VALUES ('$footer_top_image')";

if ($connection->query($sql) === TRUE) {
  
   $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> New Image Upload successfully.
		</div>" ;
		header('Location: ../../footer-image-add.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Upload new image.
		</div>" ;
		header('Location: ../../footer-image-add.php');
 
}

$connection->close();


?>