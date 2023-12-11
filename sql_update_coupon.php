<?php
$coupon_id = $_POST['coupon_id'];
$coupon_val = $_POST['couponval'];
// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "UPDATE Coupons SET Value='$coupon_val' WHERE Coupon_id = '$coupon_id'";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header("Location: view_websites.php");
exit();
?>