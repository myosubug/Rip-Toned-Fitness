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
<a href="product.php"> Product list <a/>

<!-- to connect to db from html file after include dbHandler.php, we just need to use "$conn;" -->
<!-- example of selecting data from db-->

</body>
</html>