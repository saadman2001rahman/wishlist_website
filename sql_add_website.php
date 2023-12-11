<?php

$webdomain = $_POST["domain"];
$shipcost = $_POST["cost"];
// $coupons = $POST["coupons"];

// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect: " . mysqli_connect_error();
}

$sql = "INSERT INTO website (Website_domain, Shipping_cost, Coupons) VALUES ('$webdomain', '$shipcost', '1234')";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}


mysqli_close($con);

header("Location: view_websites.php");
exit();
?>