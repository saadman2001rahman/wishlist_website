<!DOCTYPE <!DOCTYPE html>
<html>

<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

if (!$con) {
    echo "Connection error: " . mysqli_connect_error();
}

//write query for all wishlists
$sql = "SELECT * FROM WISHLIST";

//make query and get result
$result = mysqli_query($con, $sql);

//fetch as array
$alwishlists = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Main Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <div className="nav_bar">
        <h1>Wishlists added</h1>
        <a href="add_wishlist.php">
            <button title="Add Wishlist" className="button_add_wishlist"><img src="images/add_wishlist.png"
                    width="35" />
            </button>

        </a>
        <form action="view_category.php" method="post">
            <input type="submit" name="submit" value="View Item Categories">
        </form>
        <form action="view_websites.php" method="post">
            <input type="submit" name="submit" value="View Websites">
        </form>

        <a href="view_basket.php">
            <button title="Go To Basket" className="button_show_basket"><img src="images/basket_image.png" width="35"
                    </button>
        </a>
    </div>


    <?php
    echo "<html><body>";
    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>Name</th></tr>";
        foreach ($alwishlists as $row) {
            $_SESSION['wishlist_id'] = $row["Wishlist_id"];
            echo "<tr><td>" . $row["Wishlist_name"] . "</td><td>" . "<form action='sql_remove_wishlist.php'><input type='submit' value='Remove'></form>";
            "</td><td>" . "<form action='edit_wishlist.php'><input type='submit' value='Edit'></form>";
            "</td></tr>";


        }
        echo "</table>";
    }
    echo "</body></html>";


    mysqli_close($con);

    ?>

    <a href="login.php">
        <button>logout</button>
    </a>


</body>

</html>