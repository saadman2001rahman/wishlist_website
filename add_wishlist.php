<!DOCTYPE html>
<html>
<div>
    <h1> Add Wishlist </h1>
    <a href="main_page.php">
        <button><img src="images/back.png" width="35"></button>
    </a>
</div>
<br><br>
<form>
    <label for="wishlist_name"> Name: </label>
    <br>
    <input type="text" id="wishlist_name" name="wishlist_name">
    <br>
    <label for="pass"> Recepient: </label>
    <br>
    <input type="text" id="wishlist_recepient" name="wishlist_recepient">
    <br><br>
    <!-- add wishlist to wishlist database, then return to main page -->
    <input type="submit" value="Add">
</form>
<br>

</html>