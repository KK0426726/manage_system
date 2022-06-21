<meta charset="utf-8">
<?php
$conn=mysqli_connect('localhost','six','123456','work');
$conn->query("SET NAMES UTF8");
$user_no=$_POST['user_no'];
$password=$_POST['password'];
$name=$_POST['username'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$class=$_POST['class'];
$scl=$_POST['scl'];
$sex=$_POST['gender'];
$sql="SELECT * FROM stu WHERE user_no='{$user_no}'";
$result=mysqli_query($conn,$sql);
$row=mysqli_num_rows($result);
if($row==1){
echo "已存在该学生";
header('Refresh: 0.5;url=admin_3_user_manage.php');
}
else{
$sq="INSERT INTO stu VALUES ('{$user_no}','{$password}','{$name}','{$sex}','{$scl}','{$class}','{$email}','{$phone}')";
mysqli_query($conn,$sq) or die(mysqli_error($conn));
echo "添加成功";
header('Refresh: 0.5;url=admin_3_user_manage.php');
}
?>
