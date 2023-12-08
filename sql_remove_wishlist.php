<?php

$wishlist_name = $_POST["wishlist_name"];
// $wishlist_id = $_POST["wishlist_id"];
$owner_id = $_POST["owner"];
$caninsert = 0;
echo $wishlist_name . "<br>" . $wishlist_id . "<br>" . $owner_id;


// Create connection
$con = mysqli_connect("localhost", "saadman", "123456", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$tryid = 0;
while ($caninsert == 0) {
    $tryid = rand(0, 99999999);
    $result = $mysqli_query($con, "SELECT Wishlist_id FROM Wishlist WHERE Wishlist_id = '$tryid'");
    if (mysqli_num_rows($result) == 0) {
        $caninsert = 1;
    }
}


$sql = "INSERT INTO wishlist (Wishlist_id, Wishlist_name, Owner_id) VALUES ('$tryid', '$wishlist_name','$owner_id')";


if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}


mysqli_close($con);
header("Location: main_page.php");
exit();
?>