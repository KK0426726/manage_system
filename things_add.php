<?php
$conn=mysqli_connect('localhost','six','123456','work');
$conn->query('SET NAMES UTF8');
$thing=$_POST['things'];
$sqla="SELECT COUNT(*) FROM thing";
$resu=mysqli_query($conn,$sqla);
$data=mysqli_fetch_row($resu);
$num=$data[0];
$sqll="SELECT thing_no FROM thing ORDER BY thing_no DESC";
$re=mysqli_query($conn,$sqll);
$result=mysqli_fetch_row($re); 
$qq=$result[0]+1;
$sql="INSERT INTO thing VALUES ('{$thing}','{$qq}')";
 if($conn->query($sql)){header('Location:admin.php');}
else{echo '发布失败'; header('refresh:0.5,url=admin.php');} 
?>