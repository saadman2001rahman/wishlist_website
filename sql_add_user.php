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
  if (empty($value)) {
    $form_filled = false;
  }
}

//If the entire form isn't filled out close sql connection and inform user
if (!$form_filled) {
  mysqli_close($con);
  die('Missing one or more values in form!');
}

$user = " SELECT User_id FROM master_user WHERE User_id = ?";
$stmt = mysqli_prepare($con, $user);

mysqli_stmt_bind_param($stmt, "s", $uname);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

mysqli_stmt_close($stmt);


//Checks to see if username is unique, and inserts into databse if true and closes sql connection if not
if ($result->num_rows == 0) {
  $sql = "INSERT INTO master_user (User_id,Email_address,Display_name,User_address,Phone_number,User_password) 
              VALUES (?,?,?,?,?,?)";
  $stmt = mysqli_prepare($con, $sql);

  mysqli_stmt_bind_param($stmt, "ssssis", $uname, $email, $dname, $address, $phone, $pass);

  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  mysqli_stmt_close($stmt);

} else {
  mysqli_close($con);
  die('Username already taken, choose another one!');
}


// if (!mysqli_query($con, $sql)) {
//   die('Error: ' . mysqli_error($con));
// }

// mysqli_close($con);

// $con = mysqli_connect("localhost", "root", "", "wishlist_website");
// if (!$con) {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }


//this code is so that when a new user is created, a new basket is also created 
$caninsert = 0;
$tryid = rand(0, 9999999);
while ($caninsert == 0) {
  // $tryid = rand(0, 99999999);
  $result = mysqli_query($con, "SELECT Basket_id FROM Basket WHERE Basket_id = '$tryid'");
  if ($result !== false) {
    if (mysqli_num_rows($result) == 0) {
      $caninsert = 1;
    } else {
      $tryid = rand(0, 9999999);
    }
  } else {
    echo 'Error in query: ' . mysqli_error($con);
    die();
  }
}


//make new master user
// if (!mysqli_query($con, $sql)) {
//   die('Error: ' . mysqli_error($con));
// }

//make new end user
$sql2 = "INSERT INTO end_user (User_id, Name) 
VALUES ('$uname','$dname')";

if (!mysqli_query($con, $sql2)) {
  die('Error: ' . mysqli_error($con));
}


//make basket for end user
$sql3 = "INSERT INTO Basket (Basket_id,User_id,Basket_value) 
VALUES ('$tryid','$uname','0')";

if (!mysqli_query($con, $sql3)) {
  die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header("Location: login.php");

?>