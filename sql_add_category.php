<!-- <?php

$category_name = $_POST["name"];
$category_id = $_POST["id"];

echo $name . "<br>" . $email . "<br>";


// Create connection
$con = mysqli_connect("localhost", "saadman", "123456", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "INSERT INTO item_category (Wishlist_id, Wishlist_name, Owner_id) VALUES ('$category_id','$category_name')";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
    echo "this is where it is failing";
}

echo "1 record added";

mysqli_close($con);
?> -->