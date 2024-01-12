<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('../../db_connect.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $ad_id = mysqli_real_escape_string($connection, $_POST['ad_id']);
        $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);
        $ad_title = mysqli_real_escape_string($connection, $_POST['ad_title']);
        $ad_description = mysqli_real_escape_string($connection, $_POST['ad_description']);
        $cat_id = mysqli_real_escape_string($connection, $_POST['cat_id']);
        
        // Check if 'sub_cat_id' is set before using it
        $sub_cat_id = isset($_POST['sub_cat_id']) ? mysqli_real_escape_string($connection, $_POST['sub_cat_id']) : null;

        $ad_price = mysqli_real_escape_string($connection, $_POST['ad_price']);
        $ad_location = mysqli_real_escape_string($connection, $_POST['ad_location']);
        $ad_phone = mysqli_real_escape_string($connection, $_POST['ad_phone']);

        // Get the ad_id from the session
        // $ad_id = $_GET['ad_id'];

        // Define the directory where you want to store the images
        $uploadDirectory = '../../igbtadmin/images/advertisement/';

        // Initialize variables for feature image and multiple images
        $newFeatureImageName = "";
        $newMultipleImagesPaths = "";

        // Update ad_info table
        $stmt_update_ad_info = $connection->prepare("UPDATE ad_info SET ad_title=?, ad_description=?, cat_id=?, sub_cat_id=?, ad_price=?, ad_location=?, ad_phone=?, user_id=? WHERE ad_id=?");
        
        // Use appropriate 'bind_param' based on the number of parameters
        if ($stmt_update_ad_info->bind_param("ssiiisssi", $ad_title, $ad_description, $cat_id, $sub_cat_id, $ad_price, $ad_location, $ad_phone, $user_id, $ad_id)) {
            if ($stmt_update_ad_info->execute()) {
                // Update ad_feature_image
                if ($_FILES['ad_feature_image']['name'] != '') {
                    // Get the current feature image path from the database
                    $oldFeatureImagePath = $row12['ad_feature_image'];

                    // Move the new feature image to the specified directory
                    $newFeatureImageName = $_FILES['ad_feature_image']['name'];
                    $newFeatureImagePath = $uploadDirectory . $newFeatureImageName;

                    if (move_uploaded_file($_FILES['ad_feature_image']['tmp_name'], $newFeatureImagePath)) {
                        // Unlink (delete) the old feature image
                        if (!empty($oldFeatureImagePath) && file_exists($uploadDirectory . $oldFeatureImagePath)) {
                            unlink($uploadDirectory . $oldFeatureImagePath);
                        }
                    } else {
                        $errorMessage = "Error: Failed to move the uploaded feature image.";
                    }
                }

                // Update multiple_images
                if (!empty($_FILES['multiple_images']['name'][0])) {
                    // Get the current multiple images paths from the database
                    $oldMultipleImagesPaths = explode(" ", $multiple_images);

                    // Loop through each new uploaded file
                    foreach ($_FILES['multiple_images']['tmp_name'] as $key => $tmp_name) {
                        if (!empty($_FILES['multiple_images']['name'][$key])) {
                            // Generate a unique name for the new image
                            $newImageName = uniqid() . '_' . $_FILES['multiple_images']['name'][$key];
                            $newImagePath = $uploadDirectory . $newImageName;

                            // Move the new image to the specified directory
                            if (move_uploaded_file($tmp_name, $newImagePath)) {
                                // Add the new image name to the list
                                $newMultipleImagesPaths .= $newImageName . " ";
                            } else {
                                $errorMessage = "Error: Failed to move one or more uploaded files.";
                            }
                        }
                    }

                    // Unlink (delete) the old images
                    foreach ($oldMultipleImagesPaths as $oldImage) {
                        $oldImagePath = $uploadDirectory . $oldImage;
                        if (!empty($oldImage) && file_exists($oldImagePath)) {
                            $unlinkResult = unlink($oldImagePath);
                            if (!$unlinkResult) {
                                // Log an error or print a message indicating the failure
                                error_log("Failed to unlink file: $oldImagePath");
                            }
                        }
                    }
                }


                // Update the ad_info table with the new feature image and multiple images paths
                $stmt_update_images = $connection->prepare("UPDATE ad_info SET ad_feature_image=?, multiple_images=? WHERE ad_id=?");
                $stmt_update_images->bind_param("ssi", $newFeatureImageName, trim($newMultipleImagesPaths), $ad_id);
                $stmt_update_images->execute();
                $stmt_update_images->close();

                if (!isset($errorMessage)) {
                    $successMessage = "Ad updated successfully!";
                }

                header("location: ../../my_ads.php?update=success&message=" . urlencode($successMessage));
                exit();
            } else {
                $errorMessage .= "Error: Failed to update ad_info table. ";
                $errorMessage .= $stmt_update_ad_info->error;

                header("location: ../../my_ads.php?update=failed_unlink&message=" . urlencode($errorMessage));
                exit();
            }
        } else {
            $errorMessage .= "Error: Bind parameters failed. ";
            $errorMessage .= $stmt_update_ad_info->error;

            header("location: ../../my_ads.php?update=failed_unlink&message=" . urlencode($errorMessage));
            exit();
        }
    }
    else {
        header("location: ../../my_ads.php?update=invalid");
        exit();
    }
?>