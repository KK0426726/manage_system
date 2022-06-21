<?php
$conn=mysqli_connect('localhost','six','123456','work');
$conn->query('SET NAEMS UTF8');
session_start();
$nowuser_no=$_SESSION['user_no'];
$teach_no=$_REQUEST['teach_no'];
$sql="DELETE FROM `bm_".$teach_no."` WHERE user_no={$nowuser_no}";
if($conn->query($sql)){echo'取消中......';header('refresh:0.5,url=user_3_event_query.php');}
else{echo'取消报名失败';header('refresh:0.5,url=user_3_event_query.php');}
?>