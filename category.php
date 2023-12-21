<?php 
require_once('db_connect.php');
?>
<section class="content">
    <div class="row" id="main_slider_post_button">
        <div class="col-md-8">
            <div class="container-slide slider_do" style="padding: 26px 0px;">
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
                    <div id="dynamic_slide_show" class="carousel slide" data-ride="carousel" style="height: 215px;">
                        <ol class="carousel-indicators">
                            <?php echo make_slide_indicators($connection); ?>
                        </ol>
                        <div class="carousel-inner">
                            <?php echo make_slides($connection); ?>
                        </div>
                        <a class="left carousel-control" href="#dynamic_slide_show" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>

                        <a class="right carousel-control" href="#dynamic_slide_show" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="container-bottom" style="padding: 25px 0px;">
                <div class="b-main-page__banners_block__banner">
                    <div class="b-post-advert-banner b-main-page__post-advert-banner">
                        <p class="b-post-advert-banner__heading">Got something to sell</p>

                        <button onclick="location.href = 'postad.php'" aria-label="Post ad"
                            class="b-post-advert-banner__button">
                            <!-- location.href='postad.php' -->
                            <div class="b-post-advert-banner__button_inner">
                                <div>
                        </button>
                        <p class="b-post-advert-banner__bottom-text">Post an advert for free</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="listing__products" id="product_list">
        <div class="row">
            <?php

                if (isset($_GET['cat_id'])) {
                    $cat_id = $_GET['cat_id'];

                    if (!empty($cat_id)) {
                        $sql = "SELECT * FROM ad_info WHERE cat_id = $cat_id ORDER BY ad_id DESC LIMIT 10";
                    } else {
                        $sql = "SELECT * FROM ad_info ORDER BY ad_id DESC LIMIT 10";
                    }
                

                // $sql = "SELECT * FROM ad_info WHERE cat_id =  ORDER BY ad_id DESC LIMIT 10";  
                $ads_result = $connection->query($sql);
                                            

                // Check if there are rows returned from the query
                if ($ads_result->num_rows > 0) {
                    while($ads_row = $ads_result->fetch_assoc()) {
            ?>
            <div class="col-6 col-xl-3 col-md-3 col-sm-3">
                <div class="listing-card ll-none">
                    <div class="listing-card__box listing-card__box_featured" data-marker="0">
                        <div class="listing-card__media shine">
                            <a href="02_listings-grid.#">
                                <img src="igbtadmin/images/advertisement/<?php echo $ads_row['ad_feature_image']; ?>"
                                    alt="<?php echo $ads_row['ad_id']; ?>" width="360" height="200">
                            </a>

                            <div class="listing-btn-action">
                                <a class="listing-btn-ico view_more_link" href="02_listings-grid.#"
                                    data-uk-tooltip="View More" title="" data-aria-describedby="uk-tooltip-0">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a class="listing-btn-ico listing-tgl-button" href="#" data-uk-tooltip="Add to Compare"
                                    title="" data-aria-describedby="uk-tooltip-1">
                                    <i class="fa-solid fa-code-compare"></i>
                                    <i class="fa-solid fa-not-equal"></i>
                                </a>
                                <a class="listing-btn-ico listing-tgl-button" href="#" data-uk-tooltip="Add to Favorite"
                                    title="" data-aria-describedby="uk-tooltip-2">
                                    <i class="fa-regular fa-heart"></i>
                                    <i class="fa-solid fa-heart"></i>
                                </a>
                            </div>
                        </div>

                        <div class="">
                            <div class="listing-card__body">
                                <div class="body-wrapper">
                                    <div class="title">
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="<?php echo $ads_row['ad_title']; ?>">
                                            <?php
                                                $title = $ads_row['ad_title'];
                                                $words = explode(' ', $title); // Split the string into an array of words
                                                $limitedWords = implode(' ', array_slice($words, 0, 2));
                                                echo $limitedWords.'...'; // Output the truncated string
                                            ?>
                                        </a>
                                    </div>

                                    <div class="price">
                                        &#x20A6;
                                        <?php echo $ads_row['ad_price']; ?>
                                    </div>
                                </div>

                                <p class="body-text">
                                    <?php echo $ads_row['ad_description']; ?>
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
                <h1 style="margin:0px auto;"> No products found for this category... </h1>

                <!-- <script>
                // Display an alert message
                alert('No products found for this category.');
                // Redirect to the index page after the alert is dismissed
                window.location.href = 'index.php'; // Replace 'index.php' with your index page URL
                </script> -->
            </div>

            <?php
             }
            }
            ?>

        </div>
    </div>

</section>