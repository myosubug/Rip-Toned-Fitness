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
    <title>Test shop</title>
</head>
<body>


<!-- to connect to db from html file after include dbHandler.php, we just need to use "$conn;" -->
<!-- example of selecting data from db-->
<div style="float: left;">
<h3>Product list</h3>

<?php
    $sql = "SELECT idproduct, quantity, name, price FROM product; ";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        echo "<table border='1'>
                <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                </tr>";

            while ($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['idproduct'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
    }
    
?>
<br>
<br>
<form action="add_product.php?job=post" method="post">
   Product ID: <input type="text" name="idproduct"><br>
   Name: <input type="text" name="name"><br>
   Quantitiy: <input type="text" name="quantity"><br>
   Price: <input type="text" name="price"><br>
   <input type="submit" value="Add product">
</form>

<br>

<form action="delete_product.php?job=post" method="post">
   Product ID: <input type="text" name="idproduct"><br>
   <input type="submit" value="Delete product">
</form>



<br>
<br>
<h3>Employee list</h3>


<?php
    $sql = "SELECT username, firstname, lastname, email FROM employee; ";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        echo "<table border='1'>
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
   Employee Username: <input type="text" name="username"><br>
   First Name: <input type="text" name="firstname"><br>
   Last Nmae: <input type="text" name="lastname"><br>
   Email: <input type="text" name="email"><br>
   Supervisor: <input type="text" name="adminusername"><br>
   Password: <input type="text" name="password"><br>
   <input type="submit" value="Add employee">
</form>

<br>

<form action="delete_employee.php?job=post" method="post">
   Employee Username: <input type="text" name="username"><br>
   <input type="submit" value="Delete Employee">
</form>
</div>
<br>
<br>
<div style="float: left;">
<h3>Customer list</h3>

<?php
    $sql = "SELECT username, email FROM customer; ";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        echo "<table border='1'>
                <tr>
                <th>User Name</th>
                <th>Email</th>
                </tr>";

            while ($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                //echo "<td><a href='update_product.php?ID= " . $row['ID'] . "'>Update</a></td>";
                //echo "<td><a onClick= \"return confirm('Do you want to delete this user?')\" href='view.php?job=delete&amp;ID= " . $row['ID'] . "'>DELETE</a></td>";
                echo "</tr>";
            }
            echo "</table>";
    }
    
?>

<h3>Supplier list</h3>


<?php
    $sql = "SELECT name, city, phonenumber FROM supplier; ";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        echo "<table border='1'>
                <tr>
                <th>Supplier Name</th>
                <th>City</th>
                <th>Phone Number</th>
                </tr>";

            while ($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['phonenumber'] . "</td>";
                echo "<td>" . $row['city'] . "</td>";
                //echo "<td><a href='update_product.php?ID= " . $row['ID'] . "'>Update</a></td>";
                //echo "<td><a onClick= \"return confirm('Do you want to delete this user?')\" href='view.php?job=delete&amp;ID= " . $row['ID'] . "'>DELETE</a></td>";
                echo "</tr>";
            }
            echo "</table>";
    }
    
?>



<h3>Courier list</h3>


<?php
    $sql = "SELECT couriername, phonenumber FROM courier; ";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        echo "<table border='1'>
                <tr>
                <th>Courier Name</th>
                <th>Phone Number</th>
                </tr>";

            while ($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['couriername'] . "</td>";
                echo "<td>" . $row['phonenumber'] . "</td>";
                //echo "<td><a href='update.php?ID= " . $row['ID'] . "'>Update</a></td>";
                //echo "<td><a onClick= \"return confirm('Do you want to delete this user?')\" href='view.php?job=delete&amp;ID= " . $row['ID'] . "'>DELETE</a></td>";
                echo "</tr>";
            }
            echo "</table>";
    }
    mysqli_close($conn);
?>
</div>
</body>
</html>