<?php
// session_start();
$iten_number = $_POST['item_number'];
// echo $wishlist_name . "<br>" . $wishlist_id . "<br>" . $owner_id;


// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$sql = "UPDATE ITEM SET Basket_id=null  WHERE Item_number='$iten_number'";


if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}


mysqli_close($con);
header("Location: view_basket.php");
exit();
?>