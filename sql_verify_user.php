<?php
session_start();
$user_id = $_POST['uname'];
$password = $_POST['pass'];

// echo $wishlist_name . "<br>" . $wishlist_id . "<br>" . $owner_id;


// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$sql = "SELECT * FROM  master_user WHERE User_id='$user_id' AND User_password='$password'";


$result = mysqli_query($con, $sql);
if (!$result) {
    die('Error: ' . mysqli_error($con));
}

$all_categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
if ($result->num_rows == 0) {
    $debugcode = "Login Attempt Failed. Please Try Again.";
    $headercode = "Location: login.php?debugcode=";
} else {

    $debugcode = "Login Passed";
    $headercode = "Location: main_page.php?debugcode=";
    foreach ($all_categories as $row) {
        $_SESSION['Owner_id'] = $row['User_id'];
    }
}


mysqli_close($con);
header($headercode . urlencode($debugcode));
exit();
?>