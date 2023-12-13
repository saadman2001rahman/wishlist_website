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

$sql = "UPDATE Wishlist SET wishlist_name=? WHERE wishlist_id =?";
$stmt = mysqli_prepare($con, $sql);

mysqli_stmt_bind_param($stmt, "si", $wishlist_name, $wishlist_id);

mysqli_stmt_execute($stmt);


$result = mysqli_stmt_get_result($stmt);

mysqli_stmt_close($stmt);


// if (!$result) {
//     die('Error: ' . mysqli_error($con));
// }

mysqli_close($con);
header("Location: see_items.php");
exit();
?>