<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <div>
        <h1> Add Wishlist </h1>
        <a href="main_page.php">
            <button><img src="images/back.png" width="35"></button>
        </a>
    </div>
    <br><br>
    <form action="sql_add_wishlist.php" method="post">
        <!-- <input type="hidden" name="owner_id value"> -->
        Name: <input type="text" name="wishlist_name">
        <!-- Owner: <input type="text" name="owner"> -->
        <input type="submit" value="add">
    </form>
    <br>
</body>

</html>