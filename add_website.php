<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div>
        <h1> Add Website </h1>
        <a href="main_page.php">
            <button><img src="images/back.png" width="35"></button>
        </a>
    </div>
    <br><br>
    <form action="sql_add_website.php" method="post">
        <label for="domain">Domain:</label>
        <input type="text" id="domain" name="domain"><br>
        <label for="cost">Shipping:</label>
        <input type="number" id="cost" name="cost" step="0.01" min="0.00"><br>
        <input type="submit" value="add">
    </form>
    <br>
</body>

</html>