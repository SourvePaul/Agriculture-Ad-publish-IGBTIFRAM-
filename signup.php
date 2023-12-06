<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration page</title>
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
</head>


<body>
    <div class="wrapper">
        <div class="fl-nav-wrapper">
            <header id="signup-header">
                <div class="nav-logo d-flex align-items-center">
                    <a class="logo-img" href="index.php">
                        <img src="img/png/logo.png" alt="logo" width="172" height="45" />
                    </a>
                </div>
                <div class="container-fluid d-flex align-items-center header-search">
                    <form class="d-flex w-100">
                        <button class="btn" type="submit">
                            <i class="icon-search-1" aria-hidden="true"></i>
                        </button>
                        <input class="form-control me-2" type="search" placeholder="Search anything .... "
                            aria-label="Search" aria-placeholder="Search anything .... ">
                    </form>
                </div>
            </header>
        </div>
        <main class="main">
            <section class="page-register ">
                <div class="box-form">
                    <form action="signupaction.php" method="post" class="form d-flex flex-column">
                        <h4 class="form-title">Register an account</h4>
                        <input type="text" name="user_name" placeholder="User name" class="input-reset form__input" />
                        <input type="text" name="fullname" placeholder="Full name" class="input-reset form__input" />
                        <input type="text" name="user_email" placeholder="User Email" class="input-reset form__input" />
                        <input type="text" name="password" placeholder="Password" class="input-reset form__input" />
                        <input type="text" name="user_phone" placeholder="Phone" class="input-reset form__input" />
                        <div class="d-flex align-items-center">
                            <input type="radio" id="buyer" value="buyer" name="user_type"
                                class="input-reset form__input" />
                            <label class="form__label" style="margin-right: 10px;">I want to Buy </label>
                            <input type="radio" id="seller" value="seller" name="user_type"
                                class="input-reset form__input" />
                            <label class="form__label">I Want to Sell</label>
                        </div>
                        <div class="d-flex">
                            <input type="checkbox" name="Имя" class="input-reset form__input" />
                            <label class="form__label" style="margin-right: 10px;">I accept</label>
                            <a href="#"><b>Privacy Policy</b></a>
                        </div>
                        <button
                            class="link__template btn-hover-animate d-flex align-items-center justify-content-center">
                            <div class="text">Register an account</div>
                        </button>
                    </form>
                </div>
            </section>
        </main>
        <footer class="footer">
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