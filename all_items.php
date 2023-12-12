<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>All Items</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <a href="admin_main_page.php">
            <button title="Admin Main Page"><img src="images/back.png" width="35" </button>
        </a>

    </div>

    <?php

        $con = mysqli_connect("localhost", "root", "", "wishlist_website");

        if (!$con) {
            echo "Failed to connect: " . mysqli_connect_error();
        }

        $sql = "SELECT Item_name,Price,Due_date,Item_number,Item_category FROM item";

        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con));
        }

        $all_items = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if($result->num_rows == 0) {
            echo("<h1> No Entries </h1>");
        } else {
            echo "<table border='1'><tr><th>Item Name</th><th>Item Price</th><th>Due Date</th><th>Category ID</th><th>Delete Item</th></tr>";
            foreach ($all_items as $row) {
                echo "<tr><td>" . $row["Item_name"] . "</td><td>" . $row["Price"] . "</td><td>" . $row["Due_date"] . "</td><td>" . $row["Item_category"] . "</td><td>" . "<form action='sql_remove_item.php' method='POST'><input type='hidden' name='item_number' value=" . $row['Item_number'] . ">" ."<input type = 'hidden' name = 'admin' value = true><input type='submit' value='Remove Item'></form>" .
                "</td></tr>";
            }
        }

    /*for ($items = 0; $items <= 10; $items++) {
        echo "
        <div className=\"item_entries\">
            <p>name of item</p>
            <button className=\"button_delete_item\">Delete </button>
        </div>
        ";
    }*/
        mysqli_close($con);
    ?>
</body>

</html>