<?php
 require_once('db_connect.php');
 session_start();

// Default value for $isLoggedIn
$isLoggedIn = false;

// Check if the session variable is set and user is logged in
if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
    $username = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
    $isLoggedIn = true;
}

if (isset($_SESSION['user_id']) || isset($_SESSION['user_email']) ) {
    $user_email = $_SESSION['user_email'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome to iGbetiFarm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fonts/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="fonts/icomoon2/style.css">
    <link rel="stylesheet" href="fonts/icomoon1/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
    .middle__screen .container {
        width: 800px;
    }

    .middle__screen .container .row .main {
        background: rgb(99, 39, 120);
        color: #fff;
        box-shadow: 0 0 10px 5px #00b53f;
    }

    input.form-control:focus {
        border-color: #00b53f;
    }

    .form-control:focus {
        border-color: #00b53f;
    }

    .profile-button {
        background: rgb(6 191 70);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #00b53f
    }

    .profile-button:focus {
        background: #00b53f;
        box-shadow: none
    }

    .profile-button:active {
        background: #00b53f;
        box-shadow: none
    }

    .back:hover {
        color: #00b53f;
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }

    .add-experience:hover {
        background: #00b53f;
        color: #fff;
        cursor: pointer;
        border: solid 1px #00b53f
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        z-index: 1;
        background-color: rgba(0, 0, 0, 0.5);
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        margin-top: -20px;
        border-radius: 5px;
    }

    .dropdown-menu a {
        color: #333;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-menu a:hover {
        background-color: transparent;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }
    </style>
</head>

<body>
    <!-- Loader-->
    <div id="page-preloader"><span class="spinner border-t_second_b border-t_prim_a"></span></div>
    <!-- Loader end-->

    <div class="wrapper">
        <?php include "header.php"; ?>

        <main class="main">
            <div class="container__1620">

                <section class="first__screen">
                    <div class="row">
                        <div class="col-md-12" style="padding: 20px 0px;padding-bottom: 55px;">
                            <h4 class="text-center text-white" style="font-weight:bold;">iGbetiFarm is the Best
                                Marketplace to Buy & sell Your
                                Agricultural products quickly</h4>

                            <h3 class="text-center text-white" style="font-weight:bold;">
                                <?php echo $_SESSION['user_name'] ?> Change Password</h3>

                        </div>
                    </div>
                </section>

                <section class="middle__screen">
                    <div class="container rounded bg-white mt-5 mb-5">
                        <div class="row gx-0">
                            <main class="main col-xl-12">
                                <div class="col-md-12 border-right">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                        <img class="rounded-circle mt-5" width="150px"
                                            src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                        <span class="font-weight-bold"><?php echo $_SESSION['user_name'] ?></span>
                                        <span class="text-white-50"><?php echo $_SESSION['user_email'] ?></span>
                                        <span> </span>
                                    </div>
                                </div>
                                <div class="col-md-12 border-right">
                                    <div class="p-3 py-5">
                                        <div class="d-flex justify-content-center align-items-center mb-3">
                                            <h3 class="text-center">Change Password</h3>
                                        </div>

                                        <form action="change_password_handler.php" method="post"
                                            style="background-color:transparent;">

                                            <?php 
                                            if(isset($_GET['error'])) { 
                                            ?>
                                            <p class="error"><?php echo $_GET['error']; ?></p>
                                            <?php } ?>
                                            <?php 
                                            if(isset($_GET['success'])) { 
                                            ?>
                                            <p class="success"><?php echo $_GET['success']; ?></p>
                                            <?php } ?>

                                            <div class="row mt-2">
                                                <div class="col-md-12 form-group">
                                                    <label for="password"> Current Password:</label>
                                                    <input type="password" id="password" name="op"
                                                        placeholder="old password" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12 form-group">
                                                    <label for="newpassword"> New Password:</label>
                                                    <input type="text" id="newpassword" name="np"
                                                        placeholder="New Password" class="form-control" required>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label for="confirmnewpassword">Confirm New Password:</label>
                                                    <input type="password" id="confirmnewpassword" name="c_np"
                                                        placeholder="Confirm New Password" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="mt-5 text-center">
                                                <button class="btn btn-primary profile-button" value="Update Password"
                                                    type="submit">Change Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </main>
                        </div>
                    </div>
                </section>

            </div>
        </main>

        <footer class="footer" style="margin-top: -95px;">
            <?php include "footer.php"; ?>
        </footer>
    </div>
    <script src="assest/jquery.js"></script>
    <script src="assest/jquery-migrate-1.2.1.js"></script>
    <script src="assest/uikit.min.js"></script>
    <script src="assest/slick.min.js"></script>
    <script src="assest/modernizr.custom.js"></script>
    <script src="assest/jquery.dlmenu.js"></script>
    <script src="assest/bootstrap.js"></script>
    <script src="assest/custom.js"></script>
</body>

</html>
<?php 
} else {
    header("Location: index.php");
    exit();
}
?>