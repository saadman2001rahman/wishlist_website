<?php

//not done
$itemno;
$name;
$ddate;
$description;
$icategory;
$price;

// Create connection
$con=mysqli_connect("localhost","root","","wishlist_website");

// Check connection
if(!$con) {
    echo "Failed to connect: ". mysqli_connect_error();
}

// not done
$sql = "UPDATE item 
        SET Name='".$name."', Due_date='".$ddate."', Description='".$description."', Item_category='".$icategory."', Price='".$price."'  
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
