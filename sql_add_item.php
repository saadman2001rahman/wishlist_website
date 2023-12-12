<?php
session_start();
$wishlist_id = $_SESSION['add_item_to_this_wishlist'];
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

echo $iname. "<br>". $price. "<br>". $icat. "<br>". $ddate. "<br>". $description. "<br>". $link. "<br>";

// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect: " . mysqli_connect_error();
}

// Get domain from url
$domain = parse_url($link)['host'];
echo $domain. "<br>";

$sql_check_domain = "SELECT * FROM website WHERE Website_domain='$domain'";

// Check if domain is in database
$result = $con->query($sql_check_domain);
if($result->num_rows > 0) {
    echo "Domain exists.";
} else {
    // If not in database, add it
    echo "Domain does not exist.";
    header("Location: sql_add_website.php?domain=".urlencode($domain));
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
        VALUES ($itemid, '$iname', '$ddate', '$link', '$description', '$icat', '$domain', '$wishlist_id', NULL, '$price')";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
} else {
    echo "1 record added";
}

// Close connection
mysqli_close($con);

header("Location: view_items.php");
?>