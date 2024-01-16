<?php 
require_once 'php_action/db_connect.php';

session_start();

if(isset($_SESSION['adminName'])) {
	header('location: index.php');	
}

$errors = array();

if($_POST) {		

	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username) || empty($password)) {
		if($username == "") {
			$errors[] = "Username is required";
		} 

		if($password == "") {
			$errors[] = "Password is required";
		}
	} else {
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = $connection->query($sql);

		if($result->num_rows == 1) {
			
			$password = md5($password);
			// exists
			$mainSql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$mainResult = $connection->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$admin_id = $value['admin_id'];

				// set session
				$_SESSION['adminName'] = $username;
				$_SESSION['adminId'] = $admin_id;

				header('location: index.php');	
			} else{
				
				$errors[] = "Username/Password Incorrect";
			} // /else
		} else {		
			$errors[] = "Username/Password Incorrect";	
		} // /else
	} // /else not empty username // password
	
} // /if $_POST
?>
<!doctype html>
<html lang="en">
  <head>
  <title><?php include('php_action/title.php'); ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<style>
	@import "bourbon";

body {
	background: #eee !important;	
}

.wrapper {	
	margin-top: 80px;
  margin-bottom: 80px;
}

.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  

  .form-signin-heading,
	.checkbox {
	  margin-bottom: 30px;
	}

	.checkbox {
	  font-weight: normal;
	}

	.form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
		@include box-sizing(border-box);

		&:focus {
		  z-index: 2;
		}
	}

	input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}

	input[type="password"] {
	  margin-bottom: 20px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
}

	</style>
  </head>
  <body>
     
	 <div class="wrapper">

    <form class="form-signin" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"> 
	  <center>,
      <h5 class="form-signin-heading" style="color: #9999ff">SALES POINT : POINT OF<br>SALES (SAAS APP)</h5>
	  <img src="images/user.png" height="100" width="100">
	  </center>
	  <br>
      <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" /><br>
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>   <br>   
	  <center><a href="forgot_password.php">Forgot Password?</a></center><br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">SIGN IN</button>
		<br>
	 	<div class="messages" style="text-align:center">
			<?php if($errors) {
				foreach ($errors as $key => $value) {
					echo '<div class="alert alert-danger" role="alert">
					<i class="glyphicon glyphicon-exclamation-sign"></i>
					'.$value.'</div>';										
				}
			} 
			?>
		</div>	  
    </form>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>