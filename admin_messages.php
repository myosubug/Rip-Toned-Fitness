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

<?php
	session_start();
	$myUser = $_SESSION['loggedInUser'];	

    $sql = "SELECT * FROM timestamp WHERE sender != 'riptonedsupport';";
    $result = mysqli_query($conn, $sql);
	
	if(!$result) {
		echo "You have no messages.";
	} else {
	
		$resultCheck = mysqli_num_rows($result);
	
		if ($resultCheck > 0) {
	
			echo "<table class = 'center'>
				<tr>
				<th>Date</th>
				<th>Customer Username</th>
				<th>Message</th>
				</tr>";

            while ($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['sender'] . "</td>";
                echo "<td>" . $row['messagecontent'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
		}
	}
    mysqli_close($conn);
?>

<form action="include/employee_send_message.inc.php" method="POST">
	<div>
		<input type="text" name="username" required placeholder="Customer Username">
	</div>
	<div>
		<textarea name = "message" required placeholder = "Reply (256 character max)" rows = "5" cols = "100" maxlength = "255"></textarea>
	</div>
	<div>
		<button type="submit" name="submit">Send message</button>
	</div>
</form>

</body>
</html>