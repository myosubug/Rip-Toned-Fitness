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
    <link rel="stylesheet" href="css/index_stylesheet.css">
</head>
<body>
<header>
    <div class = "container">
		<nav>
			<a href = "product.php">Products</a>
			<a href = "about.html">About</a>
			<a href = "contact.html">Contact</a>
			<div id = "branding">
                <a href = "index.php"><h1><span class = "highlight">Rip Toned </span>Fitness LTD</h1></a>
			</div>
			<a href = "login.php">Customer</a>
			<a href = "x.html">Employee</a>
			<a href = "admin_login.php">Admin</a>
        </nav>
    </div>
</header>


<h3>Product list</h3>



<?php
    $sql = "SELECT quantity, name, price FROM product; ";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        echo "<table border='1'>
                <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                </tr>";

            while ($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                //echo "<td><a href='update.php?ID= " . $row['ID'] . "'>Update</a></td>";
                //echo "<td><a onClick= \"return confirm('Do you want to delete this user?')\" href='view.php?job=delete&amp;ID= " . $row['ID'] . "'>DELETE</a></td>";
                echo "</tr>";
            }
            echo "</table>";
    }
    mysqli_close($conn);
?>
    
	


<!-- to connect to db from html file after include dbHandler.php, we just need to use "$conn;" -->
<!-- example of selecting data from db-->

</body>
</html>