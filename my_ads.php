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

    $user_name = $row['user_name'];
    $user_email = $row['user_email'];
    $fullname = $row['fullname'];
    $user_type = $row['user_type']; 
    $user_id = $row['user_id']; 
}

$countSql = "SELECT COUNT(*) AS total FROM ad_info WHERE user_id = $user_id";
$countResult = $connection->query($countSql);
$totalRecords = $countResult->fetch_assoc()['total'];

// Define the number of records per page
$recordsPerPage = 8; // Change this to your desired number

// Calculate the total number of pages
$totalPages = ceil($totalRecords / $recordsPerPage);

 // Determine the current page number
 if (!isset($_GET['page'])) {
    $currentPage = 1;
} else {
    $currentPage = $_GET['page'];
}

// Calculate the starting record for the query based on the current page
$offset = ($currentPage - 1) * $recordsPerPage;

// Modify your SQL query to include LIMIT and OFFSET
$sql = "SELECT * FROM ad_info WHERE user_id = $user_id ORDER BY ad_id DESC LIMIT $recordsPerPage OFFSET $offset";
$result = $connection->query($sql);

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
                                <?php echo $_SESSION['user_name'] ?> All Ads</h3>

                        </div>
                    </div>
                </section>

                <div class="col-md-12">
                    <?php
                   if (isset($_GET['delete'])) {
                    $deleteStatus = $_GET['delete'];
                
                    // Display corresponding message in JavaScript alert
                    echo '<script>';
                    if ($deleteStatus === 'success') {
                        echo 'alert("Ad deleted successfully!");';
                    } elseif ($deleteStatus === 'failed') {
                        echo 'alert("Failed to delete the ad.");';
                    } elseif ($deleteStatus === 'invalid') {
                        echo 'alert("Invalid ad ID or ad ID is missing.");';
                    }
                    echo '</script>';
                    } elseif(isset($_GET['update']) ) {
                        $updateStatus = $_GET['update'];

                        // Check if a corresponding message parameter is set
                            $updateMessage = isset($_GET['message']) ? $_GET['message'] : '';

                            // Display corresponding message on the page
                            echo '<script>';
                            if ($updateStatus === 'success') {
                                echo 'alert("' . $updateMessage . '");';
                            } elseif ($updateStatus === 'failed_unlink') {
                                echo 'alert("' . $updateMessage . '");';
                            } elseif ($updateStatus === 'invalid') {
                                echo 'alert("Invalid ad ID or ad ID is missing.");';
                            }
                            echo '</script>';
                    }
                    ?>
                </div>

                <section class="middle__screen">
                    <div class="container mt-5">
                        <div class="row gx-0">
                            <main class="main col-xl-12">
                                <div class="col-md-12">
                                    <div class="listing__products" id="product_list">
                                        <?php
                                            // Check if there are rows returned from the query
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                        ?>

                                        <div class="col-6 col-xl-3 col-md-3 col-sm-3">
                                            <div class="listing-card ll-none">
                                                <div class="listing-card__box listing-card__box_featured"
                                                    data-marker="0">
                                                    <div class="listing-card__media shine">
                                                        <a href="add.php?ad_id=<?php echo $row['ad_id']; ?>">
                                                            <img src="igbetifarmadmin/images/advertisement/<?php echo $row['ad_feature_image']; ?>"
                                                                alt="<?php echo $row['ad_id']; ?>" width="360"
                                                                height="200">
                                                        </a>

                                                        <div class="listing-btn-action">
                                                            <a class="listing-btn-ico view_more_link"
                                                                href="update_postad.php?ad_id=<?php echo $row['ad_id']; ?>"
                                                                data-uk-tooltip="Edit AD" title=""
                                                                data-aria-describedby="uk-tooltip-0">
                                                                <i class="fa-solid fa-edit"></i>
                                                            </a>
                                                            <a class="listing-btn-ico listing-tgl-button"
                                                                href="delete_postad.php?ad_id=<?php echo $row['ad_id']; ?>"
                                                                onclick="return confirm('Are you sure you want to delete this ad?');"
                                                                data-uk-tooltip="Delete AD" title=""
                                                                data-aria-describedby="uk-tooltip-1">
                                                                <i class="fa fa-trash"></i>
                                                                <i class="fa fa-trash"></i>
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
                                                                    <a href="add.php?ad_id=<?php echo $row['ad_id']; ?>"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
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
                                            } else {
                                                
                                        ?>
                                        <div class="col-12">
                                            <p>No data found.</p>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- Display pagination links -->
                                <div class="pagination justify-content-center mt-4">
                                    <?php if ($currentPage > 1) : ?>
                                    <!-- First and Previous buttons -->
                                    <a href="?page=1" class="btn btn-success">First</a>
                                    <a href="?page=<?php echo $currentPage - 1; ?>"
                                        class="btn btn-success mx-1">Previous</a>
                                    <?php endif; ?>
                                    <?php for ($page = max(1, $currentPage - 2); $page <= min($currentPage + 2, $totalPages); $page++) : ?>
                                    <!-- Page number buttons -->
                                    <?php if ($page == $currentPage) : ?>
                                    <a href="?page=<?php echo $page; ?>" class="btn btn-success mx-1 active"
                                        style="color: white; background-color: green;"><?php echo $page; ?></a>
                                    <?php else : ?>
                                    <a href="?page=<?php echo $page; ?>" class="btn btn-outline-success mx-1"
                                        style="color: green; transition: background-color 0.3s;"
                                        onmouseover="this.style.color='white'; this.style.backgroundColor='green'"
                                        onmouseout="this.style.color='green'; this.style.backgroundColor='#fff'"><?php echo $page; ?></a>
                                    <?php endif; ?>
                                    <?php endfor; ?>

                                    <?php if ($currentPage < $totalPages) : ?>
                                    <!-- Next and Last buttons -->
                                    <a href="?page=<?php echo $currentPage + 1; ?>"
                                        class="btn btn-success mx-1">Next</a>
                                    <a href="?page=<?php echo $totalPages; ?>" class="btn btn-success">Last</a>
                                    <?php endif; ?>
                                </div>
                            </main>
                        </div>
                    </div>
                </section>

            </div>
        </main>
        <!-- style="margin-top: -95px;" -->
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