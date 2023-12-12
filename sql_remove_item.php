<?php

session_start();
$itemid = $_SESSION['item_id'];

// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "DELETE FROM	ITEM WHERE Item_number='$itemid'";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header("Location: see_items.php");
exit();
?>