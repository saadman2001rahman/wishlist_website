<!DOCTYPE html>
<html>
    <head>
        <h1>Add Item</h1>
    </head>

    <a href="sql_add_item.php">
        <button><img src="images/back.png" width="10" length="10"></button>
    </a>

    <form action="main_page.php" method="post">
        <label for="iname">Item name:</label>
        <input type="text" id="iname" name="iname"><br>
        <br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" min="0.00"><br>
        <br>
        <label for="category">Item category:</label>
        <select name="category" id="category">
            <?php
            //https://www.w3schools.com/howto/howto_js_cascading_dropdown.as
            //TODO: Connect categories from main_page categories
            // Item categories
            $item_cat = array("","category1","category2","category3");
            // Display categories in dropdown
            foreach ($item_cat as $category) {
                echo "<option value=\"$category\">$category</option>";
            }
            ?>
        </select><br>
        <br>
        <label for="itemdue">Item due date: </label>
        <input type="date" id="itemdue" name="itemdue" max="2025-12-31"><br>
        <br>
        <label for="description">Description:</label>
        <input type="text" id="description" name="description"><br>
        <br>
        <label for="link">Link:</label>
        <input type="url" id="link" name="link"><br>
        <br>
        <input type="submit" value="Add" >
        <input type="reset" value="Clear" >
    </form>

<?php

    foreach ($_POST as $key => $value) {
        if(empty($value)) {
            print ('<br>Warning: Missing value ' . $key .'!');
        }
    }
    if(isset($_POST['item_name']) && !empty($_POST['item_name'])) {
        $iname = $_POST['item_name'];
        print("<br>" . $iname);
    }

?>

</html>