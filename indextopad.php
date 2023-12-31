<?php
 require_once('db_connect.php');
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

                            <h6 class="text-white d-flex justify-content-center mt-3 gap-2" style="padding-top: 14px;">
                                Find anything in
                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                    data-target="#myModal" style="margin: -8px 0px;">
                                    All Nigeria
                                </button>

                                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLongTitle"
                                    aria-hidden="true" role="dialog">
                                    <div class="modal-dialog modal-xl" role="document">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal_left_title">
                                                    <p>All Nigeria • 1 907 128 Ads</p>
                                                </div>
                                                <div class="modal_right_title">

                                                    <input type="text" class="input_modal_search"
                                                        placeholder="Find state, city or district......" name="">
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <main class="main-modal col-xl-12">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-2">
                                                                <div class="card" style="width: 18rem;">
                                                                    <ul class="list-group list-group-flush">
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Abuja (FCT)
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Lagos State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Ogun State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Oyo State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Rivers State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Abia State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Adamawa State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Akwa Ibom State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Anambra State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Bauchi State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Bayelsa State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Benue State
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="card" style="width: 18rem;">
                                                                    <ul class="list-group list-group-flush">
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Cross River State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Delta State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Ebonyi State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Edo State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Ekiti State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Enugu State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Gombe State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Imo State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Jigawa State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Kaduna State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Kano State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Katsina State
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="card" style="width: 18rem;">
                                                                    <ul class="list-group list-group-flush">
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Kogi State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Kwara State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Nasarawa State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Niger State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Ondo State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Osun State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Plateau State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Sokoto State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Taraba State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Yobe State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="text-black dropdown-toggle"
                                                                                href="#" role="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                Zamfara State
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-group-item"><a
                                                                                class="dropdown-toggle" href="#"
                                                                                role="button" data-bs-toggle="dropdown"
                                                                                aria-expanded="false">

                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </main>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </h6>

                            <div class="search-main" style="margin-top: 35px;">
                                <input type="text" class="input-search" placeholder="I am looking for ..." name="" />
                                <button type="submit" name="" class="button_search">
                                    <i class="fa fa-search fa-icon"></i>
                                </button>
                            </div>
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
                                                            <a href="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?>
                                                            </a>

                                                            <ul class="second">
                                                                <?php
                                                                    $sql2 = "SELECT * FROM sub_categories where cat_id = '$cat_id'";  
                                                                    $result2 = $connection->query($sql2);
                                                                    while($row2 = $result2->fetch_assoc())  {  
                                                                ?>
                                                                <li><a href="<?php echo $row2['sub_cat_id']; ?>">
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
                                            <section class="content">
                                                <div class="row" id="main_slider_post_button">
                                                    <div class="col-md-8">
                                                        <div class="container-slide slider_do"
                                                            style="padding: 26px 0px;">
                                                            <?php
                                                                    function make_query($connection) {
                                                                        $query = "SELECT * FROM banner ";
                                                                        $result = mysqli_query($connection, $query);
                                                                        return $result;
                                                                        }
                                                                
                                                                    function make_slide_indicators($connection){
                                                                        $output = '';
                                                                        $count = 0;
                                                                        $result = make_query($connection);
                                                                        while($row = mysqli_fetch_array($result)) {
                                                                            if($count == 0) {
                                                                                $output .= '<li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>';
                                                                            } else {
                                                                                $output .= '<li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>';
                                                                            }
                                                                        $count = $count +1;		
                                                                        }
                                                                        return $output;
                                                                        }
                                                                
                                                                    function make_slides($connection) {
                                                                        $output = '';
                                                                        $count = 0;
                                                                        $result = make_query($connection);
                                                                        while($row = mysqli_fetch_array($result)) {
                                                                            if($count == 0) {
                                                                                $output.= '<div class="item active">';
                                                                            }else {
                                                                                $output.= '<div class="item">';
                                                                            } /* <h3>"Hello"</h3>*/
                                                                            $output.= '<img src="igbtadmin/images/banner/'.$row["banner_img"].'" alt="banner_img"/ style="height: 215px;">
                                                                                        <div class="carousel-caption">
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                    ';
                                                                            $count = $count + 1;
                                                                        }
                                                                        return $output;
                                                                        }
                                                                ?>

                                                            <div class="b-main-page__banners_block__sliders">
                                                                <div id="dynamic_slide_show" class="carousel slide"
                                                                    data-ride="carousel" style="height: 215px;">
                                                                    <ol class="carousel-indicators">
                                                                        <?php echo make_slide_indicators($connection); ?>
                                                                    </ol>
                                                                    <div class="carousel-inner">
                                                                        <?php echo make_slides($connection); ?>
                                                                    </div>
                                                                    <a class="left carousel-control"
                                                                        href="#dynamic_slide_show" data-slide="prev">
                                                                        <span
                                                                            class="glyphicon glyphicon-chevron-left"></span>
                                                                        <span class="sr-only">Previous</span>
                                                                    </a>

                                                                    <a class="right carousel-control"
                                                                        href="#dynamic_slide_show" data-slide="next">
                                                                        <span
                                                                            class="glyphicon glyphicon-chevron-right"></span>
                                                                        <span class="sr-only">Next</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="container-bottom" style="padding: 25px 0px;">
                                                            <div class="b-main-page__banners_block__banner">
                                                                <div
                                                                    class="b-post-advert-banner b-main-page__post-advert-banner">
                                                                    <p class="b-post-advert-banner__heading">Got
                                                                        something
                                                                        to sell</p>

                                                                    <button aria-label="Post ad"
                                                                        class="b-post-advert-banner__button">
                                                                        <div class="b-post-advert-banner__button_inner">
                                                                            <div>
                                                                    </button>
                                                                    <p class="b-post-advert-banner__bottom-text">Post an
                                                                        advert
                                                                        for free</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h3 class="listing__products__title ">Trending
                                                    ads</h3>

                                                <div class="listing__products" id="product_list">
                                                    <div class="row">
                                                        <?php
                                                        $sql = "SELECT * FROM ad_info ORDER BY ad_id DESC LIMIT 9";  
                                                        $result = $connection->query($sql);

                                                        // Check if there are rows returned from the query
                                                        if ($result->num_rows > 0) {
                                                            while($row = $result->fetch_assoc()) {
                                                        ?>
                                                        <div class="col-6 col-xl-3 col-md-3 col-sm-3">
                                                            <div class="listing-card ll-none">
                                                                <div class="listing-card__box listing-card__box_featured"
                                                                    data-marker="0">
                                                                    <div class="listing-card__media shine">
                                                                        <a href="02_listings-grid.#">
                                                                            <img src="igbtadmin/images/advertisement/<?php echo $row['ad_feature_image']; ?>"
                                                                                alt="<?php echo $row['ad_id']; ?>"
                                                                                width="360" height="200">
                                                                        </a>

                                                                        <div class="listing-btn-action">
                                                                            <a class="listing-btn-ico view_more_link"
                                                                                href="02_listings-grid.#"
                                                                                data-uk-tooltip="View More" title=""
                                                                                data-aria-describedby="uk-tooltip-0">
                                                                                <i class="fa-solid fa-eye"></i>
                                                                            </a>
                                                                            <a class="listing-btn-ico listing-tgl-button"
                                                                                href="#"
                                                                                data-uk-tooltip="Add to Compare"
                                                                                title=""
                                                                                data-aria-describedby="uk-tooltip-1">
                                                                                <i class="fa-solid fa-code-compare"></i>
                                                                                <i class="fa-solid fa-not-equal"></i>
                                                                            </a>
                                                                            <a class="listing-btn-ico listing-tgl-button"
                                                                                href="#"
                                                                                data-uk-tooltip="Add to Favorite"
                                                                                title=""
                                                                                data-aria-describedby="uk-tooltip-2">
                                                                                <i class="fa-regular fa-heart"></i>
                                                                                <i class="fa-solid fa-heart"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>



                                                                    <div class="">
                                                                        <div class="listing-card__body">
                                                                            <div class="body-wrapper">
                                                                                <!-- <div class="title">
                                                                                    <a href="#"></a>
                                                                                </div> -->
                                                                                <div class="title">
                                                                                    <a href="#" data-bs-toggle="tooltip"
                                                                                        data-bs-placement="top"
                                                                                        title="<?php echo $row['ad_title']; ?>">
                                                                                        <?php
                                                                                            $title = $row['ad_title'];
                                                                                            $words = explode(' ', $title); // Split the string into an array of words
                                                                                            $limitedWords = implode(' ', array_slice($words, 0, 15));
                                                                                            echo $limitedWords.'...'; // Output the truncated string
                                                                                        ?>
                                                                                    </a>
                                                                                </div>

                                                                                <div class="price">
                                                                                    &#x20A6;
                                                                                    <?php echo $row['ad_price']; ?>
                                                                                </div>
                                                                            </div>

                                                                            <p class="body-text">
                                                                                <?php echo $row['ad_description']; ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <?php
                                                            }
                                                        } else {
                                                            // If no rows are returned, display a "No Data Found" message
                                                        ?>
                                                        <div class="col-12">
                                                            <p>No data found.</p>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </section>
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