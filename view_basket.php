<?php
session_start();
$owner_id = $_SESSION["Owner_id"];

$con = mysqli_connect("localhost", "root", "", "wishlist_website");

if (!$con) {
    echo "Failed to connect: " . mysqli_connect_error();
}

$sql = "SELECT * FROM Item JOIN Basket ON Item.basket_id = Basket.Basket_id WHERE Basket.User_id=?";

$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $owner_id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
if (!$result) {
    die('Error: ' . mysqli_error($con));
}
mysqli_stmt_close($stmt);

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
                            <td>" . "<form action='sql_remove_from_basket.php' method='POST'><input type='hidden' name='item_price' value=" . $row['Price'] . ">" . "<input type='hidden' name='item_number' value=" . $row['Item_number'] . ">" . "<input type='submit' value='Remove From Basket'></form>" .
                    "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 Items";
        }
        ?>
    </div>
    <div>
        <?php
        $sql = "SELECT Basket_id, Basket_Value FROM Basket WHERE User_id = '$owner_id'";

        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con));
        }

        $all_categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($all_categories as $row) {
            echo "Total Of All Items In Basket:" . $row['Basket_Value'] . "";
            $basket_id = $row["Basket_id"];
        }

        echo "<br><br><br>";

        // $sql = "SELECT Website.Shipping_cost, Coupons.Value FROM item JOIN website on item.Website_domain = website.Website_domain JOIN Coupons on Coupons.Coupon_id = Website.Coupons JOIN Basket on Basket.Basket_id = item.Basket_id WHERE Basket.User_id = '$owner_id'";
        // $result = mysqli_query($con, $sql);
        // if (!$result) {
        //     die('Error: ' . mysqli_error($con));
        // }
        
        // $all_categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // foreach ($all_categories as $row) {
        //     echo "Coupon Availabe:" . $row['Value'] . "";
        // }
        // foreach ($all_categories as $row) {
        //     echo "Shipping cost :" . $row['Shipping_cost'] . "";
        // }
        
        $sql = "SELECT DISTINCT Coupons.Coupon_id, Coupons.Value, Website.Website_domain, Website.Shipping_cost FROM Coupons JOIN Website on Coupons.Coupon_id = Website.Coupons JOIN item on item.website_domain = Website.Website_domain WHERE item.basket_id = '$basket_id'";

        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con));
        }

        $all_categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($all_categories as $row) {
            echo "Coupon Availabe from " . $row['Website_domain'] . ":" . $row['Value'] . "<br>";
        }

        echo "<br><br><br>";

        foreach ($all_categories as $row) {
            echo "Shipping Cost from " . $row['Website_domain'] . ":" . $row['Shipping_cost'] . "<br>";
        }


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