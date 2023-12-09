<?php
session_start();
$category_id = $_SESSION['category_id'];
// echo $wishlist_name . "<br>" . $wishlist_id . "<br>" . $owner_id;


// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$sql = "DELETE FROM	item_category WHERE Category_id='$category_id'";


if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}


mysqli_close($con);
header("Location: view_category.php");
exit();
?>