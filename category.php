<section class="content">

    <div class="listing__products" id="product_list">
        <div class="row">
            <?php

                if (isset($_POST['cat_id'])) {
                    $cat_id = $_POST['cat_id'];

                    if (!empty($cat_id)) {
                        $sql = "SELECT * FROM ad_info WHERE cat_id = $cat_id ORDER BY ad_id DESC LIMIT 10";
                    } else {
                        $sql = "SELECT * FROM ad_info ORDER BY ad_id DESC LIMIT 10";
                    }
                

                // $sql = "SELECT * FROM ad_info WHERE cat_id =  ORDER BY ad_id DESC LIMIT 10";  
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
                        <img src="igbtadmin/images/advertisement/<?php echo $row['ad_feature_image']; ?>"
                            alt="<?php echo $row['ad_id']; ?>" class="card-img" width="360">
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
                                <?php echo $row['ad_title']; ?></h5>
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
                            <a href="02_listings-grid.#">
                                <img src="igbtadmin/images/advertisement/<?php echo $row['ad_feature_image']; ?>"
                                    alt="<?php echo $row['ad_id']; ?>" width="360" height="200">
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
                                    <!-- <div class="title">
                                    <a href="#"></a>
                                    </div> -->
                                    <div class="title">
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="<?php echo $row['ad_title']; ?>">
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
        }
            ?>
        </div>
    </div>

</section>