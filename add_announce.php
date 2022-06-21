<?php
$thing_no=$_POST['thing_no'];
$power=$_POST['power'];
$conn=mysqli_connect('localhost','six','123456','work');
$conn->query('SET NAMES UTF8');
$sql="UPDATE thing SET power='{$power}' WHERE thing_no='{$thing_no}'";
$conn->query($sql);
header('Location:admin.php');
?>