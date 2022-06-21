<?php
    $conn=mysqli_connect('localhost','six','123456','work');
    $conn->query("SET NAMES UTF8");
    $teach_no=$_REQUEST['teach_no'];
    $pname=$_POST['pname'];
    $time=$_POST['time'];
    $field=$_POST['field'];
    $thing=$_POST['thing'];
    $sql="UPDATE baoming SET pname='$pname',time='$time',field='$field',thing='$thing' WHERE teach_no='$teach_no'";
    $result=mysqli_query($conn,$sql);
    
    if($result) {
        header('Location:admin_4_event_manage.php');
    }
    else {
        echo "修改失败"; 
        header('refresh:0.5,url=admin_4_event_manage.php');
    }
?>