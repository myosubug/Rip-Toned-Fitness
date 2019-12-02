<?php
    include_once 'include/dbHandler.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rip Toned Fitness LTD | Login</title>
    <link rel="stylesheet" href="css/customer_home.css">
</head>
<body>

<header>
    <div class = "container">
		<nav>
			<a href = "customer_home.php">Products</a>
			<a href = "view_messages.php"> Messages </a>
			<div id = "branding">
                <a href = "customer_home.php"><h1><span class = "highlight">Rip Toned </span>Fitness LTD</h1></a>
			</div>
			<a href = "cart.php">View Cart</a>
			<a href = "index.php">Sign Out</a>
        </nav>
    </div>
</header>

<?php
	session_start();
	$myUser = $_SESSION['loggedInUser'];
	$username = $myUser['username'];
	
?>
<div class = "welcome">
<h3>Cart</h3>
</div>


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
	 <div class = "product_thumbnail">
		<img src = "<?php echo $product['image']; ?>">
		<div class = "product_name">
			<h3><?php echo $product['name'] ?></h3>
		</div>
		<div class = "product_price">
			<h3>$<?php echo $product['price'] ?></h3>
		</div>
		<a href = "removefromcart.php?idproduct=<?php echo $product['idproduct']; ?> role="button">Remove From Cart</a>
	</div>
<?php } ?>

<?php
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
		?>
		<div class = "welcome">
			<h3>Total: $<?php echo $totalPrice; ?> </h3>
		</div>
		<?php
	}
?>

</body>
</html>