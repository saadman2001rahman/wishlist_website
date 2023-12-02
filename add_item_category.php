<!DOCTYPE html>
<html>

<head>
    <h1>Add Item Category</h1>
</head>

<a href="main_page.php">
    <button><img src="images/back.png" width="10" length="10"></button>
</a><br>

<form action="sql_add_category.php" method="post">
    ID: <input type="text" name="id">
    Name: <input type="text" name="name">
    <input type="submit" value="add">
</form>

</html>