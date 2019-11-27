
<?php
$username =  $_POST["username"];


// Create connection
$con=mysqli_connect("localhost","root","","cpsc471");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$sql = "DELETE FROM employee WHERE username='$username'";
 
 if (mysqli_query($con,$sql)){
    echo "1 record deleted";
} else {
    die('Error: ' . mysqli_error($con));
}
  




mysqli_close($con);
?>

<a href="admin_view.php"> Go back to admin view <a/>