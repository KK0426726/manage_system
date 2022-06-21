<meta charset="utf-8">
<?php
session_start();
   $conn=mysqli_connect('localhost','six','123456','work');
   $conn->query("SET NAMES UTF8");
  $user_no=$_POST['user_no'];
  $pass=$_POST['password'];
  $repass=$_POST['repass'];
  $name=$_POST['username'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $class=$_POST['class'];
  $scl=$_POST['scl'];
  $_SESSION['user_no']="";
    if($repass==""){
        $std="SELECT * FROM stu where user_no='{$user_no}' and password='{$pass}'"; 
$qq="SELECT * FROM gly where name='{$user_no}' and password='{$pass}'";
$re=$conn->query($qq);
$rows=mysqli_num_rows($re);
  $result=$conn->query($std);
  $row = mysqli_num_rows($result);
  if($row == 1){
      if($_SESSION['user_no']){unset($_SESSION['user_no']);}
      $_SESSION['user_no']=$user_no;
      header("Location:user.php");
  }
  else if($rows==1){if($_SESSION['user_no']){unset($_SESSION['user_no']);}
  $_SESSION['user_no']=$user_no;
  header("Location:admin.php");}
  else{
      echo"登录失败，请重新登录！";
      header('Refresh: 0.5;url=mainpage.php'); 
  }	

    }//普通登录
    else{
    $sq="SELECT * FROM stu where user_no='{$user_no}'";
    $result=$conn->query($sq);
    $row=mysqli_num_rows($result);
    $sex=$_POST['gender'];
    if($row==1)
    {
        echo "已存在";
        header('Refresh: 0.5;url=mainpage.php');
    }
    else{
        $sl="INSERT INTO stu VALUES ('{$user_no}','{$pass}','$name','$sex','$scl','$class','$email','$phone')";
        mysqli_query($conn,$sl) or die(mysqli_error($conn));
        echo("注册成功！！！");
        header('Refresh: 0.5;url=mainpage.php');
    }
  }
  