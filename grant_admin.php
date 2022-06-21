<?php
$conn=mysqli_connect('localhost','six','123456','work');
$conn->query("SET NAMES UTF8");
$user_no=$_REQUEST['user_no'];
$sq="SELECT password FROM stu WHERE user_no='$user_no'";
$result=mysqli_query($conn,$sq);
$data=mysqli_fetch_row($result);
$password=$data[0];
$sqll="SELECT password FROM stu WHERE user_no='$user_no'";
$results=mysqli_query($conn,$sqll);
$datas=mysqli_fetch_row($results);
$email=$datas[0];
$sql="INSERT INTO gly VALUES ('$user_no','$password','$email')";
mysqli_query($conn,$sql);
 header('Location:admin_2_add_admin.php'); 
?>