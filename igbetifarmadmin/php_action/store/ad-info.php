<?php
session_start();
error_reporting(0);
require('../db_connect.php');

//var_dump($_POST);
//This block is for image upload
    // Handle Single Image Upload
    if (!empty($_FILES['ad_feature_image']['name'])) {
        $ad_feature_image = time().$_FILES['ad_feature_image']['name'];
        $ad_feature_imageTemp = $_FILES['ad_feature_image']['tmp_name'];

        // Move uploaded single image to desired location
        move_uploaded_file($ad_feature_imageTemp, '../../images/advertisement/' . $ad_feature_image);

        echo "Feature Image Uploaded: {$ad_feature_image}<br>";
    } else {
        echo "No Feature image uploaded<br>";
    }
    // Handle Multiple Images Upload
    if (!empty($_FILES['multiple_images']['name'][0])) {
        $totalImages = count($_FILES['multiple_images']['name']);

        for ($i = 0; $i < $totalImages; $i++) {
            $multiple_images = time().$_FILES['multiple_images']['name'][$i];
            $multipleImageTemp = $_FILES['multiple_images']['tmp_name'][$i];

            // Move each uploaded multiple image to desired location
            move_uploaded_file($multipleImageTemp, '../../images/advertisement/' . $multiple_images);

            echo "Multiple Image " . ($i + 1) . " Uploaded: {$multiple_images}";
        }
    } else {
        echo "No multiple images uploaded<br>";
    }
//End of image block

// Receiving data
$ad_title = $_POST['ad_title'];
$ad_description = $_POST['ad_description'];
$cat_id = $_POST['cat_id'];
$sub_cat_id = $_POST['sub_cat_id'];
$ad_price = $_POST['ad_price'];
$ad_location = $_POST['ad_location'];
$ad_phone = $_POST['ad_phone'];
$user_id = $_POST['user_id'];

//var_dump($_POST);

$sql = "INSERT INTO `ad_info` ( `cat_id`, `sub_cat_id`, `ad_title`, `ad_description`, `ad_price`, `ad_location`, `ad_phone`, `ad_feature_image`, `multiple_images`, `user_id`) VALUES ('$cat_id','$sub_cat_id','$ad_title','$ad_description','$ad_price','$ad_location','$ad_phone','$ad_feature_image', '$multiple_images', '$user_id')";

if ($connection->query($sql) === TRUE) {
  
   $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> New Advertisement Info added successfully.
		</div>" ;
		header('Location: ../../ad-info-add.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> This Advertisement already been added.
		</div>" ;
		header('Location: ../../ad-info-add.php');
 
}

$connection->close();


?>