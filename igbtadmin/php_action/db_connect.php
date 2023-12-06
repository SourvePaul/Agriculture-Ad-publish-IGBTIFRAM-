<?php 	

// For server
$localhost = "localhost";
$username = "root";
$password = "";
$databaseName = "igbetifa_igbt";


// db connection
$connection = new mysqli($localhost, $username, $password, $databaseName);
// check connection
if($connection->connect_error) {
  die("Connection Failed : " . $connection->connect_error);
} else {
  // echo "Successfully connected";
}

?>