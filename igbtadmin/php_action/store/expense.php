<?php
 session_start();

require('../db_connect.php');


// Receiving data
$date = $_POST['date'];
$expense_cat_id = $_POST['expense_cat_id'];
$amount = $_POST['amount'];

$sql = "INSERT INTO expenses (date,expense_cat_id,amount) 
		VALUES ('$date','$expense_cat_id','$amount')";

if ($connection->query($sql) === TRUE) {
  
   $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> New Expense added successfully.
		</div>" ;
		header('Location: ../../expense-add.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Expense could not be added.
		</div>" ;
		header('Location: ../../expense-add.php');
 
}

$connection->close();

?>