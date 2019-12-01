<?php
    include_once 'include/dbHandler.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
	session_start();
	$myUser = $_SESSION['loggedInUser'];
	echo $myUser['email'];
	echo $myUser['username'];
	$username = $myUser['username'];
	
?>

<h3>Cart</h3>



<?php
    $sql = "SELECT * FROM product AS p, productfills AS pf WHERE pf.productid = p.idproduct AND pf.customerusername = ?;";
    $stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "SQL statement failed";
	}
	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
?>

<?php while($product = mysqli_fetch_assoc($result)){ ?>
	<div>
		<img src = "<?php echo $product['image']; ?>">
		<h3><?php echo $product['name'] ?></h3>
		<h3><?php echo $product['price'] ?></h3>
	</div>
<?php } ?>

</body>
</html>