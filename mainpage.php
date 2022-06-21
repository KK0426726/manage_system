<?php
session_start();
$_SESSION['user_no'] = "";
$nowuser_no = $_SESSION['user_no'];
$conn = mysqli_connect('localhost', 'six', '123456', 'work');
$conn->query("SET NAMES UTF8");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>主界面</title>
    <link rel="stylesheet" href="css/mainpage.css">
    <link rel="stylesheet" href="css/checkingNode.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style3.css">
</head>

<body>
    <style>
        .backgroundparticle {
            position: absolute;
            display: block;
            top: 0;
            left: 0;
            z-index: 0;
        }

        .leftmsg {
            position: relative;
            width: 60%;
        }

        .rightform {
            position: relative;
            width: 40%;
            background-color: rgb(255, 255, 255);
        }

        .formbox {
            text-align: center;
            margin: 0 auto;
            width: 90%;
            height: 85%;
            top: 5%;
            position: relative;
            background-color: rgb(255, 255, 255, 0.7);
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            overflow: auto;
        }

        .wrapper {
            background: #5a5f5f;
            background: -webkit-linear-gradient(top bottom, #5a5f5f 0%, #b1b1b1 100%);
            background: linear-gradient(to bottom bottom, #5a5f5f 0%, #b1b1b1 100%);
            opacity: 0.3;
            position: absolute;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;

        }

        .bg-bubbles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .bg-bubbles li {
            position: absolute;
            list-style: none;
            display: block;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 30%;
            bottom: -160px;
            -webkit-animation: square 25s infinite;
            animation: square 25s infinite;
            -webkit-transition-timing-function: linear;
            transition-timing-function: linear;
        }

        .bg-bubbles li:nth-child(1) {
            left: 10%;
        }

        .bg-bubbles li:nth-child(2) {
            left: 20%;
            width: 80px;
            height: 80px;
            -webkit-animation-delay: 2s;
            animation-delay: 2s;
            -webkit-animation-duration: 17s;
            animation-duration: 17s;
        }

        .bg-bubbles li:nth-child(3) {
            left: 25%;
            -webkit-animation-delay: 4s;
            animation-delay: 4s;
        }

        .bg-bubbles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            -webkit-animation-duration: 22s;
            animation-duration: 22s;
            background-color: rgba(255, 255, 255, 0.25);
        }

        .bg-bubbles li:nth-child(5) {
            left: 70%;
        }

        .bg-bubbles li:nth-child(6) {
            left: 80%;
            width: 120px;
            height: 120px;
            -webkit-animation-delay: 3s;
            animation-delay: 3s;
            background-color: rgba(255, 255, 255, 0.2);
        }

        .bg-bubbles li:nth-child(7) {
            left: 32%;
            width: 160px;
            height: 160px;
            -webkit-animation-delay: 7s;
            animation-delay: 7s;
        }

        .bg-bubbles li:nth-child(8) {
            left: 55%;
            width: 20px;
            height: 20px;
            -webkit-animation-delay: 15s;
            animation-delay: 15s;
            -webkit-animation-duration: 40s;
            animation-duration: 40s;
        }

        .bg-bubbles li:nth-child(9) {
            left: 25%;
            width: 10px;
            height: 10px;
            -webkit-animation-delay: 2s;
            animation-delay: 2s;
            -webkit-animation-duration: 40s;
            animation-duration: 40s;
            background-color: rgba(255, 255, 255, 0.3);
        }

        .bg-bubbles li:nth-child(10) {
            left: 80%;
            width: 160px;
            height: 160px;
            -webkit-animation-delay: 11s;
            animation-delay: 11s;
        }

        @-webkit-keyframes square {
            0% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }

            100% {
                -webkit-transform: translateY(-1400px) rotate(600deg);
                transform: translateY(-1400px) rotate(600deg);
            }
        }

        @keyframes square {
            0% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }

            100% {
                -webkit-transform: translateY(-1400px) rotate(600deg);
                transform: translateY(-1400px) rotate(600deg);
            }
        }

        #canvas {
            display: block;
            background: rgb(255, 255, 255);
            position: absolute;
            z-index: -2;
        }
    </style>
    <canvas id="canvas"></canvas>
    <!-- 在这里加入点击特效 -->
    <script src="click_effect/anime.js"></script>
    <script src="click_effect/fireworks.js"></script>
    <canvas class="fireworks" width="100%" height="100%" style="position: fixed;z-index:13;pointer-events: none;opacity: 0.7;"></canvas>

    <div class="head">
        <nav>
            <a href="mainpage.php" class="navlink">主页</a>
            <a href="admin.php" class="navlink">管理员系统</a>
            <a href="user.php" class="navlink">用户系统</a>
            <a href="about.php" class="navlink">关于我们</a>
            <div class="animation start-mainpage"></div>
            <div class="dropdown">
                <a href='' class='dropdown_trigger'></a>
                <div class='dropdown_content'>
                    <a href='user_2_info_modify.php' class='all'>修改信息</a>
                    <a href='user.php' class='all'>我的通知</a>
                    <a href='action_log_out.php'>注销</a>
                </div>
                <?php
                if ($nowuser_no != '') {
                    echo
                    "<a href='' class='dropdown_trigger'>{$nowuser_no}</a>
                        <div class='dropdown_content'>
                        <a href='user_2_info_modify.php' class='all'>修改信息</a>
                        <a href='user.php' class='all'>我的通知</a>
                        <a href='action_log_out.php'>注销</a>
                        </div>";
                } else {
                    echo "<a href='mainpage.php' class='dropdown_trigger'>未登录</a>";
                }
                ?>
            </div>
        </nav>
    </div>
    <div class="body">
        <div class="box">
            <div class="wrapper">
                <ul class="bg-bubbles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            <div class="leftmsg">
                <div class="wrapper">
                    <ul class="bg-bubbles">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>

            <div class="rightform">
                <div class="wrapper">
                    <ul class="bg-bubbles">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <div class="formbox" >
                    <div class="switchzone">
                        <button class="switcher1_active" id="switcher1" onclick="switcher_change_1()">登陆</button><span>/</span><button class="switcher2" id="switcher2" onclick="switcher_change_2()">注册</button>
                    </div>
                    <form action="login.php" class="formbody" id="formbody" onsubmit="return checkForm()" method="POST" onload="" autocomplete="off">
                        <div title="账号只由数字组成">
                            <input type="text" placeholder="账号" class="inputer_unfold" id="user_name" name="user_no">
                        </div>
                        <span class="tips" id="tips_name"></span>

                        <div title="密码长度在6-14之间，且由必须符合字母+数字的格式">
                            <input type="password" placeholder="密码" class="inputer_unfold" id="password" name="password">
                        </div>
                        <span class="tips" id="tips_password"></span>

                        <div class="inputer_div_sp_hide" id="password_check_div">
                            <input type="password" placeholder="确认密码" class="inputersp_hide" id="password_check" name="repass">
                        </div>
                        <span class="tips" id="tips_repassword"></span>

                        <div class="inputer_div_sp_hide" id="name_div">
                            <input type="text" placeholder="姓名" class="inputersp_hide" id="name" name="username">
                        </div>
                        <span class="tips" id="tips_p_name"></span>

                        <div class="inputer_div_sp_hide" id="email_div" title="邮箱必须符合xxx@xx.xxx的格式">
                            <input type="text" placeholder="邮箱" class="inputersp_hide" id="email" name="email">
                        </div>
                        <span class="tips" id="tips_email"></span>

                        <div class="inputer_div_sp_hide" id="phone_number_div" title="手机号必须符合13/14/15/18开头的格式">
                            <input type="text" placeholder="手机号码" class="inputersp_hide" id="phone_number" name="phone">
                        </div>
                        <span class="tips" id="tips_telephone"></span>

                        <div class="inputer_div_sp_hide" id="class_div">
                            <input type="text" placeholder="班级" class="inputersp_hide" id="class" name="class">
                        </div>
                        <span class="tips" id="tips_class"></span>

                        <div class="inputer_div_sp_hide" id="institute_div">
                            <input type="text" placeholder="学院" class="inputersp_hide" id="institute" name="scl">
                        </div>
                        <span class="tips" id="tips_institute"></span>

                        <div class="inputer_div_sp_hide" id="gender_div">
                            <div class="gender">
                                <input type="radio" name="gender" class="gender_hide" value="1" id="gender_male" checked="">
                                <label for="gender_male" class="gender_label">男</label>
                                <input type="radio" name="gender" class="gender_hide" value="2" id="gender_female">
                                <label for="gender_female" class="gender_label">女</label>
                            </div>
                            <span class="tips" id="user_gender"></span>
                        </div>




                        <div class="rolling_box" id="rolling_box">
                            <div class="rolling_code_bar" style="cursor:default;">
                                <div class="top_bar"></div>
                                <div class="bottom_bar" style="font-weight: 700;"> > </div>
                                <div class="small_tips" style="cursor:default;">请向右滑动 >></div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" value="登陆" class="submitbutton" id="submitbutton">登录
                            </button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
        <div class="bottom">
            <div class="footer-sections container"></div>
            <div class="footer-pylo">
                <div class="container">
                    <div class="down-left">
                        Copyright © 2020-2021 ACMer - All Rights Reserved.
                    </div>
                    <div class="down-right">
                        <div class="tools">
                            <ul>
                                <li><a class="tool" href="#"><i class="fa fa-1" aria-hidden="true" alt="" onclick="location.reload();"></i></a></li>
                                <li><a class="tool" href="#"><i class="fa fa-2" aria-hidden="true"></i></a></li>
                                <li><a class="tool">
                                        <input class="fa fa-3" aria-hidden="true" type="color" id="colorPanel" onchange="changeColor();" style="border:0; padding:0; outline:none; background-color:transparent; overflow:hidden; width:30px; height:36px;top:2px;position: relative; cursor:pointer"></input>
                                    </a>
                                </li>
                                <li><a class="tool" href="#"><i class="fa fa-4" aria-hidden="true"></i></a></li>
                                <li><a class="tool" href="#"><i class="fa fa-5" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  TODO HTML JS加入-->
    <script type="text/javascript" src="js/checking.js"></script>
    <script type="text/javascript" src="js/checkingNode.js"></script>
    <script type="text/javascript" src="js/checkingLogin.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script>
        function getViewPortWidth() {
            return document.documentElement.clientWidth || document.body.clientWidth;
        }

        function getViewPortHeight() {
            return document.documentElement.clientHeight || document.body.clientHeight;
        }

        var width = height = size = hsize = diff = "";
        var sizeW = getViewPortWidth();
        var sizeH = getViewPortHeight();

        width = '300';
        height = '40';
        size = '6';
        hsize = '12';
        diff = 0.001;
        verifyFun(diff);
        var back_color = '#0a6af9';


        window.onload = function() {
            document.getElementById("user_name").onchange = checkName;
            document.getElementById("password").onchange = checkPassword;
            document.getElementById("password_check").oninput = checkRePassword;
            document.getElementById("email").oninput = checkEmail;
            document.getElementById("phone_number").oninput = checkTelephone;
            document.getElementById("name").oninput = checkPersonalName;
            document.getElementById("institute").oninput = checkInstitute;
            document.getElementById("class").oninput = checkClass;
        }

        function checkForm() {
            if (document.getElementById("switcher1").className != "switcher1_active") {
                var add_name = checkName();
                var add_email = checkEmail();
                var add_password = checkPassword();
                var re_password = checkRePassword();
                var add_telephone = checkTelephone();
                var add_gender = checkGender();
                var add_institute = checkInstitute();
                var add_class = checkClass();
                var add_p_name = checkPersonalName();
                var node_checking = document.getElementById('rolling_box').children[0].style.backgroundColor;

                if (add_name && add_telephone && add_email && add_password && re_password && add_class && add_institute && add_p_name && add_gender && (node_checking == "rgb(152, 251, 152)")) {
                    document.getElementById("formbody").submit();
                    return true;
                } else {
                    alert("注册失败，请按提示输入信息！");
                    return false;
                }
            }
            if (document.getElementById("switcher1").className == "switcher1_active") {
                var add_name = checkName_login();
                var add_password = checkPassword_login();
                var node_checking = document.getElementById('rolling_box').children[0].style.backgroundColor;
                if (add_name && add_password && (node_checking === "rgb(152, 251, 152)")) {
                    document.getElementById("formbody").submit();
                    return true;
                } else {
                    alert("登录失败，请按提示输入信息！");
                    return false;
                }
            }
        }

        // 按钮点击响应对应位置的波纹效果
        $(document).ready(function() {
            $('.submitbutton').rkmd_rippleEffect();
        });

        (function($) {
            $.fn.rkmd_rippleEffect = function() {
                var btn, self, ripple, size, rippleX, rippleY, eWidth, eHeight;

                btn = $(this).not('[disabled], .disabled');

                btn.on('mousedown', function(e) {
                    self = $(this);

                    // Disable right click
                    if (e.button === 2) {
                        return false;
                    }

                    if (self.find('.ripple').length === 0) {
                        self.prepend('<span class="ripple"></span>');
                    }
                    ripple = self.find('.ripple');
                    ripple.removeClass('animated');

                    eWidth = self.outerWidth();
                    eHeight = self.outerHeight();
                    size = Math.max(eWidth, eHeight);
                    ripple.css({
                        'width': size,
                        'height': size
                    });

                    rippleX = parseInt(e.pageX - self.offset().left) - (size / 2);
                    rippleY = parseInt(e.pageY - self.offset().top) - (size / 2);

                    ripple.css({
                        'top': rippleY + 'px',
                        'left': rippleX + 'px'
                    }).addClass('animated');

                    setTimeout(function() {
                        ripple.remove();
                    }, 800);

                });
            };
        }(jQuery));
    </script>
    <script>
        window.requestAnimationFrame = (function() {
            return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                function(callback) {
                    window.setTimeout(callback, 1000 / 2);
                };
        })();
        var myCanvas = document.getElementById("canvas");
        var ctx = myCanvas.getContext("2d"); //getContext 设置画笔
        var num = 250;
        var w, h;
        var duixiang = [];
        var move = {};

        function widthheight() {
            w = myCanvas.width = window.innerWidth;
            h = myCanvas.height = window.innerHeight;
            for (var i = 0; i < num; i++) {
                duixiang[i] = {
                    x: Math.random() * w,
                    y: Math.random() * h,
                    cX: Math.random() * 0.6 - 0.3,
                    cY: Math.random() * 0.6 - 0.3
                }
                console.log(duixiang[i])
                Cricle(duixiang[i].x, duixiang[i].y);
            }
        };
        widthheight(); //获取浏览器的等宽度等高

        function Cricle(x, y) {
            ctx.save(); //保存路径
            ctx.fillStyle = "royalblue"; //填充的背景颜色
            ctx.beginPath(); //开始绘画
            ctx.arc(x, y, 1, Math.PI * 2, 0); //绘画圆 x y 半径（大小） 角度  一个PI 是180 * 2 = 360    真假 0/1 true/false
            ctx.closePath(); //结束绘画
            ctx.fill(); //填充背景颜色
            ctx.restore(); //回复路径
        };
        Cricle();


        ! function draw() {
            ctx.clearRect(0, 0, w, h) //先清除画布上的点
            for (var i = 0; i < num; i++) {
                duixiang[i].x += duixiang[i].cX;
                duixiang[i].y += duixiang[i].cY;
                if (duixiang[i].x > w || duixiang[i].x < 0) {
                    duixiang[i].cX = -duixiang[i].cX;
                }
                if (duixiang[i].y > h || duixiang[i].y < 0) {
                    duixiang[i].cY = -duixiang[i].cY;
                }
                Cricle(duixiang[i].x, duixiang[i].y);
                //勾股定理判断两点是否连线
                for (var j = i + 1; j < num; j++) {
                    if ((duixiang[i].x - duixiang[j].x) * (duixiang[i].x - duixiang[j].x) + (duixiang[i].y - duixiang[j].y) * (duixiang[i].y - duixiang[j].y) <= 55 * 55) {
                        line(duixiang[i].x, duixiang[i].y, duixiang[j].x, duixiang[j].y)
                    }
                    if (move.x) {
                        if ((duixiang[i].x - move.x) * (duixiang[i].x - move.x) + (duixiang[i].y - move.y) * (duixiang[i].y - move.y) <= 100 * 100) {
                            line(duixiang[i].x, duixiang[i].y, move.x, move.y)
                        }
                    }
                }
            }
            window.requestAnimationFrame(draw)
        }();

        //绘制线条
        function line(x1, y1, x2, y2) {
            var color = ctx.createLinearGradient(x1, y1, x2, y2);
            color.addColorStop(0, "#FFCCCC");
            color.addColorStop(1, "#FFDDDD");
            //ctx.save();
            ctx.strokeStyle = color;
            ctx.beginPath();
            ctx.moveTo(x1, y1);
            ctx.lineTo(x2, y2);
            ctx.stroke();
            //ctx.restore();
        }


        document.onmousemove = function(e) {
            move.x = e.clientX;
            move.y = e.clientY;
        }
        console.log(move)

        window.onresize = function() {
            location.reload();
        }
    </script>
</body>

</html>