<?php
require('db_connect.php');
$user_name = $_POST['user_name'];
$user_type = $_POST['user_type'];
$password = $_POST['password'];
$user_email = $_POST['user_email'];
$user_phone = $_POST['user_phone'];
$fullname = $_POST['fullname'];
$user_status = "1";
/*
echo $user_name; echo "<br>";
echo $user_type; echo "<br>";
echo $password; echo "<br>";
echo $user_email; echo "<br>";
echo $user_phone; echo "<br>";
echo $user_status; echo "<br>";
exit();
*/
?>
<?php
$sql = "INSERT INTO `userinfo` ( `user_name`, `user_type`, `password`, `user_email`,  `user_phone`, `fullname`, `user_status`) VALUES ('$user_name','$user_type','$password','$user_email','$user_phone','$fullname','$user_status')";

if ($connection->query($sql) === TRUE) {
  
  
		header('Location: signin.php?success=1');
   
} else {
    header('Location: signin.php?success=0');
 
}

$connection->close();
?>