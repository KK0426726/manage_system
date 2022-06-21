<?php
$teach_no=$_REQUEST['teach_no'];
$conn=mysqli_connect('localhost','six','123456','work');
$conn->query('SET NAMES UTF8');
$sql="DELETE FROM baoming WHERE teach_no='$teach_no'";
$delete = "DROP TABLE `bm_".$teach_no."`";
$data=mysqli_query($conn,$delete);
$result=mysqli_query($conn,$sql);
if($result){
    header('Location:admin_4_event_manage.php');
}
else{
    echo "删除失败";
    header('Refresh: 0.5; url=admin_4_event_manage.php');
}
?>