<?php
//Including Database configuration file.
include "db_connect.php";
//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
//Search box value assigning to $ad_title variable.
$ad_title = $_POST['search'];
//Search query.
    $Query = "SELECT ad_title, ad_id FROM ad_info WHERE ad_title LIKE '%$ad_title%' LIMIT 5";
//Query execution
   $ExecQuery = MySQLi_query($connection, $Query);
//Creating unordered list to display result.
   echo '
<ul>
   ';
   //Fetching result from database.
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
<!-- Creating unordered list items.
        Calling javascript function named as "fill" found in "script.js" file.
        By passing fetched result as parameter. -->
<li onclick='fill("<?php echo $Result['ad_title']; ?>")'>
    <div class="ad-title-box">
        <a href="add.php?ad_id=<?php echo $Result['ad_id']; ?>">
            <?php echo $Result['ad_title']; ?>
        </a>
    </div>
</li>
<!-- Below php code is just for closing parenthesis. Don't be confused. -->
<?php
}}
?>
</ul>