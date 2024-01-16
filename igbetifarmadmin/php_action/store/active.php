<?php

error_reporting(0);
require('../db_connect.php');

$ad_id = $_GET['ad_id'];
$status = $_GET['status'];

$updateQuery = "UPDATE ad_info SET 'status'=$status WHERE ad_id=$ad_id";
$stmt = $connection->prepare($updateQuery);

if ($stmt) {
    $stmt->bind_param("ii", $status, $ad_id);
    $stmt->execute();
        // Redirect to the appropriate page after the update
        header('Location: http://localhost/igbtdemo/igbetifarmadmin/ad-info-list.php');
        exit(); // Ensure no code is executed after the header redirect
    } else {
        // Handle the case where the prepared statement fails
        echo "Error preparing the update query.";
    }
    
    $connection->close();
    ?>
<!-- mysqli_query($connection, $updateQuery);
header('location:http://localhost/igbtdemo/igbetifarmadmin/ad-info-list.php')

?> -->