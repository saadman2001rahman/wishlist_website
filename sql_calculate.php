<?php 
$coupon_val = $_POST["coupon"];
$basket_id = $_SESSION["basket"];

// Create connection
$con=mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if(!$con) {
    echo "Failed to connect: ". mysqli_connect_error();
}

echo $basket_id;

$total_id = rand(0, 99999);
$caninsert = 0;

while ($caninsert == 0) {
    $result = mysqli_query($con, "SELECT total_id FROM calculates WHERE total_id = '$total_id'");
    if ($result !== false) {
        if (mysqli_num_rows($result) == 0) {
            $caninsert = 1;
        } else {
            $total_id = rand(0, 9999999);
        }
    } else {
        echo 'Error in query: ' . mysqli_error($con);
        die();
    }
}

$sql_coupon = "SELECT * FROM Coupons JOIN Website ON Coupons.coupon_id = Website.coupon WHERE Coupons.coupon_id='$coupon_val'";


$sql = "INSERT INTO calculates (Total_id, Basket_id, Website_domain) VALUES ($total_id, $basket_id, $webdomain)";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
} else {
    echo "1 record added";
}

// Close connection
mysqli_close($con);
// header("Location: view_basket.php");
?>