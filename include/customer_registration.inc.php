<?php
	include_once 'dbHandler.php';
	
	
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$email = $_POST['email'];
	$province = $_POST['province'];
	$country = $_POST['country'];
	$city = $_POST['city'];
	$unitnumber = $_POST['unitnumber'];
	$streetname = $_POST['streetname'];

	$sql = "INSERT INTO customer (username, password, email, province, country,
			city, unitnumber, streetname) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "SQL statement failed";
	}
	else{
		mysqli_stmt_bind_param($stmt, "ssssssis", $user, $pass, $email, $province, $country,
								$city, $unitnumber, $streetname);
		if(mysqli_stmt_execute($stmt)){
			$cartSql = "INSERT INTO cart (customerusername, totalprice) VALUES (?, ?);";
			$cartStmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($cartStmt, $cartSql)){
				echo "SQL statement failed";
			}
			else{
				$zero = 0.0;
				mysqli_stmt_bind_param($cartStmt, "sd", $user, $zero);
			}
			if(mysqli_stmt_execute($cartStmt)){
				header("Location: ../registration_success.php?Registration=success");	
			}	
			else{
				header("Location: ../registration_failure.php?Registration=failure");	
			}
		}
		else{
			header("Location: ../registration_failure.php?Registration=failure");	
		}
	}
	
?>