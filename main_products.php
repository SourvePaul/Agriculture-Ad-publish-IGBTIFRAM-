<section class="content">
    <div class="row" id="main_slider_post_button">

        <div class="col-12 col-sm-12 col-md-8">
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
                    $output.= '<img src="igbtadmin/images/banner/'.$row["banner_img"].'" alt="banner_img"/ style="height: 215px; width:100%;">
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

        <div class="col-12 col-sm-12 col-md-4">
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

    <h3 class="listing__products__title ">Trending ads</h3>

    <div class="listing__products" id="product_list">
        <div class="row">
            <?php

                $sql = "SELECT * FROM ad_info ORDER BY ad_id DESC LIMIT 10";  
                $result = $connection->query($sql);
                $product = 0;
                $counter = 0;

                // Check if there are rows returned from the query
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $product++;
                        $counter++;
            ?>
            <?php 
                if ($counter <= 2) {
            ?>

            <div class="col-12 col-xl-12 col-md-12 col-sm-12 listing__products__box">
                <div class="row no-gutters">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 listing__products__image">
                        <a href="add.php?ad_id=<?php echo $row['ad_id']; ?>">
                            <img src="igbtadmin/images/advertisement/<?php echo $row['ad_feature_image']; ?>"
                                alt="<?php echo $row['ad_id']; ?>" class="card-img" width="360">
                        </a>

                        <?php 
                        if ($counter <= 2) {
                        ?>
                        <div class="product-badges product-badges-position product-badges-mrg">
                            <span class="badge rounded-pill hot" style="background-color:#8a288f;">TOP
                                AD</span>
                        </div>

                        <?php
                        } else {
                        ?>
                        <div class="product-badges product-badges-position product-badges-mrg" style="display:none;">
                        </div>

                        <?php
                        } 
                        ?>
                    </div>


                    <div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="add.php?ad_id=<?php echo $row['ad_id']; ?>"
                                    style="text-decoration:none; color:black; font-weight:bold;"><?php echo $row['ad_title']; ?></a>
                            </h5>
                            <p class="card-text">
                                <?php echo $row['ad_description']; ?></p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins
                                    ago</small></p>
                        </div>
                    </div>
                </div>
            </div>

            <?php 
            } else { 
            ?>
            <div class="col-6 col-xl-3 col-md-3 col-sm-3">
                <div class="listing-card ll-none">
                    <div class="listing-card__box listing-card__box_featured" data-marker="0">
                        <div class="listing-card__media shine">
                            <a href="add.php?ad_id=<?php echo $row['ad_id']; ?>">
                                <img src="igbtadmin/images/advertisement/<?php echo $row['ad_feature_image']; ?>"
                                    alt="<?php echo $row['ad_id']; ?>" width="360" height="200">
                            </a>

                            <div class="listing-btn-action">
                                <a class="listing-btn-ico view_more_link"
                                    href="add.php?ad_id=<?php echo $row['ad_id']; ?>" data-uk-tooltip="View More"
                                    title="" data-aria-describedby="uk-tooltip-0">
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
                                    <!-- <div class="title">
                                    <a href="#"></a>
                                    </div> -->
                                    <div class="title">
                                        <a href="add.php?ad_id=<?php echo $row['ad_id']; ?>" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="<?php echo $row['ad_title']; ?>">
                                            <?php
                                                $title = $row['ad_title'];
                                                $words = explode(' ', $title); // Split the string into an array of words
                                                $limitedWords = implode(' ', array_slice($words, 0, 2));
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