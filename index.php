<?php
error_reporting(0);
$conn=mysqli_connect('localhost','six','123456','work');
$conn->query('SET NAMES UTF-8');
session_start();
$nowuser_no=$_SESSION['user_no'];
$sql="SELECT name FROM gly";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_all($result,MYSQLI_ASSOC);
$sqlll="SELECT * FROM gly WHERE name='$nowuser_no'";
$rrr=mysqli_query($conn,$sqlll);
$datas=mysqli_fetch_row($rrr);
$qqq=$datas[0];
if($qqq){$identity=1;}
else{$identity=0;}
if($nowuser_no){;}
else{$log=0;}
?>
<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>

	<style>
		*{
    margin:0;
    padding:0;
}
.head{
    background-color: #2980b9;
    width: 95%;
    height: 30%;
    margin: 0 auto;
    border-radius: 8px;
}
nav{
    position: relative; 
    width: 100%; 
    height: 5%; 
    background: #2980b9;
    border-radius: 8px; 
    font-size: 0; 
  }
.navlink{
    font-size: 15px;
    color: white; 
    text-decoration: none; 
    line-height: 50px; 
    position: relative;
    z-index: 1;
    display: inline-block;
    text-align: center;
}
.animation {
    position: absolute;
    height: 100%;
    top: 0;
    z-index: 0;
    background: #227093;
    width: 100px;
    border-radius: 8px;
    transition: all 0.5s ease-out;
  }
.navlink:nth-child(1) {
    width: 100px;
}
.start-mainpage, .navlink:nth-child(1):hover~.animation {
    width: 100px;
    left: 0;
}
.navlink:nth-child(2) {
    width: 100px;
}
.start-admin, .navlink:nth-child(2):hover~.animation {
    width: 100px;
    left: 100px;
}
.navlink:nth-child(3) {
    width: 100px;
}
.start-user, .navlink:nth-child(3):hover~.animation {
    width: 100px;
    left: 200px;
}
.navlink:nth-child(4) {
    width: 100px;
}
.start-about, .navlink:nth-child(4):hover~.animation {
    width: 100px;
    left: 300px;
}
.dropdown{
    float:right;
    display: inline-block;
    text-align: center;
}
.dropdown_trigger{
    font-size: 15px;
    color: white; 
    text-decoration: none; 
    line-height: 50px; 
    z-index: 1;
    display: inline-block;
    text-align: center;
    cursor: pointer;
    background: #2980b9;
    border-radius: 8px;
    min-width: 100px;
}
.dropdown_content{
    z-index: 999;
    border-radius: 10px;
    opacity: 0;
    transition: 0.5s;
    border: 1px solid rgb(200, 200, 200);
    display: none;
    position: fixed;
    right: 2.5%;
    background-color: #2980b9;
    min-width: 150px;
    min-height: 50px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}
.dropdown_content a{
    display: block;
    color: black;
    text-decoration: none;
    padding: 12px 16px;
    font-size: 15px;
}
.dropdown_content a:hover{
    background-color: #227093;
    border-radius: 10px;
}
.dropdown:hover .dropdown_content{
    display: block;
    opacity: 1;
}
.dropdown:hover .dropdown_trigger{
    background-color: #227093;
}
.body{
    background-size: cover;
    height: 100%;
    margin: 0 auto;
    width: 100%;
    position: fixed;
    overflow: auto;
}
.box{
    overflow: auto;
    display: flex;
    flex-direction:row;
    text-align: center;
    margin: 0 auto;
    width: 95%;
    height:630px;
    top: 2%;
    position: relative;
    background:rgba(255, 255, 255, 0.5);
	border-radius:.3em;
	box-shadow:0 0 0 1px hsla(0,0%,100%,0.3) inset,0 0.5em 1em rgba(0,0,0,0.6);
	text-shadow:0 1px 1px hsla(0,0%,100%,0.3);
}
.subnav{
    min-width: 200px;
    width: 15%;
    display: flex;
    flex-direction: column;
    background-color: #ced6e0;
    text-align: center;
}
.subnavlink{
    margin-top: 10px;
    border-radius: 5px;
    width: 80%;
    height: 50px;
    background-color:transparent;
    font-size: 15px;
    color: black; 
    text-decoration: none; 
    transition: 0.5s;
    text-align: center;
    display: inline-block;
    line-height: 50px;
}
.subnavlink_selected{
    margin-top: 10px;
    border-radius: 5px;
    width: 80%;
    height: 50px;
    background-color:#2f3542;
    font-size: 15px;
    color: white; 
    text-decoration: none; 
    transition: 0.5s;
    text-align: center;
    display: inline-block;
    line-height: 50px;
}
.subnavlink:hover{
    transition: 0.5s;
    background-color: #22a6b3;
}
.admin_content{
    width:85%;
}
.input_button{
    text-decoration: none;
    color: #fff;
    background-color: #00CCFF;
    padding: 6px;
    border-radius: 5px;
    transition: 0.5s;
    border:none;
    width: 100px;
    height:50px;
}
.input_button:hover{
    box-shadow:0px 0px 0px 4px #00ccffd3;
}
#canvas{
        display: block;
        background:rgb(255, 255, 255) ;
        position:absolute;
        z-index:-2;
    }
	</style>
    <canvas id = "canvas"></canvas>
    <script src='click_effect/anime.js'></script>
            <script src='click_effect/fireworks.js'></script>
            <canvas class='fireworks' width='100%' height='100%'
                style='position: fixed;z-index:13;pointer-events: none;opacity: 0.7;'></canvas>
<div class="head">

        <nav>
            <!-- <a href="mainpage.php" class="navlink">主页</a> -->
            <a href="admin.php" class="navlink">管理员系统</a>
            <a href="user.php" class="navlink">用户系统</a>
            <a href="about.php" class="navlink">关于我们</a>
            <div class="animation start-admin"></div>
            <div class="dropdown">
                
                <?php if($nowuser_no!=''){
                    echo 
                "<a href='' class='dropdown_trigger'>{$nowuser_no}</a>
                <div class='dropdown_content'>
                <a href='user_2_info_modify.php' class='all'>修改信息</a>
                <a href='user.php' class='all'>我的通知</a>
                
                <a href='action_log_out.php'>注销</a>
                </div>";}
                else{
                    echo"<a href='mainpage.php' class='dropdown_trigger'>未登录</a>";
                }
                ?>
            </div>
        </nav>
    </div>
	<div class="body">
        <div class="box">
            <div class="subnav">
                <div><a href="user.php" class="subnavlink">主页</a></div>
                <div><a href="user_2_info_modify.php" class="subnavlink">修改信息</a></div>
                <div><a href="user_3_event_query.php" class="subnavlink">查看活动</a></div>
                <div><a href="index.php" class="subnavlink_selected">申请管理权限</a></div>
            </div>
            <div class="admin_content">
			<form action="sendmail.php" method="post" onsubmit="return judgeidentity(<?php echo $identity ; ?>,<?php echo $log ; ?>)">
				<h1>申请管理员权限</h1>
				<br>
				提交申请对象：<select name="grant_admin">
				   <?php
				 foreach($data as $value)  {
					 foreach($value as $k=>$v){
						 $arr[$k]=$v;
					 }
				  echo "<option>{$arr['name']}</option>"; 
				 }
				   ?>
				</select>
				<br>
				<input type="submit" value="申请资格" class="input_button" style="margin-top:30px;margin-bottom:10px;">
			</form>
				<div style="font-size:2px;color:grey;">说明：选择一个管理员，向其发送申请管理资格邮件</div>
            </div>
        </div>
    </div>
    <script>
    window.requestAnimationFrame = (function(){
        return window.requestAnimationFrame ||
               window.webkitRequestAnimationFrame ||
               window.mozRequestAnimationFrame ||
               function( callback ){
                    window.setTimeout( callback, 1000 / 2);
               };
    })();
    var myCanvas = document.getElementById("canvas");
    var ctx = myCanvas.getContext("2d");//getContext 设置画笔
    var num = 250;
    var w,h;
    var duixiang = [];
    var move = {};
    function widthheight(){
        w = myCanvas.width = window.innerWidth;
        h = myCanvas.height = window.innerHeight;
        for(var i = 0;i < num;i++){
            duixiang[i] = {
                x:Math.random()*w,
                y:Math.random()*h,
                cX:Math.random()*0.6-0.3,
                cY:Math.random()*0.6-0.3
            }
            console.log(duixiang[i])
            Cricle(duixiang[i].x,duixiang[i].y);
        }
    };widthheight();//获取浏览器的等宽度等高

    function Cricle(x,y){
        ctx.save();//保存路径
        ctx.fillStyle = "royalblue";//填充的背景颜色
        ctx.beginPath();//开始绘画
        ctx.arc(x,y,1,Math.PI*2,0);//绘画圆 x y 半径（大小） 角度  一个PI 是180 * 2 = 360    真假 0/1 true/false
        ctx.closePath();//结束绘画
        ctx.fill();//填充背景颜色
        ctx.restore();//回复路径
    };Cricle();


    !function draw(){
        ctx.clearRect(0,0,w,h)//先清除画布上的点
        for(var i = 0;i < num;i++){
            duixiang[i].x += duixiang[i].cX;
            duixiang[i].y += duixiang[i].cY;
            if(duixiang[i].x>w || duixiang[i].x<0){
                duixiang[i].cX = -duixiang[i].cX;
            }
            if(duixiang[i].y>h || duixiang[i].y<0){
                duixiang[i].cY = -duixiang[i].cY;
            }
            Cricle(duixiang[i].x,duixiang[i].y);
            //勾股定理判断两点是否连线
            for(var j = i + 1;j < num;j++){
                if( (duixiang[i].x-duixiang[j].x)*(duixiang[i].x-duixiang[j].x)+(duixiang[i].y-duixiang[j].y)*(duixiang[i].y-duixiang[j].y) <= 55*55 ){
                    line(duixiang[i].x,duixiang[i].y,duixiang[j].x,duixiang[j].y)
                }
                if(move.x){
                    if( (duixiang[i].x-move.x)*(duixiang[i].x-move.x)+(duixiang[i].y-move.y)*(duixiang[i].y-move.y) <= 100*100 ){
                        line(duixiang[i].x,duixiang[i].y,move.x,move.y)
                    }
                }
            }
        }
        window.requestAnimationFrame(draw)
    }();

    //绘制线条
    function line(x1,y1,x2,y2){
        var color = ctx.createLinearGradient(x1,y1,x2,y2);
        color.addColorStop(0,"#FFCCCC");
        color.addColorStop(1,"#FFDDDD");
        //ctx.save();
        ctx.strokeStyle = color;
        ctx.beginPath();
        ctx.moveTo(x1,y1);
        ctx.lineTo(x2,y2);
        ctx.stroke();
        //ctx.restore();
    }


    document.onmousemove = function(e){
        move.x = e.clientX;
        move.y = e.clientY;
    }
    console.log(move)

    window.onresize = function(){
        location.reload();
    }
</script>
<script>
    function judgeidentity(identity,nowuser_no){
        if(identity){
            alert("您已经是管理员了！");
            return false;
        }
        else if (nowuser_no == 0){
            alert("您还没登陆！");
            window.location="mainpage.php";
            return false;
        }
        else return true;
    }
</script>
</body>
</html>