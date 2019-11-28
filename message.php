<?php
$username =  $_POST["username"];
$messagecontent = $_POST["messagecontent"];

// Create connection
$con=mysqli_connect("localhost","root","","cpsc471");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $sql = "INSERT INTO timestamp (customerusername, messagecontent) VALUES ('". $username."','". $messagecontent ."')";
 
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  
echo "message sent!";

mysqli_close($con);
?>

<a href="index.php"> Go back to main page <a/>