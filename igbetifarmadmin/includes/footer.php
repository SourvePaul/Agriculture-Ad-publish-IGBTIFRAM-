<?php 
  require_once('php_action/db_connection_checker.php'); 
  require_once('php_action/db_connect.php'); 
  $sys_sql = "SELECT * FROM settings";
  $result = $connection->query($sys_sql);              
  while($sys_row = $result->fetch_assoc()) {  
    $system_name = $sys_row['system_name'];    
  }
?>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2023 <a href="#" target="_blank"><?php echo $system_name; ?></a>.</strong> All rights
    reserved.
  </footer>