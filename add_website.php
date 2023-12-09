<!DOCTYPE html>
<html>

<div>
    <h1> Add Website </h1>
    <a href="main_page.php">
        <button><img src="images/back.png" width="35"></button>
    </a>
</div>
<br><br>
<form action="sql_add_website.php" method="post">
    Domain: <input type="text" name="website_domain">
    Shipping: <input type="text" name="cost">
    <input type="submit" value="add">
</form>
<br>

</html>