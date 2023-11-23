<!DOCTYPE <!DOCTYPE html>
<html>

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
        <button title="Add Wishlist" className="button_add_wishlist"><img src="images/add_wishlist.png" width="35"
                </button>
            <button className="button_item_category">Add Category</button>
            <button title="Go To Basket" className="button_show_basket"><img src="images/basket_image.png" width="35"
                    </button>
    </div>

    <!-- each wishlist entry -->
    <?php
    for ($wishlist = 0; $wishlist <= 10; $wishlist++) {
        echo "
        <div className=\"wishlist_entries\">
            <p>name of wishlist</p>
            <button className=\"button_edit_wishlist\">Edit</button>
            <button title=\"Add Item\" className=\"button_add_item\"><img src=\"images/add_item.png\" width=\"20\"</button>
        </div>
        ";
    }
    ?>


</body>

</html>