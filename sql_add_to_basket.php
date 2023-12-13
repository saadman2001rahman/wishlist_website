<?php
session_start();
$owner_id = $_SESSION["Owner_id"];

$item_id = $_POST['item_number'];
$wishlist_id = $_POST['wishlist_id'];
$_SESSION['basket_wishlist_id'] = $wishlist_id;



// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql1 = "SELECT Basket_id FROM Basket Where User_id = ?";
$stmt = mysqli_prepare($con, $sql1);

mysqli_stmt_bind_param($stmt, "s", $owner_id);

mysqli_stmt_execute($stmt);


$result1 = mysqli_stmt_get_result($stmt);


if (!$result1) {
    die('Error: ' . mysqli_error($con));
}

$all_categories = mysqli_fetch_all($result1, MYSQLI_ASSOC);
mysqli_stmt_close($stmt);

foreach ($all_categories as $row) {
    $basket_id = $row['Basket_id'];
    // $prevval = $row['Basket_Value'];
}


$sql = "UPDATE item SET Basket_id='$basket_id' WHERE Item_number = ?";

$stmt = mysqli_prepare($con, $sql);

mysqli_stmt_bind_param($stmt, "i", $item_id);

mysqli_stmt_execute($stmt);


$result = mysqli_stmt_get_result($stmt);

mysqli_stmt_close($stmt);

// if (!$result) {
//     die('Error: ' . mysqli_error($con));
// }

$sql = "SELECT Price FROM item WHERE item_number = ?";
$stmt = mysqli_prepare($con, $sql);

mysqli_stmt_bind_param($stmt, "i", $item_id);

mysqli_stmt_execute($stmt);


$result = mysqli_stmt_get_result($stmt);


if (!$result) {
    die('Error: ' . mysqli_error($con));
}
$all_categories = mysqli_fetch_all($result1, MYSQLI_ASSOC);
mysqli_stmt_close($stmt);

foreach ($all_categories as $row) {
    $itemprice = $row['Price'];
}



$sql = "UPDATE Basket SET Basket_Value=Basket_Value + '$itemprice' WHERE User_id = ?";
$stmt = mysqli_prepare($con, $sql);

mysqli_stmt_bind_param($stmt, "i", $owner_id);

mysqli_stmt_execute($stmt);


$result = mysqli_stmt_get_result($stmt);

mysqli_stmt_close($stmt);

mysqli_close($con);
header("Location: see_items.php");
exit();
?>