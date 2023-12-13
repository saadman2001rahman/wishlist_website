<?php
session_start();
$wishlist_id = $_SESSION['add_item_to_this_wishlist'];
$iname = $_POST["item_name"];
$price = $_POST["price"];
$icat = $_POST["item_category"];
$ddate = $_POST["due_date"];
$description = $_POST["description"];
$link = $_POST["link"];

$_SESSION['add_name'] = $iname;
$_SESSION['add_price'] = $price;
$_SESSION['add_cat'] = $icat;
$_SESSION['add_ddate'] = $ddate;
$_SESSION['add_desc'] = $description;
$_SESSION['add_link'] = $link;

$itemid = rand(0, 99999);
$caninsert = 0;

// $wishid = $_POST["wishlist_id"];
// $baskid = $_POST["basket_id"];

echo $iname . "<br>" . $price . "<br>" . $icat . "<br>" . $ddate . "<br>" . $description . "<br>" . $link . "<br>";

// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
    echo "Failed to connect: " . mysqli_connect_error();
}

while ($caninsert == 0) {
    $sql = "SELECT Item_number FROM item WHERE Item_number = ?";
    $stmt = mysqli_prepare($con, $sql);

    mysqli_stmt_bind_param($stmt, "i", $itemid);

    mysqli_stmt_execute($stmt);


    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    if ($result !== false) {
        if (mysqli_num_rows($result) == 0) {
            $caninsert = 1;
        } else {
            $itemid = rand(0, 9999999);
        }
    } else {
        echo 'Error in query: ' . mysqli_error($con);
        die();
    }
}


// Get domain from url
$domain = parse_url($link)['host'];
echo $domain . "<br>";

$sql_check_domain = "SELECT * FROM website WHERE Website_domain=?";
$stmt = mysqli_prepare($con, $sql);

mysqli_stmt_bind_param($stmt, "s", $domain);

mysqli_stmt_execute($stmt);


$result = mysqli_stmt_get_result($stmt);

mysqli_stmt_close($stmt);

$_SESSION['add_item_id'] = $itemid;

$_SESSION['add_wishlist_id'] = $wishlist_id;

// Check if domain is in database
if ($result->num_rows > 0) {
    echo "Domain exists.";
} else {
    // If not in database, add it
    echo "Domain does not exist.";
    $_SESSION['headerforwebsite'] = 'see_items.php';
    header("Location: sql_add_website.php?domain=" . urlencode($domain));
}

// while ($caninsert == 0) {
//     $result = mysqli_query($con, "SELECT Item_number FROM item WHERE Item_number = '$itemid'");
//     if ($result !== false) {
//         if (mysqli_num_rows($result) == 0) {
//             $caninsert = 1;
//         } else {
//             $itemid = rand(0, 9999999);
//         }
//     } else {
//         echo 'Error in query: ' . mysqli_error($con);
//         die();
//     }
// }

// May need to change wishlist id; basket id
$sql = "INSERT INTO item (Item_number, Item_name, Due_date, Link, Item_desc, Item_category, Website_domain, Wishlist_id, Basket_id, Price)
        VALUES (?, ?, '$ddate', ?, ?, ?, ?, ?, NULL, ?)";

$stmt = mysqli_prepare($con, $sql);

mysqli_stmt_bind_param($stmt, "isssisid", $itemid, $iname, $link, $description, $icat, $domain, $wishlist_id, $price);

mysqli_stmt_execute($stmt);


$result = mysqli_stmt_get_result($stmt);

mysqli_stmt_close($stmt);

if (!$result) {
    die('Error: ' . mysqli_error($con));
} else {
    echo "1 record added";
}

// Close connection
mysqli_close($con);

header("Location: see_items.php");
?>