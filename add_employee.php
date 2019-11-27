
<?php
$username =  $_POST["username"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$adminusername = $_POST["adminusername"];
$password = $_POST["password"];

// Create connection
$con=mysqli_connect("localhost","root","","cpsc471");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $sql = "INSERT INTO employee (username, firstname, lastname, email, adminusername, password) VALUES ('". $username."','". $firstname."','". $lastname."','". $email ."','". $adminusername ."','". $password ."')";
 
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  
echo "1 record added";



mysqli_close($con);
?>

<a href="admin_view.php"> Go back to admin view <a/>