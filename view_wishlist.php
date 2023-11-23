<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Wishlist</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <div className="nav_bar">
        <h1>Wishlist Name</h1>
        <a href="main_page.php">
            <button title="Main Page"><img src="images/back.png" width="35" </button>
        </a>

        <a href="additem.php">
            <button title="Add Item" className="button_add_item"><img src="images/add_item.png" width="35" </button>

        </a>

    </div>

    <!-- each wishlist entry -->
    <?php
    for ($item = 0; $item <= 10; $item++) {
        echo "
        <div className=\"item\">
            <p>name of item</p>
            <button className=\"button_edit_item\">Edit</button>
                <button className=\"button_add_item\">Remove Item</button>
        </div>
        ";
    }
    ?>


</body>

</html>