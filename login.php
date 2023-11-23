<!DOCTYPE html> 
<html>
 <h1> Login Page </h1>
 <br><br>
 <form action = "main_page.php" target = "_self">
    <label for = "uname"> Username: </label>
    <br>
    <input type = "text" id = "uname" name = "uname">
    <br>
    <label for = "pass"> Password: </label>
    <br>
    <input type = "password" id = "pass" name = "pass">
    <input type = "checkbox" id = "reveal">
    <label for = "reveal">
        <img src="images/Eye-Black.png" height = 15px width = 20px onclick= "myFunction()"/>
    </label>
    <br><br>
    <input type = "submit" value = "Submit">
 </form>
 <br>
 <a href = "signup.php"> If you don't already have an account, sign up here </a>
 <script type = "text/JavaScript">
    function myFunction() {
        var x = document.getElementById("pass");
        if (x.type === "password") {
        x.type = "text";
        } else {
        x.type = "password";
        }
    }
  </script>

</html>
