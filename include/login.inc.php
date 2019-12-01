

<?php
	include_once 'dbHandler.php';
	session_start();
	
	
	$user = $_POST['username'];
	$pass = $_POST['password'];

	$sql = "SELECT * FROM customer WHERE username=? 
			AND password=?;";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "SQL statement failed";
	}
	else{
		mysqli_stmt_bind_param($stmt, "ss", $user, $pass);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		
		$isLoginValid = false;
		while($row = mysqli_fetch_assoc($result)){
			$isLoginValid = true;
			$_SESSION['loggedInUser'] = $row;
		}
		
		if($isLoginValid == false){
			header("Location: ../login.php?login=fail");	
		}
		else{
			header("Location: ../customer_home.php?login=success");
		}
	}
	
?>
