<?php
session_start();
$wishlist_id = $_SESSION['wishlist_id'];
// echo $wishlist_name . "<br>" . $wishlist_id . "<br>" . $owner_id;


// Create connection
$con = mysqli_connect("localhost", "saadman", "123456", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$sql = "DELETE FROM	WISHLIST WHERE Wishlist_id='$wishlist_id'";


if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}


mysqli_close($con);
header("Location: main_page.php");
exit();
?>