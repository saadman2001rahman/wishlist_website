<?php

$canInsert = 0;

$dname = $_POST["display_name"];
$pass = $_POST["password"];
$email = $_POST["email"];
$address = $_POST["address"];
$phone = $_POST["phone_number"];

// Create connection
$con=mysqli_connect("localhost","root","","wishlist_website");

// Check connection
if (!$con)
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $form_filled = true;
  
  // Ensures random number for user_id isn't in use in sql database already 
  $rand = rand(0,9999999);
  while($canInsert == 0) {
    $rand = rand(0,9999999);
    $result = mysqli_query($con," SELECT User_id FROM master_user WHERE User_id = '$rand'");
    if($result !== false) {
      if(mysqli_num_rows($result) == 0) {
        $canInsert = 1;
      } else {
        $rand = rand(0,9999999);
      }
    } else {
      echo 'Error in query: ' . mysqli_error($con);
      die();
    }
  }
  /*foreach ( $_POST as $key) {
    if(!$isset($key)) {
        $form_filled = false;
    }
  } */

 // if($form_filled) {
    $sql = "INSERT INTO master_user (User_id,Email_address,Display_name,User_address,Phone_number,User_password) 
                VALUES ($rand,'$email','$dname','$address','$phone','$pass')";
    
    
    if (!mysqli_query($con,$sql))
    {
    die('Error: ' . mysqli_error($con));
    }
 //  }
  
echo "1 record added";

mysqli_close($con);
?>




?>