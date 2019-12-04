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
			<a href = "view_messages_customer.php"> Messages </a>
			<div id = "branding">
                <a href = "customer_home.php"><h1><span class = "highlight">Rip Toned </span>Fitness LTD</h1></a>
			</div>
			<a href = "cart.php">View Cart</a>
			<a href = "orders.php">View Orders</a>
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
<h3>Orders</h3>
</div>

<?php 
	$sql = "SELECT * FROM myorder WHERE customerusername = ?;";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "SQL statement failed";
	}
	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);
	$orderresult = mysqli_stmt_get_result($stmt);
?>


<?php
	while($order = mysqli_fetch_assoc($orderresult)){
		$orderid = $order['idorder'];
		?> <div class = "welcome">
			<h3>Tracking ID: <?php echo $order['trackingid'] ?>     Order Date: <?php echo $order['orderdate'] ?>     Shipping Date: <?php echo $order['shippingdate'] ?> </h3>
		</div> <?php
		$sql2 = "SELECT * FROM product AS p, contains AS c WHERE c.idproduct = p.idproduct AND c.idorder = ?;";
		$stmt2 = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt2, $sql2)){
			echo "SQL statement failed";
		}
		mysqli_stmt_bind_param($stmt2, "i", $orderid);
		mysqli_stmt_execute($stmt2);
		$result = mysqli_stmt_get_result($stmt2);
		while($product = mysqli_fetch_assoc($result)){ ?>
			<div class = "product_thumbnail">
			<img src = "<?php echo $product['image']; ?>">
			<div class = "product_name">
				<h3><?php echo $product['name'] ?></h3>
			</div>
			<div class = "product_price">
				<h3>$<?php echo $product['price'] ?></h3>
			</div>
		</div>
		<?php 
		}
	}
?>



</body>
</html>