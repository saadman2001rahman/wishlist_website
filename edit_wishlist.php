<?php
session_start();
$wishlist_id = $_SESSION['add_item_to_this_wishlist'];
$wishlist_name = $_POST['dname'];

// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "UPDATE Wishlist SET wishlist_name='$wishlist_name' WHERE wishlist_id = '$wishlist_id'";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header("Location: see_items.php");
exit();
?>