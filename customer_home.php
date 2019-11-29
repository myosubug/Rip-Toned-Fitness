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
	
	
?>

<h3>Product list</h3>



<?php
    $sql = "SELECT * FROM product; ";
    $result = mysqli_query($conn, $sql);
?>

<?php while($product = mysqli_fetch_assoc($result)){ ?>
	<div>
		<img src = "<?php echo $product['image']; ?>">
		<h3><?php echo $product['name'] ?></h3>
		<h3><?php echo $product['price'] ?></h3>
		<a href = "addtocart.php?id=<?php echo $product[id]; ?> role="button">Add to Cart</a>
	</div>
<?php } ?>

</body>
</html>