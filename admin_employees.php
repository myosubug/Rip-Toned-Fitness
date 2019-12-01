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
    $sql = "SELECT username, firstname, lastname, email FROM employee; ";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        echo "<table class = 'center'>
                <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>User Name</th>
                </tr>";

            while ($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['firstname'] . "</td>";
                echo "<td>" . $row['lastname'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                //echo "<td><a href='update_product.php?ID= " . $row['ID'] . "'>Update</a></td>";
                //echo "<td><a onClick= \"return confirm('Do you want to delete this user?')\" href='view.php?job=delete&amp;ID= " . $row['ID'] . "'>DELETE</a></td>";
                echo "</tr>";
            }
            echo "</table>";
    }
    
?>
<br>
<br>

<form action="add_employee.php?job=post" method="post">
	<input type="text" name="username" required placeholder = "Employee username"><br>
   <input type="text" name="firstname" required placeholder = "Employee first name"><br>
   <input type="text" name="lastname" required placeholder = "Employee last name"><br>
   <input type="text" name="email" required placeholder = "Employee email"><br>
   <input type="text" name="adminusername" required placeholder = "Employee supervisor"><br>
   <input type="text" name="password" required placeholder = "Employee password"><br>
   <input type="submit" value="Add employee">
</form>

<br>

<form action="delete_employee.php?job=post" method="post">
   <input type="text" name="username" required placeholder = "Employee username"><br>
   <input type="submit" value="Delete Employee">
</form>
</div>

</body>
</html>