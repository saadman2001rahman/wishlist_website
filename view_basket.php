<?php
session_start();
$owner_id = $_SESSION["Owner_id"];

$con = mysqli_connect("localhost", "root", "", "wishlist_website");

if (!$con) {
    echo "Failed to connect: " . mysqli_connect_error();
}

$sql = "SELECT * FROM Item JOIN Basket ON Item.basket_id = Basket.Basket_id WHERE Basket.User_id = '$owner_id'";

$result = mysqli_query($con, $sql);
if (!$result) {
    die('Error: ' . mysqli_error($con));
}

$all_categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<html>
    <a href='main_page.php'>
        <button><img src='images/back.png' width='35'></button>
    </a>
    <head>
        <link rel='stylesheet' href='style.css'>
        <title>Basket</title>
    </head>
    <body>
        <h1>Basket</h1>
        <div>
            <?php
            if ($result->num_rows > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Due Date</th>
                            <th>From Wishlist</th>
                        </tr>";
                foreach ($all_categories as $row) {
                    echo "<tr>
                            <td>" . $row["Item_name"] . "</td>
                            <td>" . $row["Price"] . "</td>
                            <td>" . $row["Due_date"] . "</td>
                            <td>" . "<form action='sql_remove_from_basket.php' method='POST'><input type='hidden' name='item_number' value=" . $row['Item_number'] . ">" . "<input type='submit' value='Remove From Basket'></form>" .
                    "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 Items";
            }
            ?>
        </div>
        <div>
            <form action="sql_calculate.php" method="post">
                <label for="coupon">Add Coupon:</label>
                <select name="coupon" id="coupon">
                <option value = "">Select Coupon</option>
                    <?php
                    $coupons = ((mysqli_query($con, "SELECT * FROM coupons")));
                    while ($row = mysqli_fetch_array($coupons)) {
                        echo '<option value="' . $row['Coupon_id'] . '">' . $row['Value'] . '</option>';
                    }
                    ?>
                </select>    
                <br>
                <label for="shipping">Select a website to apply shipping cost:</label>
                <select name="shipping" id="shipping">
                <option value = "">Select Website</option>
                    <?php
                    $websites = ((mysqli_query($con, "SELECT * FROM Website")));
                    while ($row = mysqli_fetch_array($websites)) {
                        echo '<option value="' . $row['Website_domain'] . '">' . $row['Website_domain'] . '</option>';
                    }
                    ?>
                </select>
                <br>
                <input type="submit" value="Update Total">
                <input type="reset" value="Clear">
            </form>    
        </div>
        <div>
            <?php
            $result_bask_val = $con->query($sql);
            if ($result_bask_val==false) {
                die('Error: ' . mysqli_error($con));
            }
            $row_basket = $result_bask_val->fetch_assoc();
            echo $row_basket['basket_value'];
            ?>
        </div>
    </body>
</html>

<?php

//maybe add see total?
//or call total in view basket site??
//food for thought

mysqli_close($con);

?>