<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Login Page </title>
    <h1> Wishlist Website </h1>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<br><br>

<div class="form-container">
    <form action="sql_verify_user.php" method="POST">
        <div>
            <label for="uname"> Username: </label>
            <br>
            <input type="text" id="uname" name="uname">
        </div>
        <br>
        <div>
            <label for="pass"> Password: </label>
            <br>
            <input type="password" id="pass" name="pass">
        </div>
        <div>
            <label for="reveal">
                <br>
                <input type="checkbox" id="reveal" onclick="revealPass()">
                <img src="images/Eye-Black.png" height=15px width=20px onclick="revealPass()" />
            </label>
        </div>
        <br><br>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
</div>

<br>
<a href="signup.php"> If you don't already have an account, sign up here </a>
<script type="text/JavaScript">
    function revealPass() {
        var x = document.getElementById("pass");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
    }
  </script>

<?php
if (isset($_GET["debugcode"]) && $_GET["debugcode"]) {
  echo "<br><br> Invalid Credentials, please re-enter!";
}

?>

</html>