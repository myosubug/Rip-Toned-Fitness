<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rip Toned Fitness LTD | Login</title>
    <link rel="stylesheet" href="css/login.css">
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



<form action="include/customer_registration.inc.php" method="POST">
	<div><input type="text" name="username" required placeholder="username">
	<input type="text" name="password" required placeholder="password">
	<input type="text" name="email" required placeholder="email"></div>
	<div><h3></h3></div>
	<div><input type="text" name="city" required placeholder="city">
	<input type="text" name="province" required placeholder="province">
	<input type="text" name="country" required placeholder="country"></div>
	<div><h3></h3></div>
	<div><input type="text" name="unitnumber" required placeholder="unit number">
	<input type="text" name="streetname" required placeholder="street name"></div>
	<div><h3></h3></div>
	<div><button type="submit" name="submit">Register</button></div>
</form>

</body>
</html>