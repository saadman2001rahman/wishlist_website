<?php

$item_name = $_POST["item name"];
$due_date = $_POST["due date"];
$link = $_POST["link"];
$description = $_POST["description"];
$item_cat = $_POST["item category"];
$web_domain = $_POST["website domain"];
$price = $_POST["price"];

echo $item_name. "<br>". $description."<br>";

// Create connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wishlist_website";

$con=mysqli_connect($servername,$username,$password,$dbname);

// Check connection
if(!$con) {
    echo "Failed to connect: ". mysqli_connect_error();
}

$sql = "INSERT INTO item (Item_number, Name, Due_date, Link, Description, Item_category, Website_domain, Wishlist_id, Basket_id, Price)
    VALUES ('1', '$item_name', '$due_date', '$link', '$description', '$item_cat', '$web_domain', '1', '1', '$price')";

if(!mysqli_query($con,$sql)) {
    die('Error: '. mysqli_error($con));
} else {
    echo "1 record added";
}

// Close connection
mysqli_close($con);
?>
