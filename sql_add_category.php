<?php

$category_name = $_POST["name"];
// $category_id = $_POST["id"];


// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");
// $con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$caninsert = 0;
$tryid = rand(0, 9999999);
while ($caninsert == 0) {
    // $tryid = rand(0, 99999999);
    $result = mysqli_query($con, "SELECT Category_id FROM item_category WHERE Category_id = '$tryid'");
    if ($result !== false) {
        if (mysqli_num_rows($result) == 0) {
            $caninsert = 1;
        } else {
            $tryid = rand(0, 9999999);
        }
    } else {
        echo 'Error in query: ' . mysqli_error($con);
        die();
    }
}

$sql = "INSERT INTO item_category (Category_id , Category_name) VALUES ('$tryid', '$category_name')";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}


mysqli_close($con);

header("Location: main_page.php");
exit();
?>