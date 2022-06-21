<?php
session_start();
$nowuser_no= $_SESSION['user_no'];
$conn=mysqli_connect('localhost','six','123456','work');
$conn->query("SET NAMES UTF8");
if($nowuser_no!=''){$nowuser=1;}
else{$nowuser=0;}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户系统</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>
<script>
    function alert_notlogin(){
        if(!<?php echo $nowuser; ?>)
                {
                    alert('您还没登陆');
                    window.location = 'mainpage.php';
                    return false;
                }
    }
</script>
<script>
        function makeExpandingArea(el) {
            var timer = null;
            //由于ie8有溢出堆栈问题，故调整了这里
            var setStyle = function(el, auto) {
                if (auto) el.style.height = 'auto';
                el.style.height = 50 + el.scrollHeight + 'px';
                if((el.height + el.top) > document.getElementById("subnav").style.height){
                    document.getElementById("subnav").style.height = el.height + el.top + 300 + 'px';
                }
            }
            var delayedResize = function(el) {
                if (timer) {
                    clearTimeout(timer);
                    timer = null;
                }
                timer = setTimeout(function() {
                    setStyle(el)
                }, 200);
            }
            if (el.addEventListener) {
                el.addEventListener('input', function() {
                    setStyle(el, 1);
                }, false);
                setStyle(el)
            } else if (el.attachEvent) {
                el.attachEvent('onpropertychange', function() {
                    setStyle(el)
                })
                setStyle(el)
            }
            if (window.VBArray && window.addEventListener) { //IE9
                el.attachEvent("onkeydown", function() {
                    var key = window.event.keyCode;
                    if (key == 8 || key == 46) delayedResize(el);
                
                });
                el.attachEvent("oncut", function() {
                    delayedResize(el);
                }); //处理粘贴
            }
        }
    </script>
<style>
        .subnav{
            min-height:100%;
        }
        .item {
            transition:0.5s;
            background-color:#ced6e0;
            float: left;
            display: flex;
            flex-direction:column;
            font-size: 30px;
            color: aliceblue;
            margin-right: 15px;
            margin-top:15px;
            margin-bottom: 15px;
            width: 250px;
            border-radius:15px;
            overflow:auto;
            min-height:200px;
            padding-left:10px;
            padding-right:10px;
            padding-top:5px;
            padding-bottom:5px;
            position:absolute;
        }
        .title{
            text-align:center;
        }
        .content{
            font-size:15px;
            text-align:left;
            border:none;
            background-color:transparent;
            caret-color:transparent;
            resize:none;
            overflow:visible;
            color:white;
        }
        .content:focus{
            border:none;
            outline:none;
            caret-color:transparent;
        }
        .content_modifying{
            resize:none;
            outline:none;
            overflow:visible;
            
        }
        /* .content:before{
            content:"\00A0\00A0\00A0\00A0";
        } */
        .announce_content{
            resize:none;
            margin-top:10%;
            width:70%;
            border-top:none;
            border-left:none;
            border-right:none;
            border-bottom:5px solid whitesmoke;
            outline:none;
            background-color:transparent;
            transition:0.5s;
        }
        .announce_content:focus{
            resize:none;
            width:90%;
            outline:none;
            border-bottom:5px solid whitesmoke;
        }
        .announce{
            text-decoration: none;
            color: #fff;
            background-color: #00CCFF;
            padding: 2px;
            border-radius: 5px;
            transition: 0.5s;
            border:none;
            width:60px;
            height:30px;
        }
        .announce:hover{
            box-shadow:0px 0px 0px 2px #00CCFF;
        }
        .modify{
            margin-left:15px;
            background-color:transparent;
            text-decoration: none;
            color: #fff;
            padding: 2px;
            border-radius: 5px;
            transition: 0.5s;
            border:none;
        }
        .modify:hover{
            box-shadow:0px 0px 0px 2px ;
        }
        .modify_hidden{
            display:none;
        }
        .start_modify{
            color:#fff;
            text-decoration:none;
            border-radius:10px;
            transition:0.5s;
            width:30%;
            height:30px;
            cursor:pointer;
            background-color:transparent;
            border:none;
            text-align:center;
        }
        .start_modify:hover{
            box-shadow:0px 0px 0px 1px;
        }
        .delete{
            position:relative;
            margin-top:100px;
            color:#fff;
            text-decoration:none;
            border-radius:10px;
            transition:0.5s;
        }
        .delete:hover{
            box-shadow:0px 0px 0px 1px ;
        }
        #canvas{
        display: block;
        background:rgb(255, 255, 255) ;
        position:absolute;z-index:-2;
    }
    </style>
    <canvas id = "canvas"></canvas>
    <div class="head">
    
        <nav>
            <a href="admin.php" class="navlink" onclick='return alert_notlogin()'>管理员系统</a>
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
        <div class="box" id="outterbox">
            <div class="subnav" id="subnav">
                <div><a href="user.php" class="subnavlink_selected">主页</a></div>
                <div><a href="user_2_info_modify.php" class="subnavlink" onclick='return alert_notlogin()'>修改信息</a></div>
                <div><a href="user_3_event_query.php" class="subnavlink">查看活动</a></div>
                <div><a href="index.php" class="subnavlink" onclick='return alert_notlogin()'>申请管理权限</a></div>
            </div>
            <div id="admin_content" class="admin_content" style="display:flex;flex-direction:row;overflow:auto;">
                <div id="box">
                    <?php
           $sql="SELECT * FROM thing ORDER BY thing_no DESC";
           $result=mysqli_query($conn,$sql);
           $data=mysqli_fetch_all($result,MYSQLI_ASSOC);
           
           foreach($data as $value){
           foreach($value as $k=>$v){
               $arr[$k]=$v;}
           $r=rand(50,200);
           $g=rand(50,200);
           $b=rand(50,200);
           $thing_no=$arr['thing_no'];
           $power=$arr['power'];
                echo "<div class='item' style='background-color:rgb($r,$g,$b)'>
                <div class='title'>公告</div>
                <textarea name='power' class='content' id='content_$thing_no' readonly='true'>$power</textarea>
                <script>
                makeExpandingArea(content_$thing_no);
                </script>
            </div>";
           }
            ?> 
                </div>
            </div>
        </div>
    </div>
    <div class="bottom"></div>
    
</body>
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
    var items = document.getElementsByClassName('item');
    //定义间隙20像素
    var gap = 20;
    //进页面执行函数
    window.onload = function () {
        waterFall();
    }
    function waterFall() {
        //首先确定列数 = 页面的宽度 / 图片的宽度
        /* var pageWidth = getClient().width; */
        var pageWidth = document.getElementById("admin_content").offsetWidth;
        var itemWidth = items[0].offsetWidth;
        var columns = parseInt(pageWidth / (itemWidth + gap));
        var arr = [];//定义一个数组，用来存储元素的高度
        for(var i = 0;i < items.length; i++){
            if(i < columns) {
                //第一行
                items[i].style.top = 0;
                items[i].style.left =15+ document.getElementById("subnav").offsetWidth + (itemWidth + gap) * i + 'px';
                arr.push(items[i].offsetHeight);
            }else {
                //其他行，先找出最小高度列，和索引
                //假设最小高度是第一个元素
                var minHeight = arr[0];
                var index = 0;
                for(var j = 0; j < arr.length; j++){//找出最小高度
                   if(minHeight > arr[j]){
                       minHeight = arr[j];
                       index = j;
                   } 
                }
                //设置下一行的第一个盒子的位置
                //top值就是最小列的高度+gap
                items[i].style.top = arr[index] + gap + 'px';
                items[i].style.left = items[index].offsetLeft + 'px';
                //修改最小列的高度
                //最小列的高度 = 当前自己的高度 + 拼接过来的高度 + 间隙的高度
                arr[index] = arr[index] + items[i].offsetHeight + gap;
            }
        }
        for(var i=0;i<arr.length;i++){
            if(document.getElementById("subnav").style.height <arr[i]) {
                document.getElementById("subnav").style.height = 300 + arr[i]+'px';
            }
        }
    }
    //当页面尺寸发生变化时，触发函数，实现响应式
    window.onresize = function () {
        waterFall();
    }
    // clientWidth 处理兼容性
    function getClient() {
        return {
            width: window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth,
            height: window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight
        }
    }
    // scrollTop兼容性处理
    function getScrollTop() {
        return window.pageYOffset || document.documentElement.scrollTop;
    }
</script>
</html>