<?php
session_start();
$owner_id = $_SESSION["Owner_id"];

$item_id = $_POST['item_number'];
$wishlist_id = $_POST['wishlist_id'];



// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql1 = "SELECT Basket_id FROM Basket Where User_id = '$owner_id'";
$result1 = mysqli_query($con, $sql1);
if (!$result1) {
    die('Error: ' . mysqli_error($con));
}

$all_categories = mysqli_fetch_all($result1, MYSQLI_ASSOC);
foreach ($all_categories as $row) {
    $basket_id = $row['Basket_id'];
}


$sql = "UPDATE item SET basket_id='$basket_id' WHERE item_number = '$item_id'";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
// header("Location: see_items.php");
echo '<script>window.history.back();</script>';
exit();
?>