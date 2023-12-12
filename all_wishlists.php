<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>All Wishlist</title>
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
    
        $sql = "SELECT Wishlist_id,Wishlist_name,Owner_id FROM wishlist";
    
        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con));
        }
    
        $all_wishlists = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
        if($result->num_rows == 0) {
            echo("<h1> No Entries </h1>");
        } else {
            echo "<table border='1'><tr><th>Wishlist ID</th><th>Wishlist Name</th><th>Owner ID</th><th>Delete Wishlist</th></tr>";
            foreach ($all_wishlists as $row) {
                echo "<tr><td>" . $row["Wishlist_id"] . "</td><td>" . $row["Wishlist_name"] . "</td><td>" . $row["Owner_id"] . "</td><td>" . "<form action='sql_remove_wishlist.php' method='POST'><input type='hidden' name='wishlist_id' value=" . $row['Wishlist_id'] . ">" ."<input type = 'hidden' name = 'admin' value = true><input type='submit' value='Remove Wishlist'></form>" .
                "</td></tr>";
            }
        }
    /*for ($wishlist = 0; $wishlist <= 10; $wishlist++) {
        echo "
        <div className=\"wishlist_entries\">
            <p>name of wishlist</p>
            <button className=\"button_delete_wishlist\">Delete</button>
        </div>
        ";
    }*/
        mysqli_close($con);
    ?>
</body>

</html>