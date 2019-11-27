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
    <title>Test Shop</title>
</head>
<body>

<a href="login.php"> Login <a/>
<br>
<br>

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