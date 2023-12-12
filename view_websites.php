<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

if (!$con) {
    echo "Failed to connect: " . mysqli_connect_error();
}

$sql = "SELECT * FROM website JOIN Coupons on website.Coupons = Coupons.coupon_id";

$result = mysqli_query($con, $sql);
if (!$result) {
    die('Error: ' . mysqli_error($con));
}

$all_categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo "    <a href='main_page.php'>
<button><img src='images/back.png' width='35'></button>
</a>
";

echo "    <a href='add_website.php'>
<button>Add Website</button>
</a>
";

echo "<html><head><link rel='stylesheet' href='style.css'>
<title>SQL Query Result</title></head><body>";
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Name</th><th>Shipping Cost</th><th>Coupon Value</th><th>Remove Website</th><th>Change Coupon Value to</th><th>Change Shipping Cost of Website to</th></tr>";
    foreach ($all_categories as $row) {
        $_SESSION['website_domain'] = $row["Website_domain"];
        echo "<tr><td>" . $row["Website_domain"] . "</td><td>" . $row["Shipping_cost"] . "</td><td>" . $row["Value"] . "</td><td>" . "<form action='sql_remove_website.php'><input type='hidden' name='website_domain' value=" . $row['Website_domain'] . "><input type='submit' value='Remove'></form>" .
            "</td><td>" . "<form action='sql_update_coupon.php' method='post'><input type='hidden' name='coupon_id' value=" . $row['Coupon_id'] . ">" . "<input type='text' id='couponval' name='couponval'><input type='submit' value='Change Coupon Value'></form></td>><td>" . "<form action='sql_update_website.php' method='post'><input type='hidden' name='website_domain' value=" . $row['Website_domain'] . ">" . "<input type='text' id='shipval' name='shipval'><input type='submit' value='Change Shipping Cost'></form></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
echo "</body></html>";


mysqli_close($con);

?>