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
?>

<div class = "welcome">
	<h3>Welcome <?php echo $myUser['username']; ?>!</h3>
</div>



<?php
    $sql = "SELECT * FROM product; ";
    $result = mysqli_query($conn, $sql);
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
		<?php
			if($product['quantity'] > 0){
				?><a href = "addtocart.php?idproduct=<?php echo $product['idproduct'];?> role="button">Add to Cart</a><?php
			}
			else{
				?><a href = "customer_home.php">Out Of Stock</a><?php
			}
		?>
	</div>
<?php } ?>

</body>
</html>