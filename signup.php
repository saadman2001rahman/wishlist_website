<!DOCTYPE html> 
<html>
 <head>
 <link rel="stylesheet" href="style.css">
 <h1> Register a new account </h1>
 </head>

 <form action = "sql_add_user.php" method = "POST">
    <h2> Personal Info </h2>
    <label for = "email"> Email: </label>
    <br>
    <input type = "text" id = "email" name = "email">
    <br>
    <label for = "addr"> Address: </label>
    <br>
    <input type = "text" id = "addr" name = "address">
    <br>
    <label for = "phone"> Phone#: </label>
    <br>
    <input type = "text" id = "phone" name = "phone_number">
    <br>
    <h2> Login Info </h2>
    <label for = "display_name"> Username: </label>
    <br>
    <input type = "text" id = "display_name" name = "display_name">
    <br>
    <label for = "pass"> Password: </label>
    <br>
    <input type = "text" id = "pass" name = "password">
    <br><br>
    <input type = "submit" value = "add">
 </form>
 
 <br>
 <a href = "login.php"> If you already have an account, log in here </a>

 <?php
    foreach ($_POST as $key => $value) {
        if(empty($value)) {
            print ('<br>Warning: Missing value ' . $key .'!');
     }
    }
    if(isset($_POST['display_name']) && !empty($_POST['display_name'])) {
        $dname = $_POST['display_name'];
        print("<br>" . $dname);
    }
 ?>

</html>