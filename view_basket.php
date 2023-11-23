<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Basket</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <div className="nav_bar">
        <h1>Basket</h1>
        <a href="main_page.php">
            <button title="Main Page"><img src="images/back.png" width="35" </button>

        </a>
    </div>

    <!-- each wishlist entry -->
    <?php
    for ($basket_item = 0; $basket_item <= 10; $basket_item++) {
        echo "
        <div className=\"basket_item\">
            <p>name of item</p>
            <p>price of item</p>
            <button className=\"remove_item_basket\">Remove</button>
        </div>
        ";
    }

    for ($website = 0; $website <= 2; $website++) {
        echo "<p>Shipping from webiste: $website = $10</p>";
    }

    echo "Total is: $100";
    ?>




</body>

</html>