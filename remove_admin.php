<?php
$conn=mysqli_connect('localhost','six','123456','work');
$conn->query("SET NAMES UTF8");
$user_no=$_REQUEST['user_no'];
$sq="DELETE FROM gly WHERE name='$user_no'";
mysqli_query($conn,$sq);
 header('Location:admin_2_add_admin.php'); 
 ?>