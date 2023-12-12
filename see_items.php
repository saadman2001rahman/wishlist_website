<?php
session_start();

if (empty($_POST['wishlist_id'])) {
    $wishlist_id = $_SESSION['basket_wishlist_id'];
} else {
    $wishlist_id = $_POST['wishlist_id'];
}

$_SESSION['basket_wishlist_id'] = $wishlist_id;

$_SESSION['add_item_to_this_wishlist'] = $wishlist_id;
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

if (!$con) {
    echo "Failed to connect: " . mysqli_connect_error();
}


$sql = "SELECT wishlist_name FROM wishlist WHERE wishlist_id= '$wishlist_id'";

$result = mysqli_query($con, $sql);
if (!$result) {
    die('Error: ' . mysqli_error($con));
}

$all_categories = mysqli_fetch_all($result, MYSQLI_ASSOC);



echo "    <a href='main_page.php'>
<button><img src='images/back.png' width='35'></button>
</'>
";

echo "    <a href='add_item.php'>
<button>Add Item</button>
</a>
";

echo "<html><head><title>Edit Wishlist</title><head>
<link rel='stylesheet' href='style.css'>
</head>

<body>
</head><body>";
if ($result->num_rows > 0) {
    // echo "<table border='1'><tr><th>Name</th></tr>";
    foreach ($all_categories as $row) {
        // $_SESSION['website_domain'] = $row["Website_domain"];
        echo $row["wishlist_name"];
        echo "<form action='edit_wishlist.php' method = 'POST'> <input type='text' id='dname' name='dname'>
        <input type='submit' value='Change'>
        </form>";

    }
    echo "</table>";
} else {
    echo "0 results";
}
echo "
<form action='see_items.php' method='post'>
<input type='text' name='iname'>

<label for='choices'>Sory by:</label>
<select id='choices' name='choices'>
    <option value='Item_name ASC'>DEFAULT</option>
    <option value='Price ASC'>Price ASC</option>
    <option value='Price DESC'>Price DESC</option>
    <option value='Item_name ASC'>Name ASC</option>
    <option value='Item_name DESC'>Name DESC</option>
    <option value='Due_date ASC'>Due Date ASC</option>
    <option value='Due_date DESC'>Due Date DESC</option>

</select>
<br>


<input type='submit' name='search' value='search'>
</form>
";



if (empty($_POST['iname']) and empty($_POST['choices'])) {
    $sql = "SELECT Item_number, Item_name, Price, Due_date FROM item WHERE wishlist_id= '$wishlist_id'";
} else {
    $itemname = $_POST['iname'];
    $order = $_POST['choices'];
    $sql = "SELECT Item_number, Item_name, Price, Due_date FROM item WHERE wishlist_id= '$wishlist_id' and Item_name LIKE '%$itemname%' ORDER BY $order";
}


// $sql = "SELECT Item_number, Item_name, Price, Due_date FROM item WHERE wishlist_id= '$wishlist_id'";

$result = mysqli_query($con, $sql);
if (!$result) {
    die('Error: ' . mysqli_error($con));
}

$all_categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Name</th><th>Price</th><th>Due Date</th></tr>";
    foreach ($all_categories as $row) {
        // $_SESSION['website_domain'] = $row["Website_domain"];
        // echo $row["wishlist_name"];
        echo "<tr><td>" . $row["Item_name"] . "</td><td>" . $row["Price"] . "</td><td>" . $row["Due_date"] . "</td><td>" . "<form action='sql_remove_item.php' method='POST'><input type='hidden' name='item_number' value=" . $row['Item_number'] . ">" . "<input type='submit' value='Remove'></form>" .
            "</td><td>" . "<form action='edit_item.php' method='post'><input type='hidden' name='item_number' value=" . $row['Item_number'] . ">" . "<input type='submit' value='Edit'></form>" .
            "</td><td>" . "<form action='sql_add_to_basket.php' method='POST'><input type='hidden' name='wishlist_id' value=" . $wishlist_id . ">" . "<input type='hidden' name='item_number' value=" . $row['Item_number'] . ">" . "<input type='submit' value='Add To Basket'></form>" .
            "</td></tr>";

    }
    echo "</table>";
} else {
    echo "0 Items";
}
echo "</body></html>";



mysqli_close($con);

?>