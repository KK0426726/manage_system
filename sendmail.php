<?php
error_reporting(0);
	require_once "Smtp.class.php";
	//******************** 配置信息 ********************************
$conn=mysqli_connect('localhost','six','123456','work');
$conn->query("SET NAMES UTF8");
$gly=$_REQUEST['grant_admin'];
$sq="SELECT email FROM gly WHERE name='$gly'";
$result=mysqli_query($conn,$sq);
$data=mysqli_fetch_row($result);
$email=$data[0];
session_start();
$nowuser_no=$_SESSION['user_no'];
$sql="SELECT email FROM stu WHERE user_no='$nowuser_no'";
$res=mysqli_query($conn,$sql);
$da=mysqli_fetch_row($res);
$user=$da[0];
$sqll="SELECT * FROM gly  WHERE name='$nowuser_no'";
$resultl=mysqli_query($conn,$sqll);
$datas=mysqli_fetch_row($resultl);
$qq=$datas[0];
$sqlq="SELECT name FROM stu WHERE user_no='$nowuser_no'";
$ress=mysqli_query($conn,$sqlq);
$das=mysqli_fetch_row($ress);
$username=$das[0];
if($qq)
{
	echo "已有管理员权限";
	echo "<a href='index.php'>点此返回</a>";
}
else{
	$smtpserver = "smtp.qq.com";//SMTP服务器
	$smtpserverport =25;//SMTP服务器端口
	$smtpusermail = "2499857309@qq.com";//SMTP服务器的用户邮箱
	$smtpemailto = $email;//发送给谁
	$smtpuser = $user;//SMTP服务器的用户帐号，注：部分邮箱只需@前面的用户名
	$smtppass = "krmdygbjofdeecgi";//SMTP服务器的用户密码
	$mailtitle = '管理员申请';//邮件主题krmdygbjofdeecgi
	$mailcontent = "<h1>".$username."想成为管理员</h1><br><a href='http://localhost:8081/shitcollection/%E5%A4%A7%E4%BD%9C%E4%B8%9A/%E6%95%B4%E7%90%86/%E6%88%90%E6%9E%9C/mainpage.php'>点击处理</a>";//邮件内容
	$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
	//************************ 配置信息 ****************************
	$smtp = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
	$smtp->debug = false;//是否显示发送的调试信息
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
}
	echo "<div style='width:300px; margin:36px auto;'>";
	if($state==""){
		echo "对不起，邮件发送失败！请检查邮箱填写是否有误。或已有管理员权限";
		echo "<a href='index.php'>点此返回</a>";
		exit();
	}
	echo "发送中......";
	header('Refresh:1.3,url=index.php')

?>