<!DOCTYPE html>
<html lang="en">

<head>

    <title>Sign in page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@200;300;400;500;700&family=Smooch&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="css/component.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="fonts/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="fonts/icomoon2/style.css" />
    <link rel="stylesheet" href="fonts/icomoon1/style.css" />

</head>


<body>
    <div class="wrapper">

        <?php include "header.php"; ?>
        <main class="main">
            <section class="page-register">
                <div class="box-form">
                    <form action="login_auth.php" class="form d-flex flex-column" method="post">
                        <h4 class="form-title">Login to your account</h4>

                        <input type="text" name="user_email" class="input-reset form__input" placeholder="Email" />

                        <input type="password" name="password" class="input-reset form__input" placeholder="Password" />

                        <div class="d-flex">
                            <input type="checkbox" name="" class="input-reset form__input" />
                            <label class="form__label">Remember me </label>
                            <a href="#">Forgot Password?</a>
                        </div>
                        <button
                            class="link__template btn-hover-animate d-flex align-items-center justify-content-center">
                            <div class="text">login</div>

                        </button>
                        <a href="signup.php"
                            class="link__template second-bg-color  btn-hover-animate d-flex align-items-center justify-content-center">
                            <div class="text">register an account</div>

                            </button>
                        </a>
                    </form>
                </div>
            </section>
        </main>

        <footer class="footer" style="margin-top: -112px;">
            <?php include "footer.php"; ?>
        </footer>

    </div>

    <!--Left MENU-->
    <div class="left__menu">
        <div class="offcanvas offcanvas-start" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrollingLeftMenu"
            data-aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-body">
                <ul>
                    <li>
                        <a href="index.html">
                            <span class="icon_left_menu"><i class="fa-solid fa-house"></i></span>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon_left_menu"><i class="fa-sharp fa-solid fa-people-group"></i></span>
                            About Us
                        </a>
                    </li>
                    <li class="active-link">
                        <a href="#">
                            <span class="icon_left_menu"><i class="fa-solid fa-list"></i></span>
                            Listings
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon_left_menu"><i class="fa-solid fa-newspaper"></i></span>
                            Our News
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon_left_menu"><i class="fa fa-wrench" aria-hidden="true"></i></span>
                            Contact
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>

    <script src="assest/jquery 3.6.0.js"></script>
    <script src="assest/jquery-migrate-1.2.1.js"></script>
    <script src="assest/uikit.min.js"></script>
    <script src="assest/slick.min.js"></script>
    <script src="assest/modernizr.custom.js"></script>
    <script src="assest/jquery.dlmenu.js"></script>
    <script src="assest/bootstrap.js"></script>
    <script src="assest/jquery.sticky.js"></script>
    <script src="assest/slider.js"></script>
    <script src="assest/custom.js"></script>


</body>

</html>