<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="style.css">
  <h1> Login Page </h1>
</head>
<br><br>

<form action="main_page.php" target="_self">
  <label for="dname"> Username: </label>
  <br>
  <input type="text" id="dname" name="dname">
  <br>
  <label for="pass"> Password: </label>
  <br>
  <input type="password" id="pass" name="pass">
  <input type="checkbox" id="reveal">
  <label for="reveal">
    <img src="images/Eye-Black.png" height=15px width=20px onclick="revealPass()" />
  </label>
  <br><br>
  <input type="submit" value="Submit">
</form>

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

</html>