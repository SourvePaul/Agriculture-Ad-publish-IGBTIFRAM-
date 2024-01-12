<div class="container__1620 sticky-top">
    <div class="fl-mobile-nav">
        <div id="dl-menu" class="dl-menuwrapper">
            <button class="dl-trigger">Open Menu</button>
            <ul class="dl-menu">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="about.#">About</a>
                </li>
                <li class="nav-item">
                    <a href="all_ads.php" class="menu-link main-menu-link item-title">All Ads</a>
                </li>
                <li>
                    <a href="news.php">News</a>
                </li>
                <li>
                    <a href="Contact.#">Contact Us</a>
                </li>
            </ul>
        </div>
        <?php
        if($isLoggedIn) { 
        ?>
        <a class="mobile-logo-img" href="#">
            <img src="img/png/logo.png" alt="logo" width="150" height="45">
        </a>
        <div class="m-login">
            <a href="#"><?php echo $username; ?></a>
        </div>
        <?php } else { ?>
        <a class="mobile-logo-img" href="signin.php">
            <img src="img/png/logo.png" alt="logo" width="150" height="45">
        </a>
        <div class="m-login">
            <a href="signin.php"><i class="icon-user icons"></i><span>LOGIN</span></a>
        </div>
        <?php } ?>
    </div>
    <header class="fl-header fl-header-single fl-header-type1">
        <div class="col-sm-3 col-md-2 col-xl-2">
            <div class="nav-logo d-flex align-items-center">
                <a class="logo-img" href="index.php">
                    <img src="img/png/logo.png" alt="logo" width="172" height="45">
                </a>
            </div>
        </div>
        <div class="col-sm-9 col-md-10 col-xl-10">
            <div
                class="link-reg d-flex flex-lg-no-wrap flex-wrap flex-lg-row flex-column align-items-right justify-content-sm-between justify-content-md-right justify-content-lg-right justify-content-end">
                <ul class="d-flex mb-xl-0 mb-4" style="color:#fff;">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li class="line__v">|</li>
                    <li>
                        <a href="all_ads.php">All Ads</a>
                    </li>
                    <li class="line__v">|</li>
                    <li>
                        <a href="news.php">News</a>
                    </li>

                    <?php
                    if($isLoggedIn) { 
                    ?>
                    <li class="line__v">|</li>
                    <!-- <li>
                        <a href="#"><i class="icon-user icons"></i> <?php echo $username; ?></a>
                    </li> -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="icon-user icons"></i> <?php echo $username; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <a class="dropdown-item" href="cPassword.php">Settings</a>
                            <?php
                            // Check if the user is a seller (replace this condition with your actual logic)
                            // Replace this with the actual user type check
                            if (isset($user_type) && ($user_type === 'seller' || $user_type === 'admin')) {
                                echo '<a class="dropdown-item" href="my_ads.php">My Ads</a>';
                            }
                            ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="main_logout.php">Logout</a>
                        </div>
                    </li>

                    <!-- <li class="line__v">|</li>
                    <li>
                        <a href="main_logout.php">Logout</a>
                    </li> -->
                    <?php } else { ?>
                    <li class="line__v">|</li>
                    <li>
                        <a href="signin.php"><i class="icon-user icons"></i>Sign in</a>
                    </li>
                    <li class="line__v">|</li>
                    <li>
                        <a href="signup.php"><i class="icon-notifications icons"></i>Registration</a>
                    </li>
                    <?php } ?>
                </ul>

                <button class="button_sell btn-lg float-right" type="submit"
                    style="background-color: #8a288f; width: 120px; border:none; margin: 26px 10px; height: 45px;color: #fff;">
                    <?php if ($isLoggedIn && isset($user_type) && ($user_type === 'seller' || $user_type === 'admin')) { ?>
                    <a href="postad.php" style="color:#fff; text-decoration:none;">Sell</a>
                    <?php } elseif ($isLoggedIn && isset($user_type) && $user_type === 'buyer') { ?>
                    <a onclick="showErrorMessage()" style="color:#fff; text-decoration:none;">Sell</a>
                    <script>
                    function showErrorMessage() {
                        alert("You are a buyer account. You need to be a seller account to post ads.");
                        // You can modify this to display the error message in a different way (e.g., using a modal)
                    }
                    </script>
                    <?php } else { ?>
                    <a href="postad.php" style="color:#fff; text-decoration:none;">Sell</a>
                    <?php } ?>
                </button>

            </div>
        </div>
    </header>
</div>