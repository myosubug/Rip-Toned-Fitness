<?php

$dbServerName = "localhost";
$dbUserName = "root"; //if I am using XAMPP, the default username is "root"
$dbPassWord = ""; //if I am using XAMPP, the default password is ""
$dbName = "cpsc471"; //db name for my version of phpmyadmin

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassWord, $dbName); //connection requires these 4 variables in order


?>