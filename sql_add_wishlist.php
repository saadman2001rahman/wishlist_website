<?php

$wishlist_name = $_POST["name"];
$wishlist_id = $_POST["id"];
$owner_id = $_POST["owner"];

echo $name . "<br>" . $email . "<br>";


// Create connection
$con = mysqli_connect("localhost", "saadman", "123456", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "INSERT INTO wishlist (Wishlist_id, Wishlist_name, Owner_id) VALUES ('$wishlist_id','$wishlist_name','$owner_id')";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}

echo "1 record added";

mysqli_close($con);
?>