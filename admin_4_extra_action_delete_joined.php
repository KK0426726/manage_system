<?php
$conn=mysqli_connect('localhost','six','123456','work');
$conn->query('SET NAEMS UTF8');
$user_no=$_REQUEST['user_no'];
$teach_no=$_REQUEST['teach_no'];
$sql="DELETE FROM `bm_".$teach_no."` WHERE user_no='$user_no'";
$result=mysqli_query($conn,$sql);
if($result){header('location:admin_4_event_manage.php');}
else {echo "删除失败";  header('refresh:0.5,url=admin_4_event_manage.php');}
?>