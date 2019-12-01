
<?php
$idproduct =  $_POST["idproduct"];
$name = $_POST["name"];
$quantity = $_POST["quantity"];
$price = $_POST["price"];

$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Create connection
$con=mysqli_connect("localhost","root","","cpsc471");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  if($uploadOk == 1){
	$sql = "INSERT INTO product (idproduct, name, quantity, price, image) VALUES ('". $idproduct."','". $name."','". $quantity ."','". $price ."','". $target_file ."')";  
  }
  
  else{
	$sql = "INSERT INTO product (idproduct, name, quantity, price) VALUES ('". $idproduct."','". $name."','". $quantity ."','". $price ."')";  
  }
 
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  
echo "1 record added";



mysqli_close($con);
?>

<a href="admin_view.php"> Go back to admin view <a/>