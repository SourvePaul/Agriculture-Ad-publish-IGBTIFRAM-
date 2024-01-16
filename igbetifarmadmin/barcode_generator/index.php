<?php
include 'barcode128.php';
if(isset($_POST['number'])){
$var = $_POST['number'];
}
else{
$var = 0;	
}
?>
<!DOCTYPE html>
<html>
<head>
 <title>Barcode</title>
 <style>
p{
 display:inline;
 word-wrap: break-word;
 float:left;
 padding-left:  10px;
}
</style>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
 Type text :<input type="text" name="generate"><br>
 Number of Copies:<input type="text" name="number"><br>
 <input type="submit" name="submit" value="submit">
</form><br>

<?php
while($var!=0){
?>
<p><?php echo bar128(stripcslashes($_POST['generate']))?></p><p> <?php echo "  "; ?></p>

<?php $var--; } ?>

</body>
</html>