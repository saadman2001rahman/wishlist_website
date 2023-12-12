<?php

//not done
$itemno = $_POST["item_number"];
$iname = $_POST["item_name"];
$ddate = $_POST["due_date"];
$description = $_POST["item_desc"];
$icategory = $_POST["item_cat"];
$price = $_POST["price"];

// Create connection
$con=mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if(!$con) {
    echo "Failed to connect: ". mysqli_connect_error();
}

// not done
$sql = "UPDATE item 
        SET Name='".$name."', Due_date='".$ddate."', Item_desc='".$description."', Item_category='".$icategory."', Price='".$price."'  
        WHERE Item_number='$itemno'";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
} else {
    echo "1 record added";
}

// Close connection
mysqli_close($con);
header("Location: main_page.php");

?>
