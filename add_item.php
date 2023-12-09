<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <h1>Add Item</h1>
    </head>

    <a href="main_page.php">
        <button><img src="images/back.png" width="10" length="10"></button>
    </a>

    <form action="sql_add_item.php" method="post">
        <label for="item_name">Item name:</label>
        <input type="text" id="item_name" name="item_name"><br>
        <br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" min="0.00"><br>
        <br>
        <label for="item_category">Item category:</label>
        <select name="item_category" id="item_category">
            <?php
            // Get item categories from database
            // Create connection
            $con=mysqli_connect("localhost","root","","wishlist_website");
            // Check connection
            if(!$con) {
                echo "Failed to connect: ". mysqli_connect_error();
            }
            // use to get item categories for form below
            $categories = mysqli_query($con,"SELECT Category_id, Name FROM item_category");
            while($row = mysqli_fetch_array($categories)) {
                //
                echo '<option value="' . $row['Category_id'] . '">' . $row['Name'] . '</option>';
            }
            mysqli_close($con);
            ?>
        </select><br>
        <br>
        <label for="due_date">Item due date: </label>
        <input type="date" id="due_date" name="due_date" max="2025-12-31"><br>
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
</html>

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
