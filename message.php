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
  
  $sql = "INSERT INTO timestamp (customerusername, messagecontent) VALUES (?,?);";
 
$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "SQL statement failed";
	}
	else{		
		mysqli_stmt_bind_param($stmt, "ss", $username, $messagecontent);
		mysqli_stmt_execute($stmt);
	}	
  
echo "message sent!";

mysqli_close($con);
?>

<a href="index.php"> Go back to main page <a/>