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


$sql = "SELECT * FROM  master_user WHERE User_id=? AND User_password=?";
$admin = "SELECT * FROM administrator WHERE User_id=?";

$stmt = mysqli_prepare($con, $sql);
$stmt_admin = mysqli_prepare($con, $admin);

mysqli_stmt_bind_param($stmt, "ss", $user_id, $password);
mysqli_stmt_bind_param($stmt_admin, "s", $user_id);

mysqli_stmt_execute($stmt);
mysqli_stmt_execute($stmt_admin);


$result = mysqli_stmt_get_result($stmt);
$r = mysqli_stmt_get_result($stmt_admin);

if (!$result) {
    die('Error: ' . mysqli_error($con));
}

if (!$r) {
    die('Error: ' . mysqli_error($con));
}

$all_categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
if ($result->num_rows == 0) {
    $debugcode = "Login Attempt Failed. Please Try Again.";
    $headercode = "Location: login.php?debugcode=";
} else {
    if ($r->num_rows > 0) {
        $debugcode = "Admin Login";
        $headercode = "Location: admin_main_page.php?debugcode=";
    } else {
        $debugcode = "Login Passed";
        $headercode = "Location: main_page.php?debugcode=";
    }
    foreach ($all_categories as $row) {
        $_SESSION['Owner_id'] = $row['User_id'];
    }
}


mysqli_stmt_close($stmt);
mysqli_stmt_close($stmt_admin);
mysqli_close($con);
header($headercode . urlencode($debugcode));
exit();
?>