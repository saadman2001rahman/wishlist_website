<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>All Wishlist</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <div>
        <a href="admin_main_page.php">
            <button title="Admin Main Page"><img src="images/back.png" width="35" </button>
        </a>

    </div>

    <?php
    for ($wishlist = 0; $wishlist <= 10; $wishlist++) {
        echo "
        <div className=\"wishlist_entries\">
            <p>name of wishlist</p>
            <button className=\"button_delete_wishlist\">Delete</button>
        </div>
        ";
    }
    ?>
</body>

</html>