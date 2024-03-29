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
if (isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];

    $sql = "SELECT * FROM userinfo where user_email='$user_email'";  
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $user_email = $row['user_email'];
    $fullname = $row['fullname'];
    $user_type = $row['user_type']; // Define the user_type variable from database
}
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

    .listing__products .product-badges.product-badges-position {
        position: absolute;
        left: 10px;
        top: 130px;
        z-index: 9;
    }

    .listing__products .product-badges.product-badges-mrg {
        margin: 0 0 10px;
    }

    .main .listing__products__title {
        color: #415661;
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 10px;
        margin-top: -9px;
    }

    .search-main {
        width: 520px;
        height: 56px;
        margin: 0px auto;
        border-color: #fff;
        border-radius: 4px;
        background-color: #fff;
    }

    .search-main .input-search {
        height: 56px;
        margin-left: 10px;
        border: none;
        float: left;
        width: 435px;
        color: #6c8ea0;
        font-size: 14px;
    }

    .search-main .input-search:focus {
        outline: none;
        border: none;
    }

    .search-main .button_search {
        height: 56px;
        border: none;
        background-color: #fff;
        /* float: right; */
        margin-left: 10px;
        width: 50px;
    }

    .search-main .button_search .fa-icon {
        font-size: 20px;
        color: #42BC35;
    }

    ul li {
        list-style-type: none;
    }

    .aside__box_menu .first {
        width: 295px;
        height: auto;
        font-size: 12px;
        cursor: pointer;
        align-items: center;
        display: flex;
        /* justify-content: space-between; */
    }

    .aside__box_menu .first .svg {
        margin-right: 10px;
    }

    .aside__box_menu .first li a {
        text-decoration: none;
        display: block;
        padding: 8px 10px;
        color: #222;
        font-weight: bold;
        width: 225px;
    }

    .aside__box_menu .first:hover {
        color: #fff;
        background: #ebf2f7;
    }

    .first:hover .second {
        display: block;
    }

    .second {
        position: absolute;
        width: 290px;
        padding: 10px 0px;
        height: auto;
        margin-left: 294px;
        display: none;
        background-color: #fff;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2);
        align-items: center;
        justify-content: center;
        /* top: -2px; */
        /* border-radius: 5px; */
        z-index: 10;
    }

    .slider_do {
        position: relative;
        display: block;
        max-width: 800px;
    }

    .first li:hover .second li {
        margin-top: 0px;
    }

    .first li:hover .second li a {
        color: #222;
        border-left: 1px solid green;
    }

    .first .second li:hover {
        color: #fff;
        background: #ebf2f7;
    }

    .main .aside .first_display {
        display: none;
    }

    #subcategory-select {
        display: none;
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

                            <h3 class="text-center text-white" style="font-weight:bold;">All Advertisement</h3>

                        </div>
                    </div>

                </section>
            </div>



            <section class="">
                <div class="container">
                    <div class="row gx-0">
                        <main class="main col-xl-12">
                            <section class="page-card page-card_leftSidebar">
                                <div class="container">

                                    <div class="row">

                                        <aside class="aside aside-left col-lg-4 col-xl-12"
                                            style="padding-top:25px; padding-bottom:25px;">
                                            <div class="aside-sticky_menu">
                                                <div class="aside__box_menu">

                                                    <div class="first first_display">
                                                        <!-- <div class="b-main-page__banners_block__banner"> -->
                                                        <div
                                                            class="b-post-advert-banner b-main-page__post-advert-banner">
                                                            <button aria-label="Post ad"
                                                                class="b-post-advert-banner__button">
                                                                <div class="b-post-advert-banner__button_inner">
                                                                    <div>
                                                            </button>
                                                            <p class="b-post-advert-banner__bottom-text">Post ad</p>
                                                        </div>
                                                        <!-- </div> -->
                                                    </div>

                                                    <?php
                                                        $sql = "SELECT * FROM categories order by cat_id ASC";  
                                                        $result = $connection->query($sql);
                                                        while($row = $result->fetch_assoc())  {  
                                                    ?>

                                                    <ul class="first">
                                                        <?php $cat_id = $row['cat_id']; ?>
                                                        <li>
                                                            <img src="img/icons/cat_icon1.png" alt="icon_img"
                                                                height="20px;" width="20px;"
                                                                style=" margin-left: 15px; margin-top: 5px;">
                                                            <a href="index.php?cat_id=<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?>
                                                            </a>

                                                            <ul class="second">
                                                                <?php
                                                                    $sql2 = "SELECT * FROM sub_categories where cat_id = '$cat_id'";  
                                                                    $result2 = $connection->query($sql2);
                                                                    while($row2 = $result2->fetch_assoc())  {  
                                                                ?>
                                                                <li><a
                                                                        href="index.php?sub_cat_id=<?php echo $row2['sub_cat_id']; ?>">
                                                                        <?php echo $row2['sub_cat_name']; ?></a>
                                                                </li>
                                                                <?php } ?>
                                                            </ul>

                                                        </li>

                                                        <!-- <img width="10" height="10"
                                                            src="https://img.icons8.com/ios/10/000000/forward--v1.png"
                                                            alt="forward--v1" /> -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="15px"
                                                            height="15px" viewBox="0 0 16 16" fill="#000000"
                                                            class="fa fa-chevron-right svg"
                                                            transform="matrix(1, 0, 0, 1, 0, 0)">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                                            </g>
                                                        </svg>


                                                    </ul>

                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </aside>

                                        <main class="main col-md-4 col-lg-8 col-xl-8" style="margin-left: -65px;">
                                            <?php
                                            if (isset($_GET['cat_id'])) {
                                                include "category.php";
                                            } elseif (isset($_GET['sub_cat_id'])) {
                                                include "sub_category.php";
                                            } else {
                                                // If no category is selected, show the default content (main_products.php content)
                                                include "main_products.php";
                                            }
                                            ?>
                                        </main>

                                    </div>
                                </div>
                            </section>
                        </main>
                    </div>
                </div>
            </section>


        </main>
        <footer class="footer">
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