<?php
$conn=mysqli_connect('localhost','six','123456','work');
$conn->query('SET NAMES UTF8');
$user_no=$_POST['user_no'];
$pass=$_POST['password'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$class=$_POST['class'];
$scl=$_POST['scl'];
$sex=$_POST['sex'];
$sql="UPDATE stu SET password='{$pass}',name='{$name}',email='{$email}',phone='{$phone}',class='{$class}',scl='{$scl}',sex='{$sex}' WHERE user_no='{$user_no}'";
$conn->query($sql);
if($conn){
        header('Location:admin_3_user_manage.php');
}
else{
    echo '修改失败';
    header('Refersh: 1.5,url=admin_3_user_manage.php');
}
?>
