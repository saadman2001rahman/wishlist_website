<?php

$webdomain = $POST["website_domain"];
$shipcost = $POST["shipping_cost"];
$coupons = $POST["coupons"];

// Create connection
$con=mysqli_connect("localhost","root","","wishlist_website");

// Check connection
if(!$con) {
    echo "Failed to connect: ". mysqli_connect_error();
}

$sql = "INSERT INTO website (Website_domain, Shipping_cost, Coupons) VALUES ('$webdomain', '$shipcost', '$coupons')";

if(!mysqli_query($con,$sql)) {
    die('Error: '. mysqli_error($con));
} else {
    echo "1 record added";
}

// Close connection
mysqli_close($con);

header("Location: main_page.php");

?>