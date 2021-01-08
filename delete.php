<?php
include_once 'dbconnect.php';
$id = $_GET['id'];
$q = "delete from files where id= $id";
mysqli_query($con,$q);
header('location:index.php');
?>