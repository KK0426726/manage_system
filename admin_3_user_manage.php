<?php
session_start();
$nowuser_no=$_SESSION['user_no'];
    $conn=mysqli_connect('localhost','six','123456','work');
    $conn->query("SET NAMES UTF8");
    $ll= "SELECT * FROM stu";
    $result = mysqli_query($conn,$ll);
    /* if (!$result) {
    echo ("链接失败");
} */
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $sql = 'SELECT COUNT(*) FROM stu';
    $n = mysqli_query($conn, $sql);
    /* if (!$n) {
    echo ("链接失败");
} */
    $num = mysqli_fetch_assoc($n);
    $num = implode($num);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理员系统</title>
    <link rel="stylesheet" href="admin_3_user_manage.css">
    <script type="text/javascript">
function altRows(id){
    if(document.getElementsByTagName){ 
         
        var table = document.getElementById(id); 
        var rows = table.getElementsByTagName("tr");
          
        for(i = 1; i < rows.length; i++){         
            if(i % 2 == 0){
                rows[i].className = "evenrowcolor";
            }else{
                rows[i].className = "oddrowcolor";
            }     
        }
    }
}
 
window.onload=function(){
    altRows('alternatecolor');
}
</script>
</head>
<body>
    <style>
    td a{
    text-decoration: none;
    color: #fff;
    background-color: limegreen;
    padding: 2px;
    border-radius: 5px;
    transition: 0.5s;
}
td a:hover{
    box-shadow:0px 0px 0px 2px limegreen;
}
.evenrowcolor{
    background-color:#dfe4ea;
}
.oddrowcolor{
    background-color:#f1f2f6;
}
#canvas{
        display: block;
        background:rgb(255, 255, 255) ;
        position:absolute;z-index:-2;
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
            <div class="animation start-mainpage"></div>
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
                <div><a href="admin.php" class="subnavlink">主页</a></div>
                <div><a href="admin_2_add_admin.php" class="subnavlink">管理员管理</a></div>
                <div><a href="admin_3_user_manage.php" class="subnavlink_selected">用户管理</a></div>
                <div><a href="admin_4_event_manage.php" class="subnavlink">活动管理</a></div>
                <div><a href="admin_5_user_search.php" class="subnavlink">查找用户</a></div>
            </div>
            <div class="admin_content" style="overflow:auto;">
                <div class="wrapper">
                    <h1>用户信息管理系统</h1>
                    <div class="add">
                        <a href="admin_3_extra_add_user.php">添加学生</a>&nbsp;&nbsp;&nbsp;共<?php echo $num; ?>个学生
                    </div>
                    
                        <table class="altrowstable" id="alternatecolor">
                            <tr style="background-color:#a4b0be">
                            <th>帐号</th>
                            <th>姓名</th>
                            <th>性别</th>
                            <th>学院</th>
                            <th>班级</th>
                            <th>邮箱</th>
                            <th>手机号码</th>
                            <th>密码</th>
                            <th>操作</th>
                            </tr>
                            <?php
                                foreach($data as  $value){
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
                                    echo "<td>{$arr['password']}</td>";
                                    echo "<td><a href='javascript:del({$arr['user_no']})'>删除</a>&nbsp;<a href='admin_3_extra_modify_student_info.php?user_no={$arr['user_no']}'>修改</a></td>";
                                    echo "</tr>";
                                }
                                mysqli_close($conn);
                            ?>
                        </table>
                        <script type="text/javascript">
                        function del (user_no) {
                            if (confirm("确定删除这个学生吗？")){
                                window.location = "delete.php?user_no="+user_no;
                            }
                        }
                        </script>
                </div>
            </div>
        </div>
    </div>
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