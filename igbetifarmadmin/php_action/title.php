<?php 	
  
  require_once('db_connect.php');
  $sys_sql = "SELECT * FROM settings";
  $result = $connection->query($sys_sql);              
  while($sys_row = $result->fetch_assoc()) {   
    echo $system_title = $sys_row['title'];  
  }
  
?>