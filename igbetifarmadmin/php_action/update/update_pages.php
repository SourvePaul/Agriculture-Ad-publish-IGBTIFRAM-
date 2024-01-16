<?php
require_once('db_connect.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pageType = isset($_GET['type_info']) ? $_GET['type_info'] : '';
    $detail = $connection->real_escape_string($_POST['detail']); // Sanitize input to prevent SQL injection

    // Assuming the table name is 'pages' 
    $sql2 = "UPDATE pages SET detail='$detail' WHERE types='$pageType'";
    $result2 = $connection->query($sql2);

    if ($result2 === TRUE) {
        header("Location: manage_pages.php?type_info=" . $pageType . "&success=1");
        exit();
    } else {
        header("Location: manage_pages.php?type_info=" . $pageType . "&error=0");
        exit();
    }
}
?>