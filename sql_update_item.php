<?php

//not done
$itemno = $_POST["item_number"];
$iname = $_POST["item_name"];
$ddate = $_POST["due_date"];
$description = $_POST["description"];
$icategory = $_POST["item_category"];
$price = $_POST["price"];

// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect: " . mysqli_connect_error();
}

// not done
$sql = "UPDATE item 
        SET Item_name=?, Due_date='$ddate', Item_desc=?, Item_category=?, Price=?  
        WHERE Item_number='$itemno'";

$stmt = mysqli_prepare($con, $sql);

mysqli_stmt_bind_param($stmt, "ssii", $iname, $description, $icategory, $price);

mysqli_stmt_execute($stmt);

$res = mysqli_stmt_get_result($stmt);

mysqli_stmt_close($stmt);


// if (!mysqli_query($con, $sql)) {
//     die('Error: ' . mysqli_error($con));
// } else {
//     echo "1 record added";
// }

// Close connection
mysqli_close($con);
header("Location: see_items.php");

?>