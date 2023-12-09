<?php

$iname = $_POST["item_name"];
$price = $_POST["price"];
$icat = $_POST["item_category"];
$ddate = $_POST["due_date"];
$description = $_POST["description"];
$link = $_POST["link"];

$itemid = rand(0, 99999);
$caninsert = 0;

// $domain = $_POST["website_domain"];
// $wishid = $_POST["wishlist_id"];
// $baskid = $_POST["basket_id"];

// echo $iname; ??

while ($caninsert == 0) {
    $result = mysqli_query($con, "SELECT Item_number FROM item WHERE Item_number = '$itemid'");
    if ($result !== false) {
        if (mysqli_num_rows($result) == 0) {
            $caninsert = 1;
        } else {
            $itemid = rand(0, 9999999);
        }
    } else {
        echo 'Error in query: ' . mysqli_error($con);
        die();
    }
}

// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect: " . mysqli_connect_error();
}

// May need to change item category; website domain; wishlist id; basket id
$sql = "INSERT INTO item (Item_number, Name, Due_date, Link, Description, Item_category, Website_domain, Wishlist_id, Basket_id, Price)
        VALUES ($itemid, '$iname', '$ddate', '$link', '$description', '$icat', NULL, '10001', NULL, '$price')";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
} else {
    echo "1 record added";
}

// Close connection
mysqli_close($con);

header("Location: add_item.php");
?>