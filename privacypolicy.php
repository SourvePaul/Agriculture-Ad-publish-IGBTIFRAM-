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
    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $user_email = $row['user_email'];
    $fullname = $row['fullname'];
    $user_type = $row['user_type']; // Define the user_type variable from database
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Privacy Policy</title>
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
            <div class="container__1620">
                <div id="main-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-xl-12">
                                <div class="post-container">

    <strong>Privacy Policy</strong> <p>
                  igbetifarm built the igbetifarm.com app as
                  a Free app. This SERVICE is provided by
                  igbetifarm at no cost and is intended for use as
                  is.
                </p> <p>
                  This page is used to inform visitors regarding our
                  policies with the collection, use, and disclosure of Personal
                  Information if anyone decided to use our Service.
                </p> <p>
                  If you choose to use our Service, then you agree to
                  the collection and use of information in relation to this
                  policy. The Personal Information that we collect is
                  used for providing and improving the Service. We will not use or share your information with
                  anyone except as described in this Privacy Policy.
                </p> <p>
                  The terms used in this Privacy Policy have the same meanings
                  as in our Terms and Conditions, which are accessible at
                  igbetifarm.com unless otherwise defined in this Privacy Policy.
                </p> <p><strong>Information Collection and Use</strong></p> <p>
                  For a better experience, while using our Service, we
                  may require you to provide us with certain personally
                  identifiable information. The information that
                  we request will be retained by us and used as described in this privacy policy.
                </p> <div><p>
                    The app does use third-party services that may collect
                    information used to identify you.
                  </p> <p>
                    Link to the privacy policy of third-party service providers used
                    by the app
                  </p> <ul><li><a href="https://www.google.com/policies/privacy/" target="_blank" rel="noopener noreferrer">Google Play Services</a></li><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----></ul></div> <p><strong>Log Data</strong></p> <p>
                  We want to inform you that whenever you
                  use our Service, in a case of an error in the app
                  we collect data and information (through third-party
                  products) on your phone called Log Data. This Log Data may
                  include information such as your device Internet Protocol
                  (“IP”) address, device name, operating system version, the
                  configuration of the app when utilizing our Service,
                  the time and date of your use of the Service, and other
                  statistics.
                </p> <p><strong>Cookies</strong></p> <p>
                  Cookies are files with a small amount of data that are
                  commonly used as anonymous unique identifiers. These are sent
                  to your browser from the websites that you visit and are
                  stored on your device's internal memory.
                </p> <p>
                  This Service does not use these “cookies” explicitly. However,
                  the app may use third-party code and libraries that use
                  “cookies” to collect information and improve their services.
                  You have the option to either accept or refuse these cookies
                  and know when a cookie is being sent to your device. If you
                  choose to refuse our cookies, you may not be able to use some
                  portions of this Service.
                </p> <p><strong>Service Providers</strong></p> <p>
                  We may employ third-party companies and
                  individuals due to the following reasons:
                </p> <ul><li>To facilitate our Service;</li> <li>To provide the Service on our behalf;</li> <li>To perform Service-related services; or</li> <li>To assist us in analyzing how our Service is used.</li></ul> <p>
                  We want to inform users of this Service
                  that these third parties have access to their Personal
                  Information. The reason is to perform the tasks assigned to
                  them on our behalf. However, they are obligated not to
                  disclose or use the information for any other purpose.
                </p> <p><strong>Security</strong></p> <p>
                  We value your trust in providing us your
                  Personal Information, thus we are striving to use commercially
                  acceptable means of protecting it. But remember that no method
                  of transmission over the internet, or method of electronic
                  storage is 100% secure and reliable, and we cannot
                  guarantee its absolute security.
                </p> <p><strong>Links to Other Sites</strong></p> <p>
                  This Service may contain links to other sites. If you click on
                  a third-party link, you will be directed to that site. Note
                  that these external sites are not operated by us.
                  Therefore, we strongly advise you to review the
                  Privacy Policy of these websites. We have
                  no control over and assume no responsibility for the content,
                  privacy policies, or practices of any third-party sites or
                  services.
                </p> <p><strong>Children’s Privacy</strong></p> <div><p>
                    These Services do not address anyone under the age of 13.
                    We do not knowingly collect personally
                    identifiable information from children under 13 years of age. In the case
                    we discover that a child under 13 has provided
                    us with personal information, we immediately
                    delete this from our servers. If you are a parent or guardian
                    and you are aware that your child has provided us with
                    personal information, please contact us so that
                    we will be able to do the necessary actions.
                  </p></div> <!----> <p><strong>Changes to This Privacy Policy</strong></p> <p>
                  We may update our Privacy Policy from
                  time to time. Thus, you are advised to review this page
                  periodically for any changes. We will
                  notify you of any changes by posting the new Privacy Policy on
                  this page.
                </p> <p>This policy is effective as of 2024-01-12</p> <p><strong>Contact Us</strong></p> <p>
                  If you have any questions or suggestions about our
                  Privacy Policy, do not hesitate to contact us at info@igbetifarm.com.
   
      
                               </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </main>

        <footer class="footer">
            <?php include "footer.php"; ?>
        </footer>
    </div>
</body>

</html>