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
			<a href = "x.html">About</a>
			<a href = "contact.html">Contact</a>
			<div id = "branding">
                <a href = "index.php"><h1><span class = "highlight">Rip Toned </span>Fitness LTD</h1></a>
			</div>
			<a href = "login.php">Customer</a>
			<a href = "x.html">Employee</a>
			<a href = "x.html">Admin</a>
        </nav>
    </div>
</header>

	
<section id = "showcase">
    <div class="container">
    </div>
</section>

<!-- to connect to db from html file after include dbHandler.php, we just need to use "$conn;" -->
<!-- example of selecting data from db-->

</body>
</html>