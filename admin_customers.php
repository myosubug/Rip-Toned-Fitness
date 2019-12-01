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

    $sql = "SELECT * FROM customer;";
    $result = mysqli_query($conn, $sql);

	$resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
	
        echo "<table class = 'center'>
                <tr>
                <th>Customer Username</th>
                <th>Customer email</th>
                </tr>";

            while ($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
    }
    mysqli_close($conn);
?>

</body>
</html>