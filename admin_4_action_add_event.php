<meta charset="utf-8">
<?php
$conn=mysqli_connect('localhost','six','123456','work') or die('数据库连接失败');
$conn->query("SET NAMES 'UTF8'");
$teach_no=$_POST['teach_no'];
   $time=$_POST['time'];
   $pname=$_POST['pname'];
   $field=$_POST['field'];
   $thing=$_POST['thing'];
   $tt="SELECT * FROM baoming WHERE teach_no='{$teach_no}'";
   $result=mysqli_query($conn,$tt);
   $row=mysqli_num_rows($result);
   if($row==1){
    echo "已存在报名";
    header('Refresh:1.5 ,url=admin_4_add_event');
   }
   else{
   $cc="INSERT INTO baoming VALUES ('$teach_no','$pname','$time','$field','$thing')";
   $zc="CREATE TABLE  `bm_".$teach_no."` (pname CHAR(30),user_no CHAR(20),name CHAR(20))";
   $qwe=mysqli_query($conn,$zc);
   if($qwe&$conn->query($cc)){
       echo "创建报名成功 ";
      header('Location:admin_4_event_manage.php');
   }
   else{
    echo "报名创建失败";
    header('Location:admin_4_event_manage.php');
   }
}
?>