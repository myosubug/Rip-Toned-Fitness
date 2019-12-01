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
    <h3>Customer list</h3>

    <?php
        $sql = "SELECT username, email FROM customer; ";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            echo "<table border='1'>
                    <tr>
                    <th>Email</th>
                    <th>User Name</th>
                    </tr>";

                while ($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
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
                    <th>Phone Number</th>
                    <th>City</th>
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
</div>

<div style="float: left;">
<h3>Current order list</h3>

<?php
    $sql = "SELECT idorder, orderdate, couriername, customerusername, shippingdate, trackingid FROM `order`; ";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        echo "<table border='1'>
                <tr>
                <th>Orer ID</th>
                <th>Courier Name</th>
                <th>Customer Username</th>
                <th>Order Date</th>
                <th>Shipping Date</th>
                <th>Tracking ID</th>
                </tr>";

            while ($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['idorder'] . "</td>";
                echo "<td>" . $row['couriername'] . "</td>";
                echo "<td>" . $row['customerusername'] . "</td>";
                echo "<td>" . $row['orderdate'] . "</td>";
                echo "<td>" . $row['shippingdate'] . "</td>";
                echo "<td>" . $row['trackingid'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
    }
    
?>

    <br>
    <br>
    <h3>Messages from customers</h3>


    <?php
        $sql = "SELECT customerusername, messagecontent FROM timestamp; ";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            echo "<table border='1'>
                    <tr>
                    <th>User Name</th>
                    <th>Message</th>
                    </tr>";

                while ($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" . $row['customerusername'] . "</td>";
                    echo "<td>" . $row['messagecontent'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
        }
        
    ?>

    <br>
    <br>


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
                    echo "</tr>";
                }
                echo "</table>";
        }
        mysqli_close($conn);
    ?>

<a href="index.php"> Go back to main <a/>
</div>
</body>
</html>