<?php
session_start();
$nowuser_no=$_SESSION['user_no'];
$user_no=$_REQUEST['user_no'];
$conn=mysqli_connect('localhost','six','123456','work');
$conn->query("SET NAMES UTF8");
$ll= "SELECT * FROM stu WHERE user_no='$user_no'";
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
    <link rel="stylesheet" href="admin_3_extra_modify_student_info.css">
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
                    用户信息修改
                </h1>
                <br>
                <form action='admin_3_extra_action_modify.php?' method='POST'  enctype="multipart/form-data" class="modify_form" onsubmit="return checkUserChange()">
                    <input type='hidden' name='user_no' value="<?php echo $user_no ?>" >  
                    <div><tr><th>姓名:</th><td><input type="text" name="name" value="<?php echo $arr["name"]?>" placeholder="请正确填写"></td></tr></div>
                    <div><tr><th>密码:</th><td><input type="text" name="password" value="<?php echo $arr["password"]?>" placeholder="请正确填写"></td></tr></div>
                    <div><tr><th>班级:</th><td><input type="text" id="classes" name="class" value="<?php echo $arr["class"]?>" placeholder="请正确填写"></td></tr></div>
                    <div><tr><th>邮箱:</th><td><input type="text" id="email" name="email" value="<?php echo $arr["email"]?>" placeholder="请正确填写"></td></tr></div>
                    <div><tr><th>电话:</th><td><input type="text" id="phone" name="phone" value="<?php echo $arr["phone"]?>" placeholder="请正确填写"></td></tr></div>
                    <div><tr><th>学院:</th><td><input type="text" name="scl" value="<?php echo $arr["scl"]?>" placeholder="请正确填写"></td></tr></div>
                    <div><tr><th>性别:</th><td>
                    <input <?php if($arr['sex']=='男'){echo "checked";}?> type="radio" id="user_male" name="sex" value="男">男
                    <input <?php if($arr['sex']=='女'){echo "checked";}?> type="radio" id="user_female" name="sex" value="女">女</div>
                    <div><input type="submit" value="修改" class="input_button"></div>
                </form>
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
        
        function checkUserName(){
            var inputNode = document.getElementsByName("name");
            var nameLength = document.getElementsByName("name").value;
            var content = inputNode.value;
            if (content == "" || nameLength <= 0) {
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
                    return false;
                }
                else if (passwordLength < 6 && passwordLength > 0) {
                    return false;
                }
                if (flag) {
                    return true;
                }
                else if (content == "") {
                    return false;
                }
                else {
                    return false;
                }

        }

        function checkUserClass(){
            var inputNode = document.getElementById("classes");
            var Length = document.getElementById("classes").value.length;
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

                var addName = checkUserName();
                var addClass = checkUserClass();
                var addTele = checkUserTelephone();
                var addInst = checkUserInstitute();
                var addPassw = checkUserPassword();
                var addEm = checkUserEmail();
                var addGender = checkUserGender();

                if (addName && addClass && addTele && addInst && addPassw && addEm && addGender) {
                    alert("修改成功");
                    document.getElementsByClassName("modify_form").submit();
                    return true;
                }
                else {
                    alert("修改失败！");
                    return false;
                }
                
        }
    </script>
</body>
</html>