<?php 

require_once 'db_connection_checker.php';

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

header('location: ../login.php');	

?>