<?php

session_start();
$user = $_POST['user_id'];
$admin = $_POST['admin'];
// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "DELETE FROM	master_user WHERE User_id='$user'";



if($admin == 'true') {
    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
}

mysqli_close($con);
header("Location: all_users.php");
exit();
?>