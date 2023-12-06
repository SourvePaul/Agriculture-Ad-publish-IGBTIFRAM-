<?php

// $isLoggedIn = false;
include "db_connect.php";
$user_email = $_POST['user_email'];
$password = $_POST['password'];
$publish2 = "on";

		if($publish2=="on")
		{
            $sql = "SELECT * FROM userinfo where user_email='$user_email'";  
            $result = $connection->query($sql);
            $row = $result->fetch_assoc();
		}
		if($row)
			{
				session_cache_limiter(FALSE);
				session_start(); 
				$_SESSION['user_email']=$_POST['user_email'];
					//header ('Location: main.php');
				$_SESSION['isLoggedIn'] = true;
				$_SESSION['user_name'] =$row['user_name'];
				// header('Location: index.php');
								
?>
<meta HTTP-EQUIV="REFRESH" content="0; url=index.php">
<?php							
	exit();
			}
		else 
			{
 			header ('Location: signin.php?logout=1');
			exit();
			}
?>