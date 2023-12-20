<?php
 require_once('db_connect.php');
 session_start();

// Default value for $isLoggedIn
$isLoggedIn = false;

// Check if the session variable is set and user is logged in
if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
    $author = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
    $isLoggedIn = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>News Page</title>
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
            <div class="container__1620">
                <div id="main-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-8 col-xl-8">
                                <div class="post-container">

                                    <div class="post-content">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a class="post-img" href="">
                                                    <img src="igbtadmin/images/blog/1.jpg" alt="1">
                                                </a>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="inner-content clearfix">
                                                    <h3><a href="">Lorem ipsum dolor sit amet consectetur adipisicing
                                                            elit.</a></h3>
                                                    <div class="post-information">
                                                        <span>
                                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                                            <a href="#">cat_name</a>
                                                        </span>
                                                        <span>
                                                            <i class="fa fa-user" aria-hidden="true"></i>
                                                            <a href="#">author</a>
                                                        </span>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                            date
                                                        </span>
                                                    </div>
                                                    <p class="description">
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam
                                                        voluptas,
                                                        qui velit dolore alias quae vel itaque beatae, animi laborum sit
                                                        molestiae?
                                                    </p>
                                                    <a class="read-more pull-right" href="#">read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="post-content">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a class="post-img" href="">
                                                    <img src="igbtadmin/images/blog/2.jpg" alt="1">
                                                </a>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="inner-content clearfix">
                                                    <h3><a href="">Lorem ipsum dolor sit amet consectetur adipisicing
                                                            elit.</a></h3>
                                                    <div class="post-information">
                                                        <span>
                                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                                            <a href="#">cat_name</a>
                                                        </span>
                                                        <span>
                                                            <i class="fa fa-user" aria-hidden="true"></i>
                                                            <a href="#">author</a>
                                                        </span>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                            date
                                                        </span>
                                                    </div>
                                                    <p class="description">
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam
                                                        voluptas,
                                                        qui velit dolore alias quae vel itaque beatae, animi laborum sit
                                                        molestiae?
                                                    </p>
                                                    <a class="read-more pull-right" href="#">read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="post-content">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a class="post-img" href="">
                                                    <img src="igbtadmin/images/blog/3.jpg" alt="1">
                                                </a>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="inner-content clearfix">
                                                    <h3><a href="">Lorem ipsum dolor sit amet consectetur adipisicing
                                                            elit.</a></h3>
                                                    <div class="post-information">
                                                        <span>
                                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                                            <a href="#">cat_name</a>
                                                        </span>
                                                        <span>
                                                            <i class="fa fa-user" aria-hidden="true"></i>
                                                            <a href="#">author</a>
                                                        </span>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                            date
                                                        </span>
                                                    </div>
                                                    <p class="description">
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam
                                                        voluptas,
                                                        qui velit dolore alias quae vel itaque beatae, animi laborum sit
                                                        molestiae?
                                                    </p>
                                                    <a class="read-more pull-right" href="#">read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="post-content">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a class="post-img" href="">
                                                    <img src="igbtadmin/images/blog/4.jpg" alt="1">
                                                </a>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="inner-content clearfix">
                                                    <h3><a href="">Lorem ipsum dolor sit amet consectetur adipisicing
                                                            elit.</a></h3>
                                                    <div class="post-information">
                                                        <span>
                                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                                            <a href="#">cat_name</a>
                                                        </span>
                                                        <span>
                                                            <i class="fa fa-user" aria-hidden="true"></i>
                                                            <a href="#">author</a>
                                                        </span>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                            date
                                                        </span>
                                                    </div>
                                                    <p class="description">
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam
                                                        voluptas,
                                                        qui velit dolore alias quae vel itaque beatae, animi laborum sit
                                                        molestiae?
                                                    </p>
                                                    <a class="read-more pull-right" href="#">read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="post-content">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a class="post-img" href="">
                                                    <img src="igbtadmin/images/blog/5.jpg" alt="1">
                                                </a>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="inner-content clearfix">
                                                    <h3><a href="">Lorem ipsum dolor sit amet consectetur adipisicing
                                                            elit.</a></h3>
                                                    <div class="post-information">
                                                        <span>
                                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                                            <a href="#">cat_name</a>
                                                        </span>
                                                        <span>
                                                            <i class="fa fa-user" aria-hidden="true"></i>
                                                            <a href="#">author</a>
                                                        </span>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                            date
                                                        </span>
                                                    </div>
                                                    <p class="description">
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam
                                                        voluptas,
                                                        qui velit dolore alias quae vel itaque beatae, animi laborum sit
                                                        molestiae?
                                                    </p>
                                                    <a class="read-more pull-right" href="#">read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="post-content">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a class="post-img" href="">
                                                    <img src="igbtadmin/images/blog/6.jpg" alt="1">
                                                </a>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="inner-content clearfix">
                                                    <h3><a href="">Lorem ipsum dolor sit amet consectetur adipisicing
                                                            elit.</a></h3>
                                                    <div class="post-information">
                                                        <span>
                                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                                            <a href="#">cat_name</a>
                                                        </span>
                                                        <span>
                                                            <i class="fa fa-user" aria-hidden="true"></i>
                                                            <a href="#">author</a>
                                                        </span>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                            date
                                                        </span>
                                                    </div>
                                                    <p class="description">
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam
                                                        voluptas,
                                                        qui velit dolore alias quae vel itaque beatae, animi laborum sit
                                                        molestiae?
                                                    </p>
                                                    <a class="read-more pull-right" href="#">read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="sidebar" class="col-6 col-sm-6 col-md-4 col-xl-4">
                                <!-- search box -->
                                <div class="search-box-container">
                                    <h4>Search</h4>
                                    <form class="search-post" action="#" method="GET">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control"
                                                placeholder="Search .....">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-danger">Search</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                                <!-- /search box -->
                                <!-- recent posts box -->
                                <div class="recent-post-container">
                                    <h4>Recent Posts</h4>
                                    <div class="recent-post">
                                        <a class="post-img" href="#">
                                            <img src="igbtadmin/images/blog/7.jpg" alt="r1" />
                                        </a>
                                        <div class="post-content">
                                            <h5>
                                                <a href='#'>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                    Tempore,
                                                    suscipit!</a>
                                            </h5>
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='#'>cat_name</a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                date
                                            </span>
                                            <a class="read-more" href="#">read more</a>
                                        </div>
                                    </div>

                                    <div class="recent-post">
                                        <a class="post-img" href="#">
                                            <img src="igbtadmin/images/blog/8.jpg" alt="r1" />
                                        </a>
                                        <div class="post-content">
                                            <h5>
                                                <a href='#'>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                    Tempore,
                                                    suscipit!</a>
                                            </h5>
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='#'>cat_name</a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                date
                                            </span>
                                            <a class="read-more" href="#">read more</a>
                                        </div>
                                    </div>

                                    <div class="recent-post">
                                        <a class="post-img" href="#">
                                            <img src="igbtadmin/images/blog/9.jpg" alt="r1" />
                                        </a>
                                        <div class="post-content">
                                            <h5>
                                                <a href='#'>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                    Tempore,
                                                    suscipit!</a>
                                            </h5>
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='#'>cat_name</a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                date
                                            </span>
                                            <a class="read-more" href="#">read more</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /recent posts box -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <footer class="footer">
            <?php include "footer.php"; ?>
        </footer>
    </div>
</body>

</html>