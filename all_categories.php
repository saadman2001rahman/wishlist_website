<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>All Categories</title>
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
    for ($categories = 0; $categories <= 10; $categories++) {
        echo "
        <div className=\"category_entries\">
            <p>name of category</p>
            <button className=\"button_delete_category\">Delete</button>
        </div>
        ";
    }
    ?>
</body>

</html>