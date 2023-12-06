<?php
// function make_query($connection) {
$sql = "SELECT * FROM footer_image WHERE f_status = 0 LIMIT 1";  
// $result = mysqli_query($connection,$sql);
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo '<img src="igbtadmin/images/footer/' . $row['footer_top_image'] . '" alt="footer_image" width="100%" height="200px" style="margin-top: 3px;">';
} else {
    // Handle case when no active image is found
    echo '<img src="img/f.png" alt="logo" width="100%" height="200px" style="margin-top: 3px;">';
}
// } 
?>

<div class="footer-middle" style="margin-bottom: -43px;">
    <div class="container">
        <div class="row">
            <div class="col-3 col-md-3 col-sm-3 ">
                <div class="footer-pad">
                    <h4 class="title"> About Us</h4>
                    <!-- <div class="d-flex flex-wrap flex-lg-column justify-content-between"> -->
                    <ul class="mb-5 px-0">
                        <li>
                            <a href="#">
                                About iGbetiFarm
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Career
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Terms & Conditions
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Privacy Policy
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Cookie Policy
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Copyright Infringement Policy
                            </a>
                        </li>
                    </ul>
                    <!-- </div> -->
                </div>
            </div>
            <div class="col-3 col-md-2 col-sm-3 ">
                <div class="footer-pad">
                    <h4 class="title">Support</h4>
                    <ul class="px-0">
                        <li>
                            <a href="#">support@iGbetiFarm</a>
                        </li>
                        <li>
                            <a href="#">Safety tips</a>
                        </li>
                        <li>
                            <a href="#">Contact Us
                            </a>
                        </li>
                        <li>
                            <a href="#">FAQ
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-3 col-md-2 col-sm-3 ">
                <div class="footer-pad">
                    <h4 class="title">Our Apps</h4>
                    <a href="#"><img src="img/app-store-google-play-logo.png" class="img" alt="list-small"
                            width="100%"></a>
                </div>
            </div>
            <div class="col-3 col-md-3 col-sm-3 ">
                <div class="footer-pad">
                    <h4 class="title">Our resources</h4>
                    <ul class="px-0">
                        <li>
                            <a href="#">Our blog</a>
                        </li>
                        <li>
                            <a href="#">iGbetiFarm on FB</a>
                        </li>
                        <li>
                            <a href="#">Our instagram
                            </a>
                        </li>
                        <li>
                            <a href="#">Our YouTube
                            </a>
                        </li>
                        <li>
                            <a href="#">Our Twitter
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-3 col-md-2 col-sm-3 ">
                <div class="footer-pad">
                    <h4 class="title">Hot links</h4>
                    <ul class="px-0">
                        <li>
                            <a href="#">Brand</a>
                        </li>
                        <li>
                            <a href="#">Regions</a>
                        </li>
                        <li>
                            <a href="#">iGbetiFarm Africa
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<hr style="height: 2px;
    margin-left: 20%;
    width: 60%;">
<div class="footer-bottom d-flex mx-0 align-items-center justify-content-center">
    <p>Copyrights © 2023. All Rights Reserved.</p>
    <ul class="px-0 d-flex flex-wrap align-items-lg-center justify-content-center">
        <li>
            <a href="#">Terms & Conditions</a>
        </li>
        <li>
            <a href="#">\ </a>
        </li>
        <li>
            <a href="#">FAQ’s </a>
        </li>
        <li>
            <a href="#">\</a>
        </li>
        <li>
            <a href="#">Privacy Policy</a>
        </li>
        <li>
            <a href="#">\</a>
        </li>
        <li>
            <a href="#">Sitemap</a>
        </li>
    </ul>
</div>