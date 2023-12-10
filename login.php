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

<div class = "form-container">
  <form action="main_page.php" method = "POST">
    <label for="dname"> Username: </label>
    <br>
    <input type="text" id="dname" name="dname">
    <br>
    <label for="pass"> Password: </label>
    <br>
    <input type="password" id="pass" name="pass">
    <label for="reveal">
      <br>
      <input type="checkbox" id="reveal" onclick="revealPass()">
      <img src="images/Eye-Black.png" height=15px width=20px onclick="revealPass()" />
    </label>
    <br><br>
    <input type="submit" value="Submit">
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
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();


}



?>

</html>