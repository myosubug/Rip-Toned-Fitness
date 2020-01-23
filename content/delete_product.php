
<?php
$idproduct =  $_POST["idproduct"];


// Create connection
$con=mysqli_connect("localhost","root","","cpsc471");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$sql = "DELETE FROM product WHERE idproduct= ?;";
 
 $stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "SQL statement failed";
	}
	else{		
		mysqli_stmt_bind_param($stmt, "i", $idproduct);
		mysqli_stmt_execute($stmt);
		echo "1 record removerd";
	}	
  




mysqli_close($con);
?>

<a href="admin_view.php"> Go back to admin view <a/>

