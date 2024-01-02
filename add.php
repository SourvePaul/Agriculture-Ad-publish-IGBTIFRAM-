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

$ad_id = $_GET['ad_id'];
$sql = "SELECT ad_info.ad_id, ad_info.ad_title, ad_info.ad_description, ad_info.ad_phone, ad_info.ad_price, categories.cat_name, sub_categories.sub_cat_name, ad_info.ad_feature_image, ad_info.multiple_images, userinfo.user_email FROM ad_info
                                LEFT JOIN categories ON ad_info.cat_id = categories.cat_id
                                LEFT JOIN sub_categories ON ad_info.sub_cat_id = sub_categories.sub_cat_id
                                LEFT JOIN userinfo ON ad_info.user_id = userinfo.user_id
                                WHERE ad_info.ad_id = {$ad_id}";
                                    
$result = mysqli_query($connection, $sql) or die("Query failed from users.");
                    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ad Details Page</title>
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
    <style>
    .aside__hours-work ul {
        padding-left: 20px;
    }

    .aside__hours-work ul li::before {
        content: "\2022";
        /* Unicode character for bullet point */
        color: #42BC35;
        /* Color of the bullet point */
        font-size: 20px;
        /* Adjust the size of the bullet point */
        margin-right: 8px;
        /* Space between bullet point and text */
    }

    .aside__hours-work ul li {
        margin-bottom: 10px;
        line-height: 1.5;
        /* Adjust the spacing between lines */
    }
    </style>
</head>

<body>
    <div class="fl-gray-color ">
        <?php include "header.php"; ?>
    </div>
    <div class="py-75 listing-details">
        <div class="container">
            <div class="row">
                <?php 
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                       
                ?>
                <main class="main col-lg-4">
                    <section class="details-slider">
                        <h4 class="title mb-4"><?php echo $row['ad_title']; ?></h4>
                        <div class="slider__top">
                            <div>
                                <img src="igbtadmin/images/advertisement/<?php echo $row['ad_feature_image']; ?>"
                                    alt="<?php echo $row['ad_id']; ?>" style="width: 750px; height: 450px;" />
                            </div>

                            <?php 
                                $multipleImages = explode(' ', $row['multiple_images']); 
                                    foreach ($multipleImages as $image) {
                            ?>
                            <div>
                                <img src="igbtadmin/images/advertisement/<?php echo $image; ?>"
                                    alt="<?php echo $row['ad_id']; ?>" style="width: 750px; height: 450px;" />
                            </div>
                            <?php 
                                    }
                            ?>

                        </div>
                        <div class="slider__second">
                            <div class="me-3">
                                <img src="igbtadmin/images/advertisement/<?php echo $row['ad_feature_image']; ?>"
                                    alt="<?php echo $row['ad_id']; ?>" style="width: 192px; height: 128px;" />
                            </div>
                            <?php 
                                foreach ($multipleImages as $image) {
                            ?>
                            <div class="me-3">
                                <img src="igbtadmin/images/advertisement/<?php echo $image; ?>"
                                    alt="<?php echo $row['ad_id']; ?>" style="width: 192px; height: 128px;" />
                            </div>
                            <?php 
                                }
                            ?>
                        </div>
                    </section>
                    <div class="iteam-desc-gap">
                        <section class="details-content">
                            <div class="d-flex">

                                <h3 class="title">Main Features</h3>
                            </div>
                            <div class="row items items-features">
                                <div
                                    class="col-6 col-md-3 d-flex flex-column align-items-center justify-content-center item">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="40px" height="52px">
                                        <image x="0px" y="0px" width="40px" height="52px"
                                            xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAA0CAMAAADPNIq/AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAvVBMVEXeKSn////eKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSn////z04RfAAAAPXRSTlMAALCg3AdwMRClMGSQQBsG8vCUyMDY6SkgWvzNL1VXUGBWLtso2pMaYxbdxKwUAkEPS9DDNJwNHODSOKgORCrFtAAAAAFiS0dEAf8CLd4AAAAHdElNRQfmCBYJFR/8p8HTAAAA8klEQVRIx+XU1w6CMBSA4TJciANcOHHviQvHef/XUluiEqU9Go0X/pflC3SQEiIDKnKGijiVQsJLoimvwlCYV+QGo9x1hO9hTAsq7od64BwTT2FSS+GgDmmDpppJAcxkaTnIF/jQ8j5ZLJVxkJhQwcEq1HDQhvqvYAM7RxOan9lH72RakG+jzrrT7QnO+jpH0d/zj7AvD3DwsbfhUA5q5IfIu4fTW/ejJW5MIfKy7+uoiCjJ6/HJ4HLaE2sqhHQXFIh+H9r2jMxt2oILARyisa0yPvPGb62657B8cMnGVtLacTYe3LosH9yxsb10cN0j+tMnFfNu6ivRProAAAAASUVORK5CYII=" />
                                    </svg>
                                    <p class="text">Free Parking</p>
                                </div>
                                <div
                                    class="col-6 col-md-3 d-flex flex-column align-items-center justify-content-center item">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="32px" height="52px">
                                        <image x="0px" y="0px" width="32px" height="52px"
                                            xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAA0CAMAAADc48pLAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAABy1BMVEXeKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSn///+KBv27AAAAl3RSTlMAN9na96Wgpqgwyr61gK+wYKuqQKcqFeBwOAiH3UGk02Ej/r8DJ+XrAYxJmrMJ7gLQ78Dj8uxyH/Tq6RifzvrU9vkSbHEkOZy6+w8b/a1z3BwxDrshxk4WxVbw840Zl3tbo371BOIG/D3xUYQ/VR2ymL1rRSmuf6xNbiiWLh5ab8uhdXhUXE9lJY62uMTSw+3IV888LOdjlB+2nwAAAAFiS0dEmHbRBj4AAAAHdElNRQfmCBYKCwswepQoAAACEElEQVQ4y82U6VfTQBTFJwVai0IVlalSN4zgUjROi1IKseCC1eIuYgVR0C5aV1xQETdwwx31/rvOxCxtYwY+es/pu3OT35l5L80JUXyQyKeQmto6v6fqamsIAkSiAAiWBSUSQL2sh+UcWNEgUSMH/LIe/BwIrZRo1VJ6aFot0Zql9OAna62pmz0Aap0Y9gDC1tTrPABH61siNLBBAmxEZBOw2RPY0rpVJdva2rd7ATuwk9ddaK4Aonbq2B3Zw03b6+wQBWGI0fY4FerEPn5tP7qMlOimNAZGkj29MegHNK5UXz8HDoKKoOkpTevtSfIrh0APi+2OYEDY0fQxYcczg+YxJ3DylDnjaV7P6GdFOHceQ+azSfmSxuJC37Cwi2jLZrOXgBFzg1Fc/rsYwxVhVxFljHVlxu1JJphh165357ip8bTCLZjXCxYwXDTsBm4KKyFTvKXeDuFOzgLuwujxXt6wEdwvin++yb5Pwpjk9QEeGqleV0cfPR6Ych4mmcQTXp8Oloz0DNPV78RzawxDM5hxvTVxVhYKeOECXibKQhANLuAV+p2g4LULeIOCE2Yx5wLe4p0TxqG4gPf44ISP+Q4XoOrz9jo38Ym49ZnayyGMVd+dZiyBL8zUV3zjdb4c+P6Pr0JrJfBjoUwl/uusAljFkQs/yS8pkA0tArT8XgTgqgSm0o3VAM0TuULZ/wz4Ay0112dx3H+WAAAAAElFTkSuQmCC" />
                                    </svg>
                                    <p class="text">Credit Cards</p>
                                </div>
                                <div
                                    class="col-6 col-md-3 d-flex flex-column align-items-center justify-content-center item">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="59px" height="47px">
                                        <image x="0px" y="0px" width="59px" height="47px"
                                            xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADsAAAAvCAMAAABqvEIMAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAABj1BMVEXeKSn////eKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSn///9SxCBAAAAAg3RSTlMAAAF15MAbqvdgivzX0JwO3/FOFfIucrYKP6mmQkCgsDCzPO3wliQnLYSPpcyQh7hQS+DSfK9xrNVaYygQFHBVTZFH6GdmUsECnjor/bEE1KccjvPrQ+LvmxYm4f499KEy6ewR25QdSuq8GIzYRudlky8iB3v4OzOJXvbuXMn6+88DIRp5gdsAAAABYktHRAH/Ai3eAAAAB3RJTUUH5ggWCgwpqltDCwAAAkxJREFUSMfVlvlXEmEUhr8IbJmIKAqKEKKJWKKg3UBEcQFFQUFQQdDcFXdzwd33H3cWhuYMw+I5ZIfnl5d7v/McmHvnOwdCKlHcVQKqctl27z7wQKju/EVGJQ9BPVI/FirNE2jV6qeNuc8o3XNR+QJ6g6is7b7EK3FpxGvSsGtCu7g0w9IK7huTgPXG7lsI0Dd21e0C7+q5NouI93LPa7dIsZVcFUSo5VwaUlQl12EW4ZRzXWYpjn+xow9ugY+3uqNPHgFvy7zP/8tVfhb4cqs7asVZNep6KviKb+Urbmfd7x55CGSQzLkaxF3BD/wsX3EX67rc8jR5VjZ3h7j85W5r3K2NjOsz+bnsDHTxjWCA/7q2QJBvdAU6Oddv8kncbvA/tAc6vhFCL5d9CPENHXo4twPdErcfA2E2I8Agm0NRDHMHw4gOsTkIRNgMD6Bf4o7EEB8l/jEkkAyGFeMppDExSSYnmEyNK8LBJHMy5iejccRGpLOayiCbpJCedgI5LZCfmUX0dxSzM3lAmwOc02lQySwyU5VznnPE6PmFRUKW9KHlFWZiq2sFurC2ykxpZTmkXyJkcWGejjnmmrqjZrgGq720cKuGS43VxzfsVkMddx1a/sMGNrncxAbf0GK9jruF7DabOxTiXCMOaofN7Sy2arq7e/iD1D4hBwXkcGgghkMmCweE7KeYk73d6u5RAkUvs05lBjCbaBQLRdAm5vJnmD+neW8RiaOqbuDY6COKk9Oz84u+S3IVSSIZuSKXvRfnZ6cnCuIzHgfE7jU0kfdU3Su3pgAAAABJRU5ErkJggg==" />
                                    </svg>
                                    <p class="text">Swimming Pool</p>
                                </div>
                                <div
                                    class="col-6 col-md-3 d-flex flex-column align-items-center justify-content-center item">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="52px" height="48px">
                                        <image x="0px" y="0px" width="52px" height="48px"
                                            xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADQAAAAwCAMAAABpN6nPAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACuFBMVEXeKSn////eKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSneKSn///86ENZ+AAAA5nRSTlMAAAQ8fKzS7/zRqno4Azma8eLDsquz5O6WNEfE1oVDDA1FidvAPx+xpDYBOqj+GVjzJCq5TwKP7FCEBqfIHCPPnaW2Cl0HHkgXD76Kt5KgoxJkmMF9TswvVtg1UwhqIZEp1EQgC+oTGzAo9OcRon9JNxqVu1XH/SwrZbB13CKDW0zhlwXZjRj6ghXCmXRCbS69VNOIyWB4oZQOHdfpebxw68Xli/f1gJutaN87uNVRVy0lY87KZ+C0WZw9FK74RpC1CfLja2J7QBCfYTJ3nie69jNcblKOht4xhxa/8KlKPnNyjGyT0Kw2ZYgAAAABYktHRAH/Ai3eAAAAB3RJTUUH5ggWCg0JiC5SggAABA5JREFUSMeVlv1DU1Ucxs/AHOjGi8p7iiRhbI4NETAUyheMidqkUkG0CAFBStFEZ6ugkgGFitAyU7EaalSiVrOiorCXmUqztMLK3p+/o3vvuedyXybU88v5vn3uued7zj0bISqFhE64baI+DGH68EmTDUZ1mug4qUIRkVEAoqdMnRYzJZaz4uITxoMSk4Dbp89IFt2ZKXfMAlLvHAtKm42wu9KVzzWZ51gwKeOWkNWG2ZlEq7lZ0M8LDmXnIHc+CS6rHnebgkB5C7Awn9xKBffgXqMGMi3C4iWyqvSlhcvuKxr17csRqYGKsSKPFRhXriL3w2HF6pCSUBYsfAAPqqCHsIbNs3YdWVhKytaXp23YaMDD5BE2V4XlUQVUFKevFHObqnLLq6VFr63ZbJku2rV1W+rl0GOwio97PHvrNkULNmaZjQ3UXI3tMmgbdoglJXhC27rtOWKzdjbuGoViLLtpB+x2p0kLpbBmGzBHgnZjDw0+6XqKjKkdYZUMKoZ4Ip8uTVaXmeKfkXlNfNsFyBTbTN8pg+RpmGel5fJ6rup5EdqFvUKkxd0q5graWNVKtLP9s5fYCXkBlRz0YgfZhyYhuv9AJ03Xxx50UKsL3XbGb+BtK14iOg+6ycuoV70Uq5UzhBxC9yuHcYh48Gob2XmE9ts1WUUdBZuRrW/5krpjPXDl68jx14RYzetvjBbwa/HgYJviBXiqoopndMQ7VbshXN6F0jZttFdgdAQLhEjtic3yfCSX1T7rJLz5QstxSgh04E153lgc7Ds25qTRfYrKEvxqs4P8JwlQXzh1Mt/6H9DbXnqK3tkStObw6f4zcn9uJg/l4KzgOc9p722SsYe7mvFumRQo877HQ514n/p5Bg3T4sP5cx986PZ+xPqXhDU8NGD5mAbOu5epoVPYxw/m3uZCGuiHLVX4nlI/oSfs00G7imnAZ9Q4Kl4Dn/uGLlDIiS/Eooh+JTQfX1LjLIqF8St4fBRK1rtC6KKa65RztXw9QA0/Lgq+ra9chEgrvqG5hA7TpaB9n4fL/HCFe0sGOXKPsBkmNK4Pwpijcqu54ZKlnUgQt6qLYnr4W3/6umwVczrgTuHHdstVGZR9DN9JJQdQMLx1k4z5vtGWyI/XsIrIINJSFZBOXoaTXEdZaDzzf4BvPz8W/ljXoIBIRCDup9Fnn+lJNnhEewRJNwTjMrr8nKKT/H7WgSZ3lPJHXJQTP9NLrGgIkn5h2cSAu0d7kdfYLjiolTJINRQ7ODgi5RP6sEJzl8fjmioiWxOv+l/h7RpQVMzsDTeNDRFycxYCV36TbVMnfifjQSRk6UTg+LQ/btbWlPP+dQyPD3G6urdC6NAJ3olBtI/qzzEhTjdm/DXyt/Dv5eQ/TK0K6F9gBnQ3NRT/CwAAAABJRU5ErkJggg==" />
                                    </svg>
                                    <p class="text">24 Hrs Service</p>
                                </div>
                            </div>
                        </section>
                        <section class="details-brief ">
                            <div class="d-flex">
                                <h3 class="title">Brief Description</h3>
                            </div>
                            <p>
                                <?php echo $row['ad_description']; ?>
                            </p>
                        </section>
                        <!-- <section class="details-intro_video ">
                            <div class="d-flex ">

                                <h3 class="title">Intro Video</h3>
                            </div>
                            <div class="box-video">
                                <img src="img/listing-details-video.jpg" alt="video" width="100%" height="410" />
                                <a href="https://youtu.be/04a6gBeftbY" data-lity><svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="42px" height="48px">
                                        <image x="0px" y="0px" width="42px" height="48px"
                                            xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAwCAQAAADNhyAtAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfmCBYMMySIuWk4AAAA/klEQVRIx82XUQ2DQBBElypAAhKQUBxQB5VQCThAQiVUQnGAhJNwdfD6wQdNC+HgZpOugBduws7OmBklHQGIdKYZSkbmCbQK6J3veVLlQiNL01HmQNcmcNVDJyFqPRSgPyDEJhTibiESoAAjZz0U4J4sxA4oRG56KEBIEGI3FOCxsXOHoFvmcxA6CdHqobBmPplQWDIfAfTXfCTQSYhaD4XZfKRQiLRmBSTuc/o0HtDBA2onPdIH6vL8Rv2lL7sUw5///PI1dTAUufXJTVp+ThwOn/xEy8OEQ+yRBzR5lHQIvfJ4Li8SWZUnLiIzy1m/8OgqA2jmVHg/qnlQVfM3neSAGeWrR5UAAAAASUVORK5CYII=" />
                                    </svg>
                                </a>
                            </div>
                        </section> -->
                        <!-- <section class="details-map ">
                            <div class="d-flex ">

                                <h3 class="title">Location Map</h3>
                            </div>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.2372677346916!2d-74.00528968027614!3d40.71279302464964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a221b4ee537%3A0x155f8f5f09ba17e7!2s52%20Chambers%20St%2C%20New%20York%2C%20NY%2010007%2C%20USA!5e0!3m2!1sen!2sua!4v1661154477968!5m2!1sen!2sua"
                                width="100%" id="map-canvas" height="410" style="border: 0" Zoom="false"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </section> -->

                    </div>

                    <div class="comment-gap">

                        <div class="post-comments">
                            <div class="d-flex">

                                <h3 class="title">Post Comments</h3>
                            </div>
                            <ol class="comment-list">
                                <li class="comment  mb-5">
                                    <article class="comment-body">
                                        <div class="comment-meta mb-4">
                                            <div class="d-flex">
                                                <div class="comment-author vcard">
                                                    <img alt="Аватар Rimma" src="img/customers-4.jpg"
                                                        class="avatar photo avatar-default rounded-circle"
                                                        loading="lazy" width="60" height="60">
                                                </div>
                                                <div class="comment-metadata">
                                                    <div class="d-flex">
                                                        <a href="#" class="fl-commnet-name">Linus William </a>
                                                    </div>

                                                    <div class="day">1 day Ago</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="comment-content">
                                            <p>
                                                It was indeed very good and fantastic to dine here and
                                                stay. The atmosphere was electrifying. Prices was also
                                                very reasonable and service was awesome, will love to
                                                come back.
                                            </p>
                                        </div>
                                        <!-- .comment-content -->
                                    </article>
                                    <!-- .comment-body -->
                                </li>
                                <li class="comment  comment-odd mb-5">
                                    <article class="comment-body">
                                        <div class="comment-meta mb-4">
                                            <div class="d-flex">
                                                <div class="comment-author vcard">
                                                    <img alt="Аватар Rimma" src="img/customers-5.jpg"
                                                        class="avatar photo avatar-default rounded-circle"
                                                        loading="lazy" width="60" height="60">
                                                </div>
                                                <div class="comment-metadata">
                                                    <div class="d-flex">
                                                        <a href="#" class="fl-commnet-name">Ameda Hilson </a>
                                                    </div>

                                                    <div class="day">1 day Ago</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="comment-content">
                                            <p>
                                                It was indeed very good and fantastic to dine here and
                                                stay. The atmosphere was electrifying. Prices was also
                                                very reasonable and service was awesome, will love to
                                                come back.
                                            </p>
                                        </div>
                                        <!-- .comment-content -->
                                    </article>
                                    <!-- .comment-body -->
                                </li>
                                <li class="comment  mb-5">
                                    <article class="comment-body">
                                        <div class="comment-meta mb-4">
                                            <div class="d-flex">
                                                <div class="comment-author vcard">
                                                    <img alt="Аватар Rimma" src="img/customers-4.jpg"
                                                        class="avatar photo avatar-default rounded-circle"
                                                        loading="lazy" width="60" height="60">
                                                </div>
                                                <div class="comment-metadata">
                                                    <div class="d-flex">
                                                        <a href="#" class="fl-commnet-name">Linus William </a>
                                                    </div>

                                                    <div class="day">1 day Ago</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="comment-content">
                                            <p>
                                                It was indeed very good and fantastic to dine here and
                                                stay. The atmosphere was electrifying. Prices was also
                                                very reasonable and service was awesome, will love to
                                                come back.
                                            </p>
                                        </div>
                                        <!-- .comment-content -->
                                    </article>
                                    <!-- .comment-body -->
                                </li>

                            </ol>
                            <div class="form-comment">
                                <div class="d-flex">
                                    <h3 class="title">Leave a Comment</h3>
                                </div>
                                <form action="#" class="w-100">

                                    <div class="d-flex flex-column">
                                        <input type="text" placeholder="Your Name * ">
                                        <input type="email" name="" id="" placeholder="Your Email * ">

                                    </div>

                                    <textarea class="w-100" name="" placeholder="Write your review... " id=""
                                        rows="5"></textarea>

                                    <div class="d-flex align-items-center mb-5">
                                        <input type="radio" name="" id="save">
                                        <label for="save">Save my name and email details for future use
                                        </label>
                                    </div>

                                    <button
                                        class="link__template btn-hover-animate d-flex align-items-center justify-content-center">
                                        <div class="text">Send comment</div>
                                        <span class="btn-icon-span">
                                            <i class="fa fa-chevron-right fa-first"></i>
                                            <i class="fa  fa-paper-plane fa-second"></i>
                                        </span>
                                    </button>



                                </form>
                            </div>
                        </div>

                    </div>


                </main>
                <aside class="aside col-lg-4">
                    <div class="aside-sticky">
                        <div class="aside__author">
                            <h4 class="title">&#x20A6; <?php echo $row['ad_price']; ?></h4>
                            <div class="d-flex mb-4">
                                <!--<img src="img/listing-details-2.jpg" width="105" height="105" alt="author" class="me-3" />-->
                                <div class="text d-flex justify-content-center flex-column gap-2 col-12">
                                    <button type="button" class="btn btn-outline-success" width="100%">View price
                                        history</button>
                                    <a type="button" class="btn btn-outline-success"
                                        href=" tel: <?php echo $row['ad_phone']; ?>"
                                        style="color: #198754; font-size: 1rem; background-color: white; transition: backgroundColor 0.3s;"
                                        onmouseover="this.style.backgroundColor='#198754';this.style.color='#fff'"
                                        onmouseout="this.style.backgroundColor='white';this.style.color='#198754'">Request
                                        call back</a>

                                    <a type="button" class="btn btn-outline-success"
                                        href=" mailto: <?php echo $row['user_email']; ?>"
                                        style="color: #198754; font-size: 1rem; background-color: white; transition: backgroundColor 0.3s;"
                                        onmouseover="this.style.backgroundColor='#198754';this.style.color='#fff'"
                                        onmouseout="this.style.backgroundColor='white';this.style.color='#198754'">Email
                                        to this seller</a>

                                </div>
                            </div>
                        </div>
                        <div class="aside__hours-work">
                            <h4 class="title">Safety tips</h4>
                            <ul>
                                <li>
                                    Remember, don't send any pre-payments
                                </li>
                                <li>
                                    Meet the seller at a safe public place
                                </li>
                                <li>
                                    Inspect the goods to make sure they meet your needs
                                </li>
                                <li>
                                    Check all documentation and only pay if you're satisfied
                                </li>
                            </ul>
                        </div>
                    </div>
                </aside>
                <?php 
                            }
                        }else {
                            echo "<h3>NO Records Found!..</h3>";
                        }
                    ?>
            </div>
        </div>
    </div>

    <footer class="footer">
        <?php include "footer.php"; ?>
    </footer>

    </div>

    <!--Left MENU-->
    <div class="left__menu">
        <div class="offcanvas offcanvas-start" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrollingLeftMenu"
            aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-body">
                <ul>
                    <li>
                        <a href="index.php">
                            <span class="icon_left_menu"><i class="fa-solid fa-house"></i></span>
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span class="icon_left_menu"><i class="fa-sharp fa-solid fa-people-group"></i></span>
                            About Us
                        </a>
                    </li>

                    <li class="active-link">
                        <a href="#">
                            <span class="icon_left_menu"><i class="fa-solid fa-list"></i></span>
                            Listings
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon_left_menu"><i class="fa-solid fa-newspaper"></i></span>
                            Our News
                        </a>
                    </li>



                    <li>
                        <a href="contact.html">
                            <span class="icon_left_menu"><i class="fa fa-wrench" aria-hidden="true"></i></span>
                            Contact
                        </a>
                    </li>


                </ul>
                <div class="box__banner">
                    <h5 class="title">Upgrade to PRO</h5>
                    <p class="text">
                        Unlock some more benefits from Alistia and have good chances of
                        big sales
                    </p>
                    <a href="#" class="link__template d-flex align-items-center justify-content-center">
                        <div class="text">get started</div>
                        <span class="d-flex align-items-center justify-content-center">
                            <i class="fa  fa-paper-plane fa-second"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="assest/jquery.js"></script>
    <script src="assest/jquery-migrate-1.2.1.js"></script>
    <script src="assest/uikit.min.js"></script>
    <script src="assest/slick.min.js"></script>
    <script src="assest/modernizr.custom.js"></script>
    <script src="assest/jquery.dlmenu.js"></script>
    <script src="assest/bootstrap.js"></script>
    <script src="assest/slider.js"></script>
    <script src="assest/custom.js"></script>
</body>

</html>