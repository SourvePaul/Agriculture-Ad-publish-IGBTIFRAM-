<?php

require_once('php_action/db_connection_checker.php'); 
require_once('php_action/db_connect.php'); 

$category_id = isset($_GET['category_id']) ? (int)$_GET['category_id'] : 0;

$sql = "SELECT * FROM sub_categories where cat_id = $category_id";
$result = $connection->query($sql);
// output data of each row  
while($row = $result->fetch_assoc()) {
	 $id = $row['sub_cat_id'];
	 $name = $row['sub_cat_name'];
?>	 
<option value="<?php echo $id; ?>"><?php echo $name; ?></option>


<?php
}

?>
