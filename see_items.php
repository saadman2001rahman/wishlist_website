<?php
session_start();
$wishlist_id = $_SESSION['wishlist_id'];
$con = mysqli_connect("localho st", "root", "", "wishlist_website");

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
</a>
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

$sql = "SELECT item_name, price, due_date FROM item WHERE wishlist_id= '$wishlist_id'";

$result = mysqli_query($con, $sql);
if (!$result) {
    die('Error: ' . mysqli_error($con));
}

$all_categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Name</th><th>Price</th><th>Due Date</th></tr>";
    foreach ($all_categories as $row) {
        echo "<tr><td>" . $row["item_name"] . "</td><td>" . $row["price"] . "</td><td>" . $row["due_date"] . "</td></tr>";

    }
    echo "</table>";
} else {
    echo "0 Items";
}
echo "</body></html>";



mysqli_close($con);

?>