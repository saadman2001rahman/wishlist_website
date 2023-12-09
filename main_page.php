<!DOCTYPE <!DOCTYPE html>
<html>

<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "wishlist_website");

if (!$conn) {
    echo "Connection error: " . mysqli_connect_error();
}

//write query for all wishlists
$sql = "SELECT * FROM WISHLIST";

//make query and get result
$result = mysqli_query($conn, $sql);

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


    <div class="container">
        <div class="row">
            <?php foreach ($alwishlists as $wish) { ?>
                <div>
                    <h6>
                        <?php
                        echo htmlspecialchars($wish["Wishlist_name"]);
                        // $wishlist_id = $wish["Wishlist_id"];
                        $_SESSION['wishlist_id'] = $wish["Wishlist_id"];
                        ?>
                        <form action="sql_remove_wishlist.php">
                            <input type="submit" value="Remove">
                        </form>
                    </h6>
                </div>
            <?php } ?>
        </div>
    </div>

    <a href="login.php">
        <button>logout</button>
    </a>


</body>

</html>