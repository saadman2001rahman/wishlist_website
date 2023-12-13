<?php

$itemid = $_POST['item_number'];
// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");
// Check connection
if (!$con) {
    echo "Failed to connect: " . mysqli_connect_error();
}

$sql = "SELECT Item_name FROM item WHERE Item_number =?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $itemid);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    die('Error: ' . mysqli_error($con));
}
mysqli_stmt_close($stmt);


$all_categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($all_categories as $row) {
    $item_name = $row["Item_name"];
}

?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <h1>
        <?php echo "Edit " . $item_name ?>
    </h1>
</head>

<a href="see_items.php">
    <button><img src="images/back.png" width="10" length="10"></button>
</a>

<body>
    <form action="sql_update_item.php" method="post">
        <input type="hidden" name="item_number" value="<?php echo $itemid ?>">
        <label for="item_name">Item name:</label>
        <input type="text" id="item_name" name="item_name"><br>
        <br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" min="0.00"><br>
        <br>
        <label for="item_category">Item category:</label>
        <select name="item_category" id="item_category">
            <option value="Select a category">Select a category</option>
            <?php
            // get item categories for form below
            $categories = ((mysqli_query($con, "SELECT Category_id, Category_name FROM item_category")));
            while ($row = mysqli_fetch_array($categories)) {
                echo '<option value="' . $row['Category_id'] . '">' . $row['Category_name'] . '</option>';
            }
            ?>
        </select><br>
        <br>
        <label for="due_date">Item due date: </label>
        <input type="date" id="due_date" name="due_date" max="2027-12-31"><br>
        <br>
        <label for="description">Description:</label>
        <input type="text" id="description" name="description"><br>
        <br>
        <input type="submit" value="Update">
        <input type="reset" value="Clear">
    </form>
</body>

</html>

<?php mysqli_close($con); ?>