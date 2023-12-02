<?php

$category_name = $_POST["name"];
$category_id = $_POST["id"];


// Create connection
$con = mysqli_connect("localhost", "saadman", "123456", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "INSERT INTO item_category (Category_id , Category_name) VALUES ('$category_id', '$category_name')";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}


mysqli_close($con);

header("Location: main_page.php");
exit();
?>