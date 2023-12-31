<?php
require_once('db_connect.php');


// Fetch the search query from the AJAX request
$searchQuery = $_POST['query']; // Assuming it's sent as POST data

// Perform a simple search in the 'products' table
$sql = "SELECT * FROM ad_info WHERE ad_title LIKE '%" . $connection->real_escape_string($searchQuery) . "%'";
$result = $connection->query($sql);

// Check if any results were found
if ($result->num_rows > 0) {
    // Output the results as HTML (you can format this as needed)
    while ($row = $result->fetch_assoc()) {
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
                    <a class="listing-btn-ico view_more_link" href="add.php?ad_id=<?php echo $row['ad_id']; ?>"
                        data-uk-tooltip="View More" title="" data-aria-describedby="uk-tooltip-0">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a class="listing-btn-ico listing-tgl-button" href="#" data-uk-tooltip="Add to Compare" title=""
                        data-aria-describedby="uk-tooltip-1">
                        <i class="fa-solid fa-code-compare"></i>
                        <i class="fa-solid fa-not-equal"></i>
                    </a>
                    <a class="listing-btn-ico listing-tgl-button" href="#" data-uk-tooltip="Add to Favorite" title=""
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
                            <a href="add.php?ad_id=<?php echo $row['ad_id']; ?>" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="<?php echo $row['ad_title']; ?>"
                                style="text-decoration: none; color: black; font-weight:bold; font-size: 25px; margin-left: 20px;">
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

<!-- echo '<div class="search-result">';
                echo '<h3>' . $row['ad_title'] . '</h3>';
                echo '<p>' . $row['ad_description'] . '</p>';
                // Add more details you want to display
                echo '</div>'; -->
<?php         
                }
            } 
            else { 
            ?>

<div class="col-12">
    <p>No data found.</p>
</div>

<!-- else {
    echo 'No results found'; // Displayed if no results are found
} -->
<?php
            }
// Close the database connection
$connection->close();
?>