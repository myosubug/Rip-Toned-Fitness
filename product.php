<!-- connecting db with html file-->
<?php
    include_once 'include/dbHandler.php';
?>

<!-- html from here-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rip Toned Fitness LTD | Welcome</title>
    <link rel="stylesheet" href="css/customer_home.css">
</head>
<body>
<header>
    <div class = "container">
		<nav>
			<a href = "product.php">Products</a>
			<a href = "about.php">About</a>
			<a href = "contact.php">Contact</a>
			<div id = "branding">
                <a href = "index.php"><h1><span class = "highlight">Rip Toned </span>Fitness LTD</h1></a>
			</div>
			<a href = "login.php">Customer</a>
			<a href = "employee_login.php">Employee</a>
			<a href = "admin_login.php">Admin</a>
        </nav>
    </div>
</header>


<h3 style = "text-align: center">Product list</h3>

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
	</div>
<?php } ?>
    
	


<!-- to connect to db from html file after include dbHandler.php, we just need to use "$conn;" -->
<!-- example of selecting data from db-->

</body>
</html>