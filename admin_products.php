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
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<header>
    <div class = "container">
		<nav>
			<a href = "admin_products.php">Products</a>
			<a href = "admin_customers.php">Customers</a>
			<a href = "admin_suppliers.php">Suppliers</a>
			<div id = "branding">
                <a href = "admin_view.php"><h1><span class = "highlight">Rip Toned </span>Fitness LTD</h1></a>
			</div>
			<a href = "admin_couriers.php">Couriers</a>
			<a href = "admin_employees.php">Employees</a>
			<a href = "admin_messages.php">Messages</a>	
			<a href = "index.php">Signout</a>
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
		<h3>id: <?php echo $product['idproduct'] ?> amt: <?php echo $product['quantity'] ?></h3>
		<div class = "product_price">
			<h3>$<?php echo $product['price'] ?></h3>
		</div>
	</div>
<?php } ?>

<h3 style = "text-align: center">Add a product</h3>
    
<form action="add_product.php?job=post" method="post" enctype="multipart/form-data">
  <input type="text" name="idproduct" required placeholder = "Product ID"><br>
  <input type="text" name="name" required placeholder = "Product Name"><br>
  <input type="text" name="quantity" required placeholder = "Product Quantity"><br>
  <input type="text" name="price" required placeholder = "Product Price"><br>
  <input type="file" name="fileToUpload" id="fileToUpload"><br>
   <input type="submit" value="Add product">
</form>

<form action="delete_product.php?job=post" method="post">
   <input type="text" name="idproduct" required placeholder = "Product ID"><br>
   <input type="submit" value="Delete Product">
</form>
<!-- to connect to db from html file after include dbHandler.php, we just need to use "$conn;" -->
<!-- example of selecting data from db-->

</body>
</html>