<?php

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

  /*foreach ( $_POST as $key) {
    if(!$isset($key)) {
        $form_filled = false;
    }
  } */

 // if($form_filled) {
    $sql = "INSERT INTO master_user (User_id,Email_address,Display_name,User_address,Phone_number,User_password) 
                VALUES (rand(),'$email','$dname','$address','$phone','$pass')";
    
    
    if (!mysqli_query($con,$sql))
    {
    die('Error: ' . mysqli_error($con));
    }
 //  }
  
echo "1 record added";

mysqli_close($con);
?>




?>