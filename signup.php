<!DOCTYPE html> 
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Register a new account </title>
    <h1> Register a new account </h1>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
 </head>

<div class = "form-container">
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
        <label for = "username"> Username: </label>
        <br>
        <input type = "text" id = "user_name" name = "username">
        <br>
        <label for = "display_name"> Display name: </label>
        <br>
        <input type = "text" id = "display_name" name = "display_name">
        <br>
        <label for = "pass"> Password: </label>
        <br>
        <input type = "text" id = "pass" name = "password">
        <br><br>
        <input type = "submit" value = "add">
    </form>
</div>
 
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