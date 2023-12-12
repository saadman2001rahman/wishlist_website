<?php
// session_start();
$wishlist_id = $_POST['wishlist_id'];
$admin = $_POST['admin'];
// echo $wishlist_name . "<br>" . $wishlist_id . "<br>" . $owner_id;


// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$sql = "DELETE FROM	WISHLIST WHERE Wishlist_id='$wishlist_id'";


if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}


mysqli_close($con);
if($admin != 'true') {
    header("Location: main_page.php");
} else {
    header("Location: all_wishlists.php");
}
exit();
?>