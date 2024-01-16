<?php
require_once('db_connect.php');
ob_start();
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
</head>

<body>
    <!-- Loader-->
    <div id="page-preloader"><span class="spinner border-t_second_b border-t_prim_a"></span></div>
    <!-- Loader end-->
    <div class="wrapper">
        <?php include "header.php"; ?>
        <main class="main">

            <section class="">
                <div class="container mt-5">
                    <div class="row gx-0">
                        <main class="main col-xl-12">
                            <section class="">
                                <div class="container ">

                                    <div class="row">



                                        <p>
                                            <?php
                                                        // Perform a query to count the number of ads in ad_info
                                                        $countQuery = "SELECT COUNT(*) AS ad_count FROM ad_info";
                                                        $countResult = $connection->query($countQuery);

                                                        if ($countResult) {
                                                            $adCount = $countResult->fetch_assoc()['ad_count'];
                                                            echo '<p>All Nigeria • ' . $adCount . ' Ads</p>';
                                                        } else {
                                                            echo '<p>All Nigeria 0 Ads</p>';
                                                        }
                                                        ?>
                                        </p>
                                        <br>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Location</th>
                                                    <th>Ad</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                  $sql = "SELECT * FROM locations";  
                 // $total_amount = 0;
                  $result = $connection->query($sql);
                  while($row = $result->fetch_assoc())  {  
                       $location_id  = $row['location_id'];
                      ?>
                                                <tr>
                                                    <td><a
                                                            href="index.php?location_id=<?php echo  $location_id; ?>"><?php echo $row['location_title']; ?></a>
                                                    </td>
                                                    <td>
                                                        <?php
              $sql2 = "SELECT * FROM ad_info where ad_location='$location_id'";  
                  $adcount = 0;
                  $result2 = $connection->query($sql2);
                  while($row2 = $result2->fetch_assoc())  { 
                      $adcount = $adcount+1;
                  }
                 echo $adcount;
            ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>




                                    </div>
                                </div>

                            </section>
                        </main>
                    </div>


                </div>

            </section>





        </main>
        <footer class="footer footer-bg-color mt-5">
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