<?php
session_start();
$nowuser_no=$_SESSION['user_no'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理员系统</title>
    <link rel="stylesheet" href="admin_3_extra_add_user.css">
</head>
<body>

    <style>
.getform{
    display: flex;
    flex-direction: column;
    text-align: center;
}
.getform div div{
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
.tip_font{
    font-size:2px;
    color:grey;
}
#canvas{
    width: 100%;
    height: 100%;
        display: block;
        background:rgb(255, 255, 255) ;
        position:absolute;z-index:-2;
    }
    </style>
    <canvas id="canvas"></canvas>
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
            <div class="admin_content">
                <h1>
                    添加用户
                </h1>
                <br>
                <div class="formbox">
                <form action="admin_3_extra_action_add_user.php" method="POST" enctype="multipart/form-data" class="getform" onsubmit="return checkUserChange()">
                    <div style="display:inline-block;vertical-align:middle;text-align:left;">
                    <div>账号：<input type="text" id="user_no" name="user_no" placeholder="账号只能是数字，不得超过20位" class="inputer"><!-- <br><span id="user_no_tip" class="tip_font">账号只能是数字</span> --></div>
                    <div>密码：<input type="text" name="password" placeholder="密码首位必须是字母，6~15位" class="inputer"><!-- <br><span id="password_tip" class="tip_font">密码首位必须是字母，不能有除下划线的特殊字符，6-15位</span> --></div>
                    <div>姓名：<input type="text" name="username" placeholder="姓名不得超过20位，不支持特殊符号" class="inputer"><!-- <br><span id="name_tip" class="tip_font">姓名不能为空</span> --></div>
                    <div>邮箱：<input type="text" id="email" name="email" placeholder="请正确输入邮箱" class="inputer"><!-- <br><span id="email_tip" class="tip_font">请正确输入</span> --></div>
                    <div>电话：<input type="text" id="phone" name="phone" placeholder="请正确输入电话号码" class="inputer"><!-- <br><span id="phone_tip" class="tip_font">请正确输入</span> --></div>
                    <div>班级：<input type="text" id="classes" name="class" placeholder="请正确输入班级" class="inputer"><!-- <br><span id="class_tip" class="tip_font">请正确输入</span> --></div>
                    <div>学院：<input type="text" name="scl" placeholder="请正确输入学院" class="inputer"><!-- <br><span id="scl_tip" class="tip_font">请正确输入</span> --></div>
                    <div>性别：<input type="radio" id="user_male" name="gender" value="男">男<input type="radio" id="user_female" name="gender" value="女">女<!-- <span id="gender_tip" class="tip_font"></span> --></div>
                    <div><input type="submit" value="添加用户" class="input_button"></div>
                    </div>
                </form>
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
    <script>
    
        function checkUserNumber(){
            var inputNode = document.getElementById("user_no");
            if (isNaN(Number(inputNode.value))) {
                document.getElementById("user_no_tip").innerHTML = "不能为空！" ;
                return false;
            }
            else {
                return true;
            }
        }

        function checkUserName(){
            var inputNode = document.getElementsByName("username");
            var nameLength = document.getElementsByName("username").value;
            var content = inputNode.value;
            if (content == "" || nameLength <= 0) {
                document.getElementById("user_no_tip").innerHTML = "不能为空！" ;
                return false;
            }
            else{
                return true;
            }

        }

        function checkUserPassword(){
            var inputNode = document.getElementsByName("password");
            var passwordLength = document.getElementsByName("password").value;
            var content = inputNode.value;
            var reg_password = /^([a-zA-Zd])+(\w{6,12})+/;
            var flag = reg_password.test(content);
                if (passwordLength > 15) {
                    document.getElementById("password_tip").innerHTML = "密码过长！" ;
                    return false;
                }
                else if (passwordLength < 6 && passwordLength > 0) {
                    document.getElementById("password_tip").innerHTML = "密码过短！" ;
                    return false;
                }
                if (flag) {
                    return true;
                }
                else if (content == "") {
                    document.getElementById("password_tip").innerHTML = "不能为空！" ;
                    return false;
                }
                else {
                    return false;
                }

        }

        function checkUserClass(){
            var inputNode = document.getElementById("classes");
            var Length = document.getElementById("classes").value;
            var content = inputNode.value;
            if (content == "" || Length <= 0) {
                return false;
            }
            else {
                return true;
            }
        }

        function checkUserEmail(){
            var inputNode = document.getElementById("email");
            var content = inputNode.value;
            var reg = /^[a-z0-9]\w+@[a-z0-9]+(\.[a-z]{2,3}){1,2}$/i;
            if (reg.test(content)) {
                return true;
            }
            else {
                return false;
            }
        }

        function checkUserTelephone(){
            var inputNode = document.getElementById("phone");
            var reg_telephone = /^(((13[0-9]{1})|(14[0-9]{1})|(17[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
            var content = inputNode.value;
            if (reg_telephone.test(content)) {
                return true;
            } 
            else {
                return false;
            }
        }

        function checkUserInstitute(){
            var inputNode = document.getElementsByName("scl");
            var nameLength = document.getElementsByName("scl").value;
            var content = inputNode.value;
            if (nameLength <=0) {
                return false;
            }
            else{
                return true;
            }
        }

        function checkUserGender() {
            var spanNode = document.getElementsByName("sex");
                if (!document.getElementById("user_male").checked && !document.getElementById("user_female").checked) {
                    return false;
                }
                else {
                    return true;
                }
        }

        function checkUserChange() {

                var addUser = checkUserNumber();
                var addName = checkUserName();
                var addClass = checkUserClass();
                var addTele = checkUserTelephone();
                var addInst = checkUserInstitute();
                var addPassw = checkUserPassword();
                var addEm = checkUserEmail();
                var addGender = checkUserGender();

                if (addUser && addName && addClass && addTele && addInst && addPassw && addEm && addGender) {
                    alert("添加成功");
                    document.getElementsByClassName("getform").submit();
                    return true;
                }
                else {
                    alert("添加失败！");
                    return false;
                }
                
        }
    </script>
</body>
</html>