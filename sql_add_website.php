<?php
session_start();
// $coupons = $POST["coupons"];

if (isset($_GET["domain"])) {
    // Supposed to receive domain from sql_add_item
    $webdomain = $_GET["domain"];
    $shipcost = 0;
} else {
    $webdomain = $_POST["domain"];
    $shipcost = $_POST["cost"];

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



if (isset($_GET["domain"])) {
    $iname = $_SESSION['add_name'];
    $price = $_SESSION['add_price'];
    $icat = $_SESSION['add_cat'];
    $ddate = $_SESSION['add_ddate'];
    $description = $_SESSION['add_desc'];
    $link = $_SESSION['add_link'];
    $wishlist_id = $_SESSION['add_wishlist_id'];
    $itemid = $_SESSION['add_item_id'];

    //insert item details
    $sql = "INSERT INTO item (Item_number, Item_name, Due_date, Link, Item_desc, Item_category, Website_domain, Wishlist_id, Basket_id, Price)
        VALUES ($itemid, '$iname', '$ddate', '$link', '$description', '$icat', '$webdomain', '$wishlist_id', NULL, '$price')";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    } else {
        echo "1 record added";
    }
    mysqli_close($con);

    header("Location: see_items.php");
} else {
    mysqli_close($con);

    header("Location: view_websites.php");
}
exit();
?>