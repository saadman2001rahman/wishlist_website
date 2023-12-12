<?php

$webdomain = $_POST["domain"];
$shipcost = $_POST["cost"];
// $coupons = $POST["coupons"];

if (isset($_GET["domain"])) {
    // Supposed to receive domain from sql_add_item
    $webdomain = $_GET["domain"];
}

// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect: " . mysqli_connect_error();
}

$caninsert = 0;
$tryid = rand(0, 9999999);
while ($caninsert == 0) {
    // $tryid = rand(0, 99999999);
    $result = mysqli_query($con, "SELECT Coupon_id FROM Coupons WHERE Coupon_id = '$tryid'");
    if ($result !== false) {
        if (mysqli_num_rows($result) == 0) {
            $caninsert = 1;
        } else {
            $tryid = rand(0, 9999999);
        }
    } else {
        echo 'Error in query: ' . mysqli_error($con);
        die();
    }
}

$sql = "INSERT INTO Coupons (Coupon_id, Value) VALUES ('$tryid', '0')";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}



$sql = "INSERT INTO website (Website_domain, Shipping_cost, Coupons) VALUES ('$webdomain', '$shipcost', '$tryid')";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}


mysqli_close($con);

if (empty($_SESSION['headerforwebsite'])) {
    header("Location: view_websites.php");
} else {
    header("Location: see_items.php");
}
exit();
?>