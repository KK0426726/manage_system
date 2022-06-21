<?php
$thing_no=$_REQUEST['thing_no'];
$conn=mysqli_connect('localhost','six','123456','work');
$conn->query('SET NAMES UTF8');
$sql="DELETE FROM thing WHERE thing_no='$thing_no'";
$conn->query($sql);
header('Location:admin.php')
?>