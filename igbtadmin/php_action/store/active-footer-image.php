<?php

error_reporting(0);
require('../db_connect.php');


if (isset($_GET['id'])){

		$f_id=$_GET['id'];

		$sql="UPDATE `footer_image` SET `f_status`= 1 WHERE f_id='$f_id'";

		// Execute the query
		mysqli_query($connection,$sql);
	}

	// Go back to page
	header('Location: http://localhost/igbt/igbtadmin/footer-image-list.php');
?>
?>