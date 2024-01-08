<?php
session_start();
require_once('db_connect.php');

if(isset($_SESSION['user_id']) || isset($_SESSION['user_email'])) {


    if(isset($_POST['op']) &&  isset($_POST['np']) && isset($_POST['c_np'])) {
    
    function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
    
    $op = validate($_POST['op']);
    $np = validate($_POST['np']);
    $c_np = validate($_POST['c_np']);
    
    if(empty($op)){
    header("location: cPassword.php?error=Old Password is required");
    exit();
    } else if(empty($np)) {
    header("location: cPassword.php?error=New Password is required");
    exit();
    } else if($np !== $c_np) {
    header("location: cPassword.php?error=The Confirmation Password does not match");
    exit();
    } else {
    $op = $op;
    $np = $np;
    $user_email = $_SESSION['user_email'];
    
    $sql = "SELECT password FROM userinfo WHERE user_email='$user_email' AND password='$op'";
    $result = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result) === 1){
    $sql_2 = "UPDATE userinfo SET password='$np' WHERE user_email='$user_email'";
    mysqli_query($connection, $sql_2);
    header("Location: cPassword.php?success=Your Password has been successfully Change");
    exit();
    }else{
    header("location: cPassword.php?error=Password Incorrect");
    exit();
    }
    }
    
    } else{
    header("Location:index.php");
    exit();
    }
    
    } else {
    header("Location:index.php");
    exit();
    }
    ?>