<?php
session_start();
$owner_id = $_SESSION["Owner_id"];

$con = mysqli_connect("localhost", "root", "", "wishlist_website");

if (!$con) {
    echo "Failed to connect: " . mysqli_connect_error();
}

$sql = "SELECT * FROM Item JOIN Basket ON Item.basket_id = Basket.Basket_id WHERE Basket.User_id = '$owner_id'";

$result = mysqli_query($con, $sql);
if (!$result) {
    die('Error: ' . mysqli_error($con));
}

$all_categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo "    <a href='main_page.php'>
<button><img src='images/back.png' width='35'></button>
</a>
";


//maybe add see total?
//or call total in view basket site??
//food for thought

echo "<html><head><link rel='stylesheet' href='style.css'> 
<title>Basket</title></head><body>";

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Item Name</th><th>Item Price</th><th>Due Date</th><th>From Wishlist</th></tr>";
    foreach ($all_categories as $row) {
        echo "<tr><td>" . $row["Item_name"] . "</td><td>" . $row["Price"] . "</td><td>" . $row["Due_date"] . "</td><td>" . "<form action='sql_remove_from_basket.php' method='POST'><input type='hidden' name='item_number' value=" . $row['Item_number'] . ">" . "<input type='submit' value='Remove From Basket'></form>" .
            "</td></tr>";

    }
    echo "</table>";
} else {
    echo "0 Items";
}
echo "</body></html>";



mysqli_close($con);

?>