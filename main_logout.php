<?php 

require_once 'igbetifarmadmin/php_action/db_connection_checker.php';

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

header('location: index.php');	

?>