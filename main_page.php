<!DOCTYPE <!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Main Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
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
            <button title="Go To Basket" className="button_show_basket"><img src="images/basket_image.png" width="35" />
            </button>
        </a>
        <form action="main_page.php" method="post">
            <input type='text' name="wname">
            <input type='submit' name='search' value='search'>
        </form>

    </div>

    <?php
    session_start();
    $owner_id = $_SESSION["Owner_id"];
    $con = mysqli_connect("localhost", "root", "", "wishlist_website");

    if (!$con) {
        echo "Connection error: " . mysqli_connect_error();
    }

    if (empty($_POST['wname'])) {
        $sql = "SELECT * FROM WISHLIST WHERE Owner_id='$owner_id'";
    } else {
        $thename = $_POST['wname'];
        $sql = "SELECT * FROM WISHLIST WHERE Owner_id='$owner_id' and Wishlist_name LIKE '%$thename%'";
    }

    //make query and get result
    $result = mysqli_query($con, $sql);

    //fetch as array
    $alwishlists = mysqli_fetch_all($result, MYSQLI_ASSOC);

    ?>



    <?php
    echo "<html><body>";
    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>Name</th></tr>";
        foreach ($alwishlists as $row) {
            echo "<tr><td>" . $row["Wishlist_name"] . "</td><td>" . "<form action='sql_remove_wishlist.php' method='POST'>           <input type='hidden' name='wishlist_id' value=" . $row['Wishlist_id'] . ">" . "<input type='submit' value='Remove'></form>" .
                "</td><td>" . "<form action='see_items.php' method='post'><input type='hidden' name='wishlist_id' value=" . $row['Wishlist_id'] . ">" . "<input type='submit' value='Edit'></form>";
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