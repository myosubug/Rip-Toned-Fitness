<?php
    include_once 'include/dbHandler.php';
?>

<?php
	session_start();
	if(isset($_GET['idproduct']) & !empty($_GET['idproduct'])){
		$itemid = $_GET['idproduct'];
		$myUser = $_SESSION['loggedInUser'];
		$username = $myUser['username'];
		
		$priceSql = "SELECT price FROM product WHERE idproduct = ?;";
		$priceStmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($priceStmt, $priceSql);
		mysqli_stmt_bind_param($priceStmt, "i", $itemid);
		mysqli_stmt_execute($priceStmt);
		$result = mysqli_stmt_get_result($priceStmt);
		$priceArray = mysqli_fetch_assoc($result);
		$price = $priceArray['price'];
		
		echo $itemid;
		echo $username;
		echo $price;
		
		$getPriceSql = "SELECT totalprice FROM cart WHERE customerusername = ?;";
		$getPriceStmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($getPriceStmt, $getPriceSql)){
			echo "get price statement failed";
		}
		else{
			mysqli_stmt_bind_param($getPriceStmt, "s", $username);
			mysqli_stmt_execute($getPriceStmt);
			$result = mysqli_stmt_get_result($getPriceStmt);
			$priceArray = mysqli_fetch_assoc($result);
			$totalPrice = $priceArray['totalprice'];
			$totalPrice -= $price;
			$setPriceSQL = "UPDATE cart SET totalprice = ? WHERE customerusername = ?;";
			$setPriceStmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($setPriceStmt, $setPriceSQL)){
				echo "set price statement failed";
			}
			else{
				mysqli_stmt_bind_param($setPriceStmt, "is", $totalPrice, $username);
				mysqli_stmt_execute($setPriceStmt);
			}
		}
		
		$sql = "DELETE FROM productfills WHERE customerusername = ? and productid = ?;";
		
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "si", $username, $itemid);
			if(mysqli_stmt_execute($stmt)){
				header("Location: cart.php?status=success");	
			}
			else{
				header("Location: cart.php?status=sqlfailed");	
			}
		}
	}
	else{
		header('location: cart.php?status=failed');
	}
?>