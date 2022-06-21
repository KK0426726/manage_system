<?php
$conn=mysqli_connect('localhost','six','123456','work');
$conn->query('SET NAMES UTF8');
session_start();
$nowuser_no=$_SESSION['user_no'];
$sql="SELECT * FROM stu WHERE user_no='$nowuser_no'";
$result=mysqli_query($conn,$sql);
$row=mysqli_num_rows($result);
if($row==1)
{$data=mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach($data as $value){
    foreach($value as $k => $v){
        $arr[$k]=$v;
    }
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户系统</title>
    <link rel="stylesheet" href="user_2_info_modify.css">
</head>
<body>
<style>
h1{
    text-align: center;
}
.add{
    margin-bottom: 20px;
}
.add a {
    text-decoration: none;
    color: #fff;
    background-color: #00CCFF;
    padding: 6px;
    border-radius: 5px;
    transition: 0.5s;
}
.add a:hover{
    box-shadow:0px 0px 0px 2px #00ccffd3;
}
.button{
    text-decoration: none;
    color: #fff;
    background-color: limegreen;
    padding: 2px;
    border-radius: 5px;
    transition: 0.5s;
}
.button:hover{
    box-shadow:0px 0px 0px 2px limegreen;
}
.wrapper{
    width:100%;
    margin:0 auto;
}
#canvas{
        display: block;
        background:rgb(255, 255, 255) ;
        position:absolute;z-index:-3;
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
    <?php
    if($row==1){
    header('Location:user_2_extra_info_modify.php');
    ;}
    else{
        echo  '<div class="body">
        <div class="box">
            <div class="subnav">
                <div><a href="user.php" class="subnavlink">主页</a></div>
                <div><a href="user_2_info_modify.php" class="subnavlink_selected">修改信息</a></div>
                <div><a href="user_3_event_query.php" class="subnavlink">查看活动</a></div>
                <div><a href="index.php" class="subnavlink">申请管理权限</a></div>
            </div>
            <div class="admin_content">
            <h1>无用户信息</h1>
            <br>
            
            </div>
        </div>
    </div>';
    }
    ?>
    <div class="bottom"></div>
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
</body>
</html>

<!-- <tr>
            <th>编号：</th>
            <th>姓名：</th>
            <th>性别：</th>
            <th>学院：</th>
            <th>班级：</th>
            <th>邮箱：</th>
            <th>电话：</th>
            <th>操作</th>
            </tr> -->
            <!-- <?php
/* foreach($data as $value){
    foreach($value as $k => $v) { 
        $arr[$k] = $v;
    }
    echo "<tr>";
    echo "<td>{$arr['user_no']}</td>";
    echo "<td>{$arr['name']}</td>";
    echo "<td>{$arr['sex']}</td>";
    echo "<td>{$arr['scl']}</td>";
    echo "<td>{$arr['class']}</td>";
    echo "<td>{$arr['email']}</td>";
    echo "<td>{$arr['phone']}</td>";
    echo "<td><a href='user_2_extra_info_modify.php'>修改</a></td>";
}
    mysqli_close($conn); */?> -->
