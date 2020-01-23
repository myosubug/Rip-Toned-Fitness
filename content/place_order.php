<?php
    include_once 'include/dbHandler.php';
?>

<?php
	session_start();
	$myUser = $_SESSION['loggedInUser'];
	$username = $myUser['username'];
	
?>

<?php 
	$sql = "SELECT MAX(idorder) AS maxorderid FROM myorder; ";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 0) { 
		$orderid = 1000;
	}
	else{
		$maxOrderArray = mysqli_fetch_assoc($result);
		$maxOrder = $maxOrderArray['maxorderid'];
		$orderid = $maxOrder + 1;
	}
	echo $orderid;
?>

<?php 
	$sql = "SELECT couriername FROM courier;";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "SQL statement failed";
	}
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	$courierNameArray = mysqli_fetch_assoc($result);
	$couriername = $courierNameArray['couriername'];
?>

<?php 
	$sql = "INSERT INTO myorder (idorder, couriername, customerusername, orderdate, shippingdate,
			trackingid) VALUES (?, ?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "SQL statement failed";
	}
	else{
		echo $orderid;
		$orderdate = date("Y/m/d");
		$shippingdate = $orderdate;
		mysqli_stmt_bind_param($stmt, "issssi", $orderid, $couriername, $username, $orderdate, $shippingdate, $orderid);
		if(mysqli_stmt_execute($stmt)){
			echo "success";
		}
	}
	
?>

<?php
    $sql = "SELECT * FROM productfills WHERE customerusername = ?; ";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "SQL statement failed";
	}
	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	while($productFillsArray = mysqli_fetch_assoc($result)){
		$productid = $productFillsArray['productid'];
		$sql2 = " INSERT INTO contains (idorder, idproduct) VALUES (?, ?);";
		$stmt2 = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt2, $sql2)){
			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt2, "ii", $orderid, $productid);
			if(mysqli_stmt_execute($stmt2)){
				echo "success2";
			}
		}
	}
?>

<?php
	$sql = "UPDATE product SET quantity = quantity - 1 WHERE idproduct = ? and quantity > 0;";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "SQL statement failed";
	}
	mysqli_stmt_bind_param($stmt, "i", $productid);
	mysqli_stmt_execute($stmt);
?>

<?php
	$sql = "DELETE FROM productfills WHERE customerusername = ?; ";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "SQL statement failed";
	}
	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);
	
	$setPriceSQL = "UPDATE cart SET totalprice = 0 WHERE customerusername = ?;";
	$setPriceStmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($setPriceStmt, $setPriceSQL)){
		echo "set price statement failed";
	}
	else{
		mysqli_stmt_bind_param($setPriceStmt, "s", $username);
		mysqli_stmt_execute($setPriceStmt);
	}
	
	header('location: orders.php?status=placed');
?>




