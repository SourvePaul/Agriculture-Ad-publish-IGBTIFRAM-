<?php
require_once('db_connect.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['user_name'];
    $fullname = $_POST['fullname'];
    $user_phone = $_POST['user_phone'];
    $user_type = $_POST['user_type'];

    // Assuming the table name is 'userinfo'
    $sql = "UPDATE userinfo SET user_name='$user_name', fullname='$fullname', user_phone='$user_phone', user_type='$user_type' WHERE user_email='$_SESSION[user_email]'";

    if ($connection->query($sql) === TRUE) {
        header("Location: profile.php?success=1");
        exit();
    } else {
        header('Location: profile.php?success=0');
        exit();
    }
}
?>