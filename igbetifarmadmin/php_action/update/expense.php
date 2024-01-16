<?php
 session_start();

require('../db_connect.php');


// Receiving data
$expense_id = $_POST['expense_id'];
$expense_cat_id = $_POST['expense_cat_id'];
$date = $_POST['date'];
$amount = $_POST['amount'];
  
	$sql = "UPDATE expenses set expense_cat_id='$expense_cat_id', date = '$date',amount = '$amount'
	  where expense_id = ".$expense_id;

if ($connection->query($sql) === TRUE) {
  
	$_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> Expense Info Updated Successfully.
		</div>" ;
		header("Location: ../../expense.php");
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Expense Info could not be Updated.
		</div>" ;
		header("Location: ../../expense.php");
 
}



$connection->close();

?>