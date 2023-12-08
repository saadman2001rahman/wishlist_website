<?php

$iname = $_POST["item_name"];
$ddate = $_POST["due_date"];
$link = $_POST["link"];
$description = $_POST["description"];
$icat = $_POST["item_category"];
$domain = $_POST["website_domain"];
$price = $_POST["price"];

// echo $iname; ??

// Create connection
$con=mysqli_connect("localhost","root","","wishlist_website");

// Check connection
if(!$con) {
    echo "Failed to connect: ". mysqli_connect_error();
}

$sql = "INSERT INTO item (Item_number, Name, Due_date, Link, Description, Item_category, Website_domain, Wishlist_id, Basket_id, Price)
    VALUES (rand(), '$iname', '$ddate', '$link', '$description', '$icat', '$domain', rand(), rand(), '$price')";

if(!mysqli_query($con,$sql)) {
    die('Error: '. mysqli_error($con));
} else {
    echo "1 record added";
}

// Close connection
mysqli_close($con);

header("Location: add_item.php");
?>
