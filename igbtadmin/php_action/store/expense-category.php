<?php
 session_start();

require('../db_connect.php');


// Receiving data
$expense_cat_name = $_POST['expense_cat_name'];
$description = $_POST['description'];

$sql = "INSERT INTO expense_categories (expense_cat_name,description) 
		VALUES ('$expense_cat_name','$description')";

if ($connection->query($sql) === TRUE) {
  
   $_SESSION['message'] = "<div class=\"alert alert-success\">
		<strong>Success!</strong> New Expense-Category added successfully.
		</div>" ;
		header('Location: ../../expense-category-add.php');
   
} else {
	   $_SESSION['message'] = "<div class=\"alert alert-danger\">
		<strong>Failed!</strong> Expense-Category could not be added.
		</div>" ;
		header('Location: ../../expense-category-add.php');
 
}

$connection->close();

?>