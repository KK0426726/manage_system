<meta charset="utf-8">
<?php
session_start();
$nowuser_no=$_SESSION['user_no'];
$user_no=$_SESSION['user_no'];
$teach_no=$_REQUEST['teach_no'];
$conn=mysqli_connect('localhost','six','123456','work');
$conn->query("SET NAMES UTF8");
$ll= "SELECT * FROM baoming WHERE teach_no='$teach_no'";
$result = mysqli_query($conn,$ll);
if (!$result) {
exit('查询sql语句执行失败。错误信息：'.mysqli_error($conn));
}
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach($data as $value){
    foreach($value as $k => $v){
        $arr[$k]=$v;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理员系统</title>
    <link rel="stylesheet" href="admin_4_event_manage.css">
</head>
<body>
<style>
        .modify_form{
    display: flex;
    flex-direction: column;
    text-align: center;
}
.modify_form div{
    text-align: center;
    margin-bottom: 5px;
}
input[type="text"]{
    width: 55%;
    height: 25px;
    transition: 0.5s;
    outline: none;
    border: 1px solid #747d8c;
}
input[type="text"]:focus{
    box-shadow: 0px 0px 6px 0px #48dbfb;
    transition: 0.3s;
}
input[type="text"]:hover{
    box-shadow: 0px 0px 6px 0px #48dbfb;
    transition:0.2s;
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
            <!-- <!-- <a href="mainpage.php" class="navlink">主页</a> --> -->
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
                <div><a href="admin_3_user_manage.php" class="subnavlink">用户管理</a></div>
                <div><a href="admin_4_event_manage.php" class="subnavlink_selected">活动管理</a></div>
                <div><a href="admin_5_user_search.php" class="subnavlink">查找用户</a></div>
            </div>
            <div class="admin_content">
            <h1>活动信息修改</h1>
            <br>
            <form id="activity" action='admin_4_action_modify_info.php' method='POST'  enctype="multipart/form-data" onsubmit="return checkChange()" class="modify_form">
                <input type='hidden' name='user_no' value="<?php echo $user_no ?>" >  
                <input type='hidden' name='teach_no' value="<?php echo $teach_no ?>" >
                <div><tr><th>活动编号：</th><td><span><?php echo $arr["teach_no"]?></span></td></tr></div>
                <div><tr><th>活动名称：</th><td><input type="text" id="pname" name="pname" value="<?php echo $arr["pname"]?>"></td></tr></div>
                <div><tr><th>活动时间：</th><td><input type="text" id="time" name="time" value="<?php echo $arr["time"]?>"></td></tr></div>
                <div><tr><th>活动地点：</th><td><input type="text" id="field" name="field" value="<?php echo $arr["field"]?>"></td></tr></div>
                <div><tr><th>活动内容：</th><td><input type="text" name="thing" value="<?php echo $arr["thing"]?>"></td></tr></div>
                <div><input type="submit" value="修改" class="input_button"></div>
                </td></tr>
            </form>
            </div>
        </div>
    </div>
    <div class="bottom"></div>
    <script>

        function checkActivityName(){
            var inputNode = document.getElementById("pname");
            var Length = document.getElementById("pname").value.length;
            var content = inputNode.value;
            if (content == "" || Length <= 0) {
                return false;
            }
            else {
                return true;
            }
        }

        function checkActivityTime(){
            var inputNode = document.getElementById("time");
            var Length = document.getElementById("time").value.length;
            var content = inputNode.value;
            if (content == "" || Length <= 0) {
                return false;
            }
            else {
                return true;
            }
        }

        function checkActivityPlace(){
            var inputNode = document.getElementById("field");
            var Length = document.getElementById("field").value;
            var content = inputNode.value;
            if (content == "" || Length <= 0) {
                return false;
            }
            else {
                return true;
            }
        }

        function checkChange() {
                var addName = checkActivityName();
                var addTime = checkActivityTime();
                var addPlace = checkActivityPlace();

                if (addName && addTime && addPlace) {
                    alert("修改成功");
                    document.getElementById("activity").submit();
                    return true;
                }
                else {
                    alert("修改失败！");
                    return false;
                }
        }
    
    </script>
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