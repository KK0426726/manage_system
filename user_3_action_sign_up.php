<?php
$conn=mysqli_connect('localhost','six','123456','work');
$conn->query('SET NAMES UTF8');
session_start();
$nowuser_no=$_SESSION['user_no'];
$teach_no=$_REQUEST['teach_no'];
$sql="SELECT pname FROM baoming WHERE teach_no=$teach_no";
$qli="SELECT name FROM stu WHERE user_no=$nowuser_no";
$re=mysqli_query($conn,$sql);
$result=mysqli_query($conn,$qli);
$sqll=mysqli_fetch_row($re);
$qlii=mysqli_fetch_row($result);
$sq="INSERT INTO `bm_".$teach_no."` VALUES ('$sqll[0]','$nowuser_no','$qlii[0]')";
if($conn->query($sq)){echo"报名中......";header('refresh:0.5,url=user_3_event_query.php');}
else{echo "报名失败";header('refresh:0.5,usl=user_3_event_query.php');}
?>