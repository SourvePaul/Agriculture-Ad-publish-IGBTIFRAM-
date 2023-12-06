<?php

include "dbconnect.php";
$phone = $_POST['phone'];
$password = $_POST['password'];
$publish2 = "on";

		if($publish2=="on")
		{
			$query=mysql_query("select * from user WHERE  phone='$phone' AND   password='$password'  " );
            $row=mysql_fetch_array($query);
		}

	if($row)
	{
			
					
								session_cache_limiter(FALSE);
								session_start(); 
								$_SESSION['phone']=$_POST['phone'];
			
			
								//header ('Location: main.php');
								
								?>
								<meta HTTP-EQUIV="REFRESH" content="0; url=profile.php">
					
								
	<?php							
	exit();
	}
	
	
	else 
	{
 	header ('Location: login.php?flag=1');
	exit();
	}

?>