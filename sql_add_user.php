<?php

$canInsert = 0;

$uname = $_POST["username"];
$dname = $_POST["display_name"];
$pass = $_POST["password"];
$email = $_POST["email"];
$address = $_POST["address"];
$phone = $_POST["phone_number"];

// Create connection
$con = mysqli_connect("localhost", "root", "", "wishlist_website");

// Check connection
if (!$con) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$form_filled = true;

  //Checks if any values in form is empty
  foreach ($_POST as $key => $value) {
    if(empty($value)) {
        $form_filled = false;
    }
  }

//Checks if any values in form is empty
foreach ($_POST as $key => $value) {
  if (empty($value)) {
    $form_filled = false;
  }
}

//If the entire form isn't filled out close sql connection and inform user
if (!$form_filled) {
  mysqli_close($con);
  die('Missing one or more values in form!');
}

$user = mysqli_query($con, " SELECT User_id FROM master_user WHERE User_id = '$uname'");

  //Checks to see if username is unique, and inserts into databse if true and closes sql connection if not
  if(mysqli_num_rows($user) == 0) {
    $sql = "INSERT INTO master_user (User_id,Email_address,Display_name,User_address,Phone_number,User_password) 
              VALUES ('$uname','$email','$dname','$address','$phone','$pass')";
  header("Location: login.php");
} else {
  mysqli_close($con);
  die('Username already taken, choose another one!');
}


if (!mysqli_query($con, $sql)) {
  die('Error: ' . mysqli_error($con));
}
//  }

mysqli_close($con);

?>