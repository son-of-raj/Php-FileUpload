<?php
//connect mysql database
$host = "localhost";
$user = "root";
$pass = "root";
$db = "crud";
$con = mysqli_connect($host, $user, $pass, $db) or die("Error " . mysqli_error($con));
?>