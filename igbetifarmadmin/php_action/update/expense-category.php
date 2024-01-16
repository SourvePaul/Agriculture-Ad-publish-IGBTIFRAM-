<?php
 session_start();

require('../db_connect.php');


// Receiving data
$expense_cat_id = $_POST['expense_cat_id'];
$expense_cat_name = $_POST['expense_cat_name'];
$description = $_POST['description'];


	$sql = "UPDATE expense_categories set expense_cat_name='$expense_cat_name', description = '$description'
	  where expense_cat_id = ".$expense_cat_id;

if ($connection->query($sql) === TRUE) {
  
	$_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> Expense Categorry Updated Successfully.
		</div>" ;
		header("Location: ../../expense-category-edit.php?id=$expense_cat_id");
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Expense Categorry could not be Updated.
		</div>" ;
		header("Location: ../../expense-category-edit.php?id=$expense_cat_id");
 
}



$connection->close();

?>