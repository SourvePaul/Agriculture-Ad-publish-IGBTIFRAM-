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
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>News Page</title>
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

</head>

<body>
    <div class="wrapper">
        <?php include "header.php"; ?>
    </div>
</body>

</html>