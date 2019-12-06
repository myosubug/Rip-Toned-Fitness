
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
  
  $sql = "INSERT INTO employee (username, firstname, lastname, email, adminusername, password) VALUES (?,?,?,?,?,?);";
  
 
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "SQL statement failed";
	}
	else{		
		mysqli_stmt_bind_param($stmt, "ssssss", $username, $firstname, $lastname, $email, $adminusername, $password);
		mysqli_stmt_execute($stmt);
	}
  
echo "1 record added";



mysqli_close($con);
?>

<a href="admin_view.php"> Go back to admin view <a/>