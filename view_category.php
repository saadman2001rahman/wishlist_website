<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

if (!$con) {
    echo "Failed to connect: " . mysqli_connect_error();
}

$sql = "SELECT * FROM item_category";

$result = mysqli_query($con, $sql);
if (!$result) {
    die('Error: ' . mysqli_error($con));
}

$all_categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo "    <a href='main_page.php'>
<button><img src='images/back.png' width='35'></button>
</a>
";

echo "    <a href='add_item_category.php'>
<button>Add Item Category</button>
</a>
";

echo "<html><head><head>
<link rel='stylesheet' href='style.css'>
</head>

<body>
<title>SQL Query Result</title></head><body>";
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Name</th></tr>";
    foreach ($all_categories as $row) {
        $_SESSION['category_id'] = $row["Category_id"];
        echo "<tr><td>" . $row["Category_name"] . "</td><td>" . "<form action='sql_remove_category.php' method = 'POST'><input type='hidden' name='category_id' value=" . $row['Category_id'] . ">" . "<input type='submit' value='Remove'></form>";
        "</td></tr>";


    }
    echo "</table>";
} else {
    echo "0 results";
}
echo "</body></html>";


mysqli_close($con);

?>