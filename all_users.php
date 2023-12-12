<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>All Users</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <a href="admin_main_page.php">
            <button title="Admin Main Page"><img src="images/back.png" width="35" </button>
        </a>

    </div>

    <?php
        $con = mysqli_connect("localhost", "root", "", "wishlist_website");

        if (!$con) {
            echo "Failed to connect: " . mysqli_connect_error();
        }
    
        $sql = "SELECT User_id,Display_name,Email_address FROM master_user";
        
    
        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con));
        }

        $all_users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
        if($result->num_rows == 0) {
            echo("<h1> No Entries </h1>");
        } else {
            echo "<table border='1'><tr><th>User ID</th><th>Display Name</th><th>Email Address</th><th>Delete User</th></tr>";
            foreach ($all_users as $row) {
                echo "<tr><td>" . $row["User_id"] . "</td><td>" . $row["Display_name"] . "</td><td>" . $row["Email_address"] . "</td><td>" . "<form action='sql_remove_user.php' method='POST'><input type='hidden' name='user_id' value=" . $row['User_id'] . ">" . "<input type = 'hidden' name = 'admin' value = true><input type='submit' value='Remove User'></form>" .
                "</td></tr>";
            }
        }
  
    /*for ($users = 0; $users <= 10; $users++) {
        echo "
        <div className=\"user_entries\">
            <p>name of users</p>
            <button className=\"button_delete_user\">Delete</button>
        </div>
        ";
    }*/
        mysqli_close($con);
    ?>
</body>

</html>