<?php
session_start();
$website_domain = $_POST['website_domain'];
// echo $wishlist_name . "<br>" . $wishlist_id . "<br>" . $owner_id;


// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$sql = "DELETE FROM	website WHERE website_domain='$website_domain'";


if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}


mysqli_close($con);
header("Location: view_websites.php");
exit();
?>