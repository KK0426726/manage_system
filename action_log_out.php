<?php
$conn=mysqli_connect('localhost','six','123456','work');
$conn->query("SET NAMES UTF8");
session_start();
unset($_SESSION['user_no']);
$_SESSION['user_no']="";
header('Location:mainpage.php');
?>