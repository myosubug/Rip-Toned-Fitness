<?php
    include_once 'include/dbHandler.php';
?>

<?php
	session_start();
	if(isset($_GET['idproduct']) & !empty($_GET['idproduct'])){
		$itemid = $_GET['idproduct'];
		$myUser = $_SESSION['loggedInUser'];
		$username = $myUser['username'];
		echo $itemid;
		echo $username;
		
		$sql = "INSERT INTO productfills (customerusername, productid) VALUES (?, ?);";
		
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "si", $username, $itemid);
			if(mysqli_stmt_execute($stmt)){
				header("Location: customer_home.php?status=success");	
			}
			else{
				header("Location: customer_home.php?status=sqlfailed");	
			}
		}
	}
	else{
		header('location: customer_home.php?status=failed');
	}
?>