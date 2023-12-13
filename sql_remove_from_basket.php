<?php
session_start();
$owner_id = $_SESSION["Owner_id"];
$iten_number = $_POST['item_number'];
$item_price = $_POST['item_price'];
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

$sql = "UPDATE Basket SET Basket_value=Basket_value - '$item_price'  WHERE User_id='$owner_id'";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}



mysqli_close($con);
header("Location: view_basket.php");
exit();
?>