<?php
$item_id = $_POST['item_number'];
$wishlist_id = $_POST['wishlist_id'];



// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "UPDATE item SET basket_id='10' WHERE item_number = '$item_id'";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
// header("Location: see_items.php");
echo '<script>window.history.back();</script>';
exit();
?>