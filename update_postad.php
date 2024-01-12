<?php 
ob_start();
include "db_connect.php";
session_cache_limiter( FALSE );
session_start(); 
$isLoggedIn = false;

// Check if the session variable is set and user is logged in
if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
    $username = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
    $isLoggedIn = true;
}

if (isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];

    $sql = "SELECT * FROM userinfo WHERE user_email='$user_email'";  
    $result = $connection->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Check if 'user_type' exists in the fetched row
        if (isset($row['user_type'])) {
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_email = $row['user_email'];
            $fullname = $row['fullname'];
            $user_type = $row['user_type']; // Define the user_type variable from the database
        } else {
            // Handle the case where 'user_type' is not present in the fetched row
        }
    } else {
        // Handle the case where no rows were returned by the query
    }


    // Check if ad_id is passed in the URL
    if (isset($_GET['ad_id'])) {
        $ad_id = $_GET['ad_id'];

        // Fetch ad details based on ad_id
        $sql = "SELECT * FROM ad_info WHERE ad_id = $ad_id";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            // Fetch ad details
            $row12 = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Post Ad</title>
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
        margin-top: 275px;
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
    <div class="wrapper">
        <?php include "header.php"; ?>
        <main class="main">
            <section class="page-register page-bg-color">
                <div class="row">
                    <div class="col-md-12">
                        <?php  
                            if(isset($_SESSION['message'])){
                            echo $_SESSION['message'];
                            $_SESSION['message'] = NULL;
                            }
                        ?>
                    </div>
                    <!-- left column -->
                    <form role="form" id="form" action="assest/user_store/update_postad_DB.php" method="POST"
                        enctype="multipart/form-data">
                        <div class="box-form" style="margin-bottom:-20px;">
                            <div class="col-md-12" style="padding: 20px 1px;">
                                <input type="hidden" class="form-title" style="padding: 8px 1px;"
                                    value="<?php echo  $row12['user_id']; ?>" name="user_id">

                                <h4 class="form-title"
                                    style="width:100%; background-color:#42BC35; color:#fff; text-align:center; align-items:center; justify-content:center; padding:15px 1px; border-radius: 5px;">
                                    Update Post Ad</h4>
                            </div>
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <div class="box-header with-border"></div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <div class="box-body">
                                        <div class="form-group" style="padding: 5px 1px;">
                                            <label for="exampleInputAdTitle"
                                                style="padding: 8px 0px; font-weight:bold;">Ad-Title</label>
                                            <input type="text" class="form-control" id="exampleInputAdTitle"
                                                name="ad_title" value="<?php echo  $row12['ad_title']; ?>" required>
                                        </div>
                                        <div class="form-group" style="padding: 5px 1px;">
                                            <label for="exampleInputAdDescription"
                                                style="padding: 8px 0px; font-weight:bold;">Ad-Description</label>
                                            <textarea id="exampleInputAdDescription" name="ad_description" rows="4"
                                                cols="50" class="form-control" required>
                                                <?php echo  $row12['ad_description']; ?>
                                            </textarea>
                                        </div>
                                        <div class="form-group" style="padding: 5px 1px;">
                                            <label style="padding: 8px 0px; font-weight:bold;">Category</label>
                                            <select class="form-control" name="cat_id" id="category-select" required>
                                                <option value="">---Select Category---</option>
                                                <?php
                                                // Read data
                                                $sql = "SELECT * FROM categories ORDER BY cat_name ASC";
                                                $result = $connection->query($sql);
                                                // output data of each row  
                                                while($cat_row = $result->fetch_assoc()) {  
                                                    $selected = ($cat_row['cat_id'] == $row12['cat_id']) ? 'selected' : '';
                                                ?>
                                                <option value="<?php echo $cat_row['cat_id']; ?>"
                                                    <?php echo $selected; ?>>
                                                    <?php echo $cat_row['cat_name']; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- <label style="padding: 8px 0px; font-weight:bold;">Sub-Category</label>
                                        <select class="form-control " name="sub_cat_id" id="subcategory-select">
                                        </select> -->
                                        <br>

                                        <div class="form-group" style="padding: 5px 1px;">
                                            <label for="exampleInputAdPrice"
                                                style="padding: 8px 0px; font-weight:bold;">Ad-Price</label>
                                            <input type="number" class="form-control" id="exampleInputAdPrice"
                                                name="ad_price" value="<?php echo  $row12['ad_price']; ?>" required>
                                        </div>
                                        <div class="form-group" style="padding: 5px 1px;">
                                            <label for="exampleInputAdPhone"
                                                style="padding: 8px 0px; font-weight:bold;">Ad-Phone</label>
                                            <input type="number" class="form-control" id="exampleInputAdPhone"
                                                name="ad_phone" value="<?php echo  $row12['ad_phone']; ?>" required>
                                        </div>
                                        <div class="form-group" style="padding: 5px 1px;">
                                            <label for="exampleInputAdLocation"
                                                style="padding: 8px 0px; font-weight:bold;">Ad-Location</label>
                                            <select class="form-control select2" name="ad_location"
                                                id="exampleInputAdLocation" required>
                                                <option value="">---Select Location---</option>
                                                <?php
                                                // Read data
                                                $sql = "SELECT * FROM locations ORDER BY location_id ASC";
                                                $result = $connection->query($sql);
                                                // output data of each row  
                                                while($loc_row = $result->fetch_assoc()) {  
                                                    $selected = ($loc_row['location_id'] == $row12['ad_location']) ? 'selected' : '';
                                                ?>
                                                <option value="<?php echo $loc_row['location_id']; ?>"
                                                    <?php echo $selected; ?>>
                                                    <?php echo $loc_row['location_title']; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group" style="padding: 10px 1px;">
                                            <label for="exampleInputAdFeatureImage"
                                                style="padding: 8px 0px; font-weight:bold;">Ad-Feature Image</label>
                                            <input type="file" class="form-control" id="exampleInputAdFeatureImage"
                                                accept="image/*" name="ad_feature_image">
                                            <img src="<?php echo  'igbtadmin/images/advertisement/' . $row12['ad_feature_image']; ?>"
                                                alt="Feature Image Preview" style="width: 40px; height: 40px;">
                                        </div>
                                        <div class="form-group" style="padding: 10px 1px;">
                                            <label for="exampleInputAdMultipleImage"
                                                style="padding: 8px 0px; font-weight:bold;">Ad-Multiple Image</label>
                                            <input type="file" name="multiple_images[]" multiple class="form-control"
                                                id="exampleInputAdMultipleImage" accept="image/*">

                                            <?php
                                            $res = $row12['multiple_images'];
                                            $res = explode(" ", $res);

                                            foreach ($res as $image) {
                                                $imagePath = 'igbtadmin/images/advertisement/' . $image;

                                                // Check if the image path is not empty and the file exists
                                                if (!empty($image) && file_exists($imagePath)) {
                                                    echo '<img src="' . $imagePath . '" height="40px" width="40px" />';
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="box-footer" style="padding: 15px 1px; margin-bottom: -40px;">
                                            <input type="hidden" name="ad_id" value="<?php echo  $row12['ad_id']; ?>">
                                            <button type="submit" name="update"
                                                class="btn btn-success btn-hover-animate d-flex align-items-center justify-content-center fw-bold">
                                                <div class="text">Save Post</div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>

                        </div>
                    </form>
                    <script>
                    function updateSubcategories() {
                        var cat_select = document.getElementById("category-select");
                        var subcat_select = document.getElementById("subcategory-select");

                        var cat_id = cat_select.options[cat_select.selectedIndex].value;

                        var url = 'subcategories.php?category_id=' + cat_id;

                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', url, true);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                subcat_select.innerHTML = xhr.responseText;
                                subcat_select.style.display = 'inline';
                            }
                        }
                        xhr.send();
                    }

                    var cat_select = document.getElementById("category-select");
                    cat_select.addEventListener("change", updateSubcategories);
                    </script>
                </div>
            </section>
        </main>
        <footer class="footer footer-bg-color">
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
<?php
        } else {
            echo "No ad found with the specified ad_id for the logged-in user.";
        }
    } else {
        echo "ad_id is not provided in the URL.";
    }
} else {
    header('Location: signin.php');
    exit();
}
ob_flush();
?>