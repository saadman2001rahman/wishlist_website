<?php
$website_domain = $_POST['website_domain'];
$shipval = $_POST['shipval'];
// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "UPDATE website SET Shipping_cost='$shipval' WHERE Website_domain = '$website_domain'";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header("Location: view_websites.php");
exit();
?>