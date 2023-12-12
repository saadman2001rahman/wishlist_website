<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>All Categories</title>
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
    
        $sql = "SELECT * FROM item_category";
    
        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con));
        }
    
        $all_categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
        if($result->num_rows == 0) {
            echo("<h1> No Entries </h1>");
        } else {
            echo "<table border='1'><tr><th>Category Name</th><th>Category ID</th><th>Delete Category</th></tr>";
            foreach ($all_categories as $row) {
                echo "<tr><td>" . $row["Category_name"] . "</td><td>" . $row["Category_id"] . "</td><td>" . "<form action='sql_remove_category.php' method='POST'><input type='hidden' name='category_id' value=" . $row['Category_id'] . ">" ."<input type = 'hidden' name = 'admin' value = true><input type='submit' value='Remove Category'></form>" .
                "</td></tr>";
            }
        }
    /*for ($categories = 0; $categories <= 10; $categories++) {
        echo "
        <div className=\"category_entries\">
            <p>name of category</p>
            <button className=\"button_delete_category\">Delete</button>
        </div>
        ";
    } */
        mysqli_close($con);
    ?>
</body>

</html>