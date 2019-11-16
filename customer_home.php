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


</body>
</html>