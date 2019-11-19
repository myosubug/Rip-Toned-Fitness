<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="include/customer_registration.inc.php" method="POST">
	<input type="text" name="username" required placeholder="username">
	<input type="text" name="password" required placeholder="password">
	<input type="text" name="email" required placeholder="email">
	<input type="text" name="province" required placeholder="province">
	<input type="text" name="country" required placeholder="country">
	<input type="text" name="city" required placeholder="city">
	<input type="text" name="unitnumber" required placeholder="unit number">
	<input type="text" name="streetname" required placeholder="street name">
	<button type="submit" name="submit">Register</button>
</form>

</body>
</html>