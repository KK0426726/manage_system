<?php
$user_no=$_REQUEST['user_no'];
$conn=mysqli_connect('localhost','six','123456','work');
$conn->query('SET NAMES UTF8');
$sql="DELETE FROM stu WHERE user_no='$user_no'";
$result=mysqli_query($conn,$sql);
if($result){
    header('Location:admin_3_user_manage.php');
}
else{
    echo "删除失败";
    header('Refresh: 0.5; url=admin_3_user_manage.php');
}
?>