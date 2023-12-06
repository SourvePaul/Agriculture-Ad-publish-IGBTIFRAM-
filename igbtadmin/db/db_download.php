<?php
error_reporting(0);
session_start();
if($_SESSION['adminType']=='sales'){
    header('Location: ../404-error.php');
  }
$fileName = $_SESSION['filename'];
?>
<html>
<body>
<a href="<?php echo $fileName;?>" download>Download SQL</a>
</body>
</html>