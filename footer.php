<?php
require_once('db_connect.php');
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
                            <a href="career.php">
                                Career
                            </a>
                        </li>
                        <li>
                            <a href="termsandcondition.php?type_info=terms">
                                Terms & Conditions
                            </a>
                        </li>
                        <li>
                            <a href="privacypolicy.php?type_info=privacy">
                                Privacy Policy
                            </a>
                        </li>
                        <li>
                            <a href="cookie.php?type_info=cookieP">
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
                            <a href="mailto:support@iGbetiFarm">support@igbetifarm.com</a>
                        </li>
                        <li>
                            <a href="mailto:info@igbetifarm.com">info@igbetifarm.com</a>
                        </li>
                        <li>
                            <a href="mailto:inquiry@igbetifarm.com">inquiry@igbetifarm.com</a>
                        </li>
                        <li>
                            <a href="safety_tips.php?type_info=tips">Safety tips</a>
                        </li>
                        <li>
                            <a href="contact_us.php?type_info=contact">Contact Us
                            </a>
                        </li>
                        <li>
                            <a href="FAQ.php?type_info=faq">FAQ
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-3 col-md-2 col-sm-3 ">
                <div class="footer-pad">
                    <h4 class="title">Our Apps</h4>
                    <ul class="px-0">
                        <li>
                            <a href="#">Our apps will be avaiable soon</a>
                        </li>
                    </ul>
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
                            <a href="brand.php?type_info=brand">Brand</a>
                        </li>
                        <li>
                            <a href="region.php?type_info=regions">Regions</a>
                        </li>
                        <li>
                            <a href="iGbetiFarm_africa.php?type_info=iGbetiFarm_africa">iGbetiFarm Africa
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


    <p>
        <?php
        $currentYear = date('Y');
        echo "Copyrights © $currentYear. All Rights Reserved.";
        ?>
    </p>

</div>