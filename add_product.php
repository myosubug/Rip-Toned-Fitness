
<?php
$idproduct =  $_POST["idproduct"];
$name = $_POST["name"];
$quantity = $_POST["quantity"];
$price = $_POST["price"];

// Create connection
$con=mysqli_connect("localhost","root","","cpsc471");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $sql = "INSERT INTO product (idproduct, name, quantity, price) VALUES ('". $idproduct."','". $name."','". $quantity ."','". $price ."')";
 
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  
echo "1 record added";



mysqli_close($con);
?>

<a href="admin_view.php"> Go back to admin view <a/>