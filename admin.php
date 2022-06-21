<?php
session_start();
$nowuser_no=$_SESSION['user_no'];
$conn=mysqli_connect('localhost','six','123456','work');
$conn->query("SET NAMES UTF8");
$admin="SELECT * FROM gly WHERE name='$nowuser_no'";
$result=mysqli_query($conn,$admin);
$row=mysqli_num_rows($result);
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
    <link rel="stylesheet" href="admin.css">
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
}.dropdown{
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
        .subnav{
            min-height:100%;
        }
        .item {
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
            transition:0.5s;
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
        /* .announce_content::placeholder{
            padding-top:50px;
        } */
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
    </style>
    <canvas id = "canvas"></canvas>
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
        <div class="box" id="outterbox">
        <?php
        if($row==1){
           echo '
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
           var items = document.getElementsByClassName("item");
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
                       items[i].style.left =15+ document.getElementById("subnav").offsetWidth + (itemWidth + gap) * i + "px";
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
                       items[i].style.top = arr[index] + gap + "px";
                       items[i].style.left = items[index].offsetLeft + "px";
                       //修改最小列的高度
                       //最小列的高度 = 当前自己的高度 + 拼接过来的高度 + 间隙的高度
                       arr[index] = arr[index] + items[i].offsetHeight + gap;
                   }
               }
               for(var i=0;i<arr.length;i++){
                   if(document.getElementById("subnav").style.height < arr[i]) {
                       document.getElementById("subnav").style.height = 300 + arr[i]+"px";
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
               function judge(){
                   var content = document.getElementById("announce_content").value;
                   if(content.length <= 0 ||content == ""){
                       alert("求您写点啥吧！");
                       return false;
                   }
                   else{
                       return true;
                   }
               }
               var count = 0;
               function change_modify(thing_no){
                   if(document.getElementById("start_modify_"+thing_no).innerHTML == "修改"){
                       if(count > 0){
                           alert("已经有正在修改的公告！");
                           location.reload();
                       }
                       document.getElementById("content_"+thing_no).className = "content_modifying";
                       document.getElementById("content_"+thing_no).readOnly = false;
                       document.getElementById("modify_"+thing_no).className = "modify";
                       document.getElementById("start_modify_"+thing_no).innerHTML="取消";
                       count ++;
                   }
                   else{
                       document.getElementById("content_"+thing_no).className = "content";
                       document.getElementById("content_"+thing_no).readOnly = true;
                       document.getElementById("modify_"+thing_no).className = "modify_hidden";
                       document.getElementById("start_modify_"+thing_no).innerHTML="修改";
                       location.reload();
                   }
               }
               function makeExpandingArea(el) {
                   var timer = null;
                   //由于ie8有溢出堆栈问题，故调整了这里
                   var setStyle = function(el, auto) {
                       if (auto) el.style.height = "auto";
                       el.style.height =30 + el.scrollHeight + "px";
                       if((el.height + el.top + 30) > document.getElementById("subnav").style.height){
                           document.getElementById("subnav").style.height = el.height + el.top + 300 + "px";
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
                       el.addEventListener("input", function() {
                           setStyle(el, 1);
                       }, false);
                       setStyle(el)
                   } else if (el.attachEvent) {
                       el.attachEvent("onpropertychange", function() {
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
                <div class="subnav" id="subnav">
                <div><a href="admin.php" class="subnavlink_selected">主页</a></div>
                <div><a href="admin_2_add_admin.php" class="subnavlink">管理员管理</a></div>
                <div><a href="admin_3_user_manage.php" class="subnavlink">用户管理</a></div>
                <div><a href="admin_4_event_manage.php" class="subnavlink">活动管理</a></div>
                <div><a href="admin_5_user_search.php" class="subnavlink">查找用户</a></div>
            </div>
            <div id="admin_content" class="admin_content" style="display:flex;flex-direction:row;overflow:auto;">
                <div id="box">
                    <div class="item">
                        <div class="title">发布公告</div>
                        <form method ="POST" action="things_add.php" onsubmit="return judge()">
                        <div><textarea name="things" id="announce_content" placeholder="在这里写下通知内容" class="announce_content" oninput="waterFall()"></textarea></div>
                        <script>
                        makeExpandingArea(announce_content);
                        </script>
                        <div><input type="submit" value="发布" class="announce"></div>
                        </form>
                        <div class="content"></div>
                        
                    </div>';
        
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
                <form action='add_announce.php' method='post'>
                <input type='hidden' name='thing_no' value='$thing_no'>

                <textarea name='power' class='content' id='content_$thing_no' readonly='true' oninput='waterFall()'>$power</textarea>
                <input type='submit' value='确认' class='modify_hidden' id='modify_$thing_no' >
                </form>
                <div style='text-align:center'><button onclick='change_modify($thing_no)' class='start_modify' id='start_modify_$thing_no'>修改</button></div>
                
                <a href='delete_announce.php?thing_no={$thing_no}' class='delete' id='delete_$thing_no'>删除</a>
                <script>
                makeExpandingArea(content_$thing_no);
                </script>
            </div>";
            /* <input type='text' name='power' value='$power' class='content' id='content_$thing_no' readonly='true'> */
           }}
           else{
            echo "
            <script>
            function alert_notlogin(){
                if(!$nowuser)
                {
                    alert('您还没登陆');
                    window.location = 'mainpage.php';
                    return false;
                }
                else if(!$row){
                    alert('您没有权限');
                    window.location = 'index.php';
                    return false;
                }
            }
            </script>
            <div class='subnav'>
            <div><a href='' class='subnavlink_selected' onclick='return alert_notlogin()'>主页</a></div>
            <div><a href='' class='subnavlink' onclick='return alert_notlogin()'>管理员管理</a></div>
            <div><a href='' class='subnavlink' onclick='return alert_notlogin()'>用户管理</a></div>
            <div><a href='' class='subnavlink' onclick='return alert_notlogin()'>活动管理</a></div>
            <div><a href='' class='subnavlink' onclick='return alert_notlogin()'>查找用户</a></div>
        </div>
        <div class='admin_content' style='display:flex;flex-direction:row;'>
            <div class='about' style='width:100%;height:90%;margin-left:0.5%;text-align:center;float:left;margin-top:5px;border-radius:5px;'>
                <h1>关于管理员系统</h1>
                <p style='text-align:center;'>没有权限！！！！！</p>
                <br>
                <a href='index.php' class='input_button'>点击申请</a>
            </div>
           
        </div>
     </div>
     </div>";
           }
            ?> 
                </div>
            </div>
        </div>
    </div>
    <div class="bottom"></div>
  
</body>
</html>