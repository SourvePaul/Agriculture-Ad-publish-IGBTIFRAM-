<?php 
include "db_connect.php";

if (isset($_GET['ad_id']) && is_numeric($_GET['ad_id'])) {
    $ad_id = mysqli_real_escape_string($connection, $_GET['ad_id']);

    $stmt_select_images = $connection->prepare("SELECT ad_feature_image, multiple_images FROM ad_info WHERE ad_id = ?");
    $stmt_select_images->bind_param("i", $ad_id);
    $stmt_select_images->execute();
    $stmt_select_images->bind_result($feature_image, $multiple_images);
    $stmt_select_images->fetch();
    $stmt_select_images->close();

    $stmt_delete_ad_info = $connection->prepare("DELETE FROM ad_info WHERE ad_id = ?");
    $stmt_delete_ad_info->bind_param("i", $ad_id);

    $success = $stmt_delete_ad_info->execute();

    if ($success) {
        // Delete files from the save location
        $save_location = "igbtadmin/images/advertisement/";
        
        if (unlink($save_location . $feature_image)) {
            $multiple_images = explode(" ", $multiple_images);
            foreach ($multiple_images as $image) {
                unlink($save_location . $image);
            }
            header("location: my_ads.php?delete=success");
            exit();
        } else {
            header("location: my_ads.php?delete=failed_unlink");
            exit();
        }
    } else {
        header("location: my_ads.php?delete=failed_execute");
        exit();
    }
} else {
    header("location: my_ads.php?delete=invalid");
    exit();
}
?>