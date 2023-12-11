<?php

$iname = $_POST["item_name"];
$price = $_POST["price"];
$icat = $_POST["item_category"];
$ddate = $_POST["due_date"];
$description = $_POST["description"];
$link = $_POST["link"];

$itemid = rand(0, 99999);
$caninsert = 0;

// $wishid = $_POST["wishlist_id"];
// $baskid = $_POST["basket_id"];

// Create connection
$con=mysqli_connect("localhost", "root" ,"" ,"wishlist_website");

// Check connection
if(!$con) {
    echo "Failed to connect: ". mysqli_connect_error();
}

function getDomainFromUrl($url) {
    $parsed_url = parse_url($url);

    // Check if the "host" key exists in the parsed URL array
    if (isset($parsed_url['host'])) {
        return $parsed_url['host'];
    }

    // If "host" is not present, the URL might be malformed or incomplete
    return false;
}

$domain = getDomainFromUrl($link);

if ($domain) {
    echo "Domain: " . $domain;
} else {
    echo "Invalid or incomplete URL.";
}

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

// May need to change wishlist id; basket id
$sql = "INSERT INTO item (Item_number, Item_name, Due_date, Link, Item_desc, Item_category, Website_domain, Wishlist_id, Basket_id, Price)
        VALUES ($itemid, '$iname', '$ddate', '$link', '$description', '$icat', '$domain', '10001', NULL, '$price')";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
} else {
    echo "1 record added";
}

// Close connection
mysqli_close($con);

header("Location: add_item.php");
?>