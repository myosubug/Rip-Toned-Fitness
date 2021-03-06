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

<form action="include/login.inc.php" method="POST">
	<div>
		<input type="text" name="username" required placeholder="username">
	</div>
	<div>
		<input type="password" name="password" required placeholder="password">
	</div>
	<div>
		<button type="submit" name="submit">Login</button>
	</div>
</form>

<div class = "register">
	<a href="customer_registration.php"> Not a customer? Sign up now! </a>
</div>

</body>
</html>