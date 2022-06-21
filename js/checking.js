//登录/注册显示变换
function switcher_change_1() {
    document.getElementById("switcher1").className = "switcher1_active";
    document.getElementById("switcher2").className = "switcher2";
    document.getElementById("user_name").className = "inputer_unfold";
    document.getElementById("password").className = "inputer_unfold";

    document.getElementById("name_div").className = "inputer_div_sp_hide";
    document.getElementById("password_check_div").className = "inputer_div_sp_hide";
    document.getElementById("email_div").className = "inputer_div_sp_hide";
    document.getElementById("phone_number_div").className = "inputer_div_sp_hide";
    document.getElementById("class_div").className = "inputer_div_sp_hide";
    document.getElementById("institute_div").className = "inputer_div_sp_hide";
    document.getElementById("gender_div").className = "inputer_div_sp_hide";
    document.getElementById("name").className = "inputersp_hide";
    document.getElementById("password_check").className = "inputersp_hide";
    document.getElementById("email").className = "inputersp_hide";
    document.getElementById("phone_number").className = "inputersp_hide";
    document.getElementById("class").className = "inputersp_hide";
    document.getElementById("institute").className = "inputersp_hide";
    document.getElementById("gender_male").className = "gender_hide";
    document.getElementById("gender_female").className = "gender_hide";

    document.getElementById("name").value = "";
    document.getElementById("password_check").value = "";
    document.getElementById("email").value = "";
    document.getElementById("phone_number").value = "";
    document.getElementById("class").value = "";
    document.getElementById("institute").value = "";
    document.getElementById("gender_male").checked = false;
    document.getElementById("gender_female").checked = false;
    
    document.getElementById("submitbutton").value = "登陆";

    if(document.getElementById("switcher1").className == "switcher1_active"){
        document.getElementById("tips_repassword").style.display = "none";
        document.getElementById("tips_p_name").style.display = "none";
        document.getElementById("tips_email").style.display = "none";
        document.getElementById("tips_telephone").style.display = "none";
        document.getElementById("tips_class").style.display = "none";
        document.getElementById("tips_institute").style.display = "none";
        document.getElementById("user_gender").style.display = "none";
    }
}

function switcher_change_2() {
    document.getElementById("switcher2").className = "switcher2_active";
    document.getElementById("switcher1").className = "switcher1";
    document.getElementById("user_name").className = "inputer_fold";
    document.getElementById("password").className = "inputer_fold";

    document.getElementById("name_div").className = "";
    document.getElementById("password_check_div").className = "";
    document.getElementById("email_div").className = "";
    document.getElementById("phone_number_div").className = "";
    document.getElementById("class_div").className = "";
    document.getElementById("institute_div").className = "";
    document.getElementById("gender_div").className = "";
    document.getElementById("name").className = "inputersp";
    document.getElementById("password_check").className = "inputersp";
    document.getElementById("email").className = "inputersp";
    document.getElementById("phone_number").className = "inputersp";
    document.getElementById("class").className = "inputersp";
    document.getElementById("institute").className = "inputersp";
    document.getElementById("gender_male").className = "inputer";
    document.getElementById("gender_female").className = "inputer";

    document.getElementById("name").value = "";
    document.getElementById("password_check").value = "";
    document.getElementById("email").value = "";
    document.getElementById("phone_number").value = "";
    document.getElementById("class").value = "";
    document.getElementById("institute").value = "";
    document.getElementById("gender_male").checked = false;
    document.getElementById("gender_female").checked = false;

    document.getElementById("submitbutton").value = "注册";

    if(document.getElementById("switcher2").className == "switcher2_active"){
        document.getElementById("tips_repassword").style.display = "inline";
        document.getElementById("tips_repassword").innerHTML ="";
        document.getElementById("tips_p_name").style.display = "inline";
        document.getElementById("tips_p_name").innerHTML ="";
        document.getElementById("tips_email").style.display = "inline";
        document.getElementById("tips_email").innerHTML ="";
        document.getElementById("tips_telephone").style.display = "inline";
        document.getElementById("tips_telephone").innerHTML ="";
        document.getElementById("tips_class").style.display = "inline";
        document.getElementById("tips_class").innerHTML ="";
        document.getElementById("tips_institute").style.display = "inline";
        document.getElementById("tips_institute").innerHTML ="";
        document.getElementById("user_gender").style.display = "inline";
        document.getElementById("user_gender").innerHTML ="";
    }
}

//光标离焦与内容改变事件
window.onload = function () {
    document.getElementById("user_name").onblur = checkName;
    document.getElementById("password").onblur = checkPassword;
    document.getElementById("password_check").onblur = checkRePassword;
    document.getElementById("email").onblur = checkEmail;
    document.getElementById("phone_number").onblur = checkTelephone;
    document.getElementById("name").onblur = checkPersonalName;
    document.getElementById("institute").onblur = checkInstitute;
    document.getElementById("class").onblur = checkClass;
}



//检查用户名(账号)
function checkName() {
    var inputNode = document.getElementById("user_name");
    var nameLength = document.getElementById("user_name").value.length;
    //显示提示
    var spanNode = document.getElementById("tips_name");
    //获取输入框的内容
    var content = inputNode.value;
    //检测名字是否只包含字母数字和空格
    var reg = /^[0-9]*$/;
    if (document.getElementById("switcher1").className != "switcher1_active") {
            if (content == "" || nameLength <= 0) {
                spanNode.innerHTML = "账号不能为空".fontcolor("red");
                return false;
            }
            if (nameLength > 16) {
                spanNode.innerHTML = "账号名过长".fontcolor("red");
                return false;
            }
            if (reg.test(content)) {
                spanNode.innerHTML = "√".fontcolor("green");
                return true;
            }
            else {
                spanNode.innerHTML = "账号名格式错误，只支持数字组合".fontcolor("red");
                return false;
            }
    }
    else {
                 if (content == "" || nameLength <= 0) {
                        spanNode.innerHTML = "账号不能为空".fontcolor("red");
                        return false;
                    }
                    else{
                        spanNode.innerHTML = "√".fontcolor("green");
                        return true;
                 }
    }


}

function checkPassword() {
    var password = document.getElementById("password");
    var passwordLength = document.getElementById("password").value.length;
    var content = password.value;
    var spanNode = document.getElementById("tips_password");
    var reg_password = /^([a-zA-Zd])+(\w{6,12})+/;
    var flag = reg_password.test(content);
    if (document.getElementById("switcher1").className != "switcher1_active") {
        if (passwordLength > 15) {
            spanNode.innerHTML = "密码过长".fontcolor("red");
            return false;
        }
        else if (passwordLength < 6 && passwordLength > 0) {
            spanNode.innerHTML = "密码太短".fontcolor("red");
            return false;
        }
        if (flag) {
            spanNode.innerHTML = "√".fontcolor("green");
            return true;
        }
        else if (content == "") {
            spanNode.innerHTML = "密码不能为空".fontcolor("red");
            return false;
        }
        else {
            spanNode.innerHTML = "密码格式不正确".fontcolor("red");
            return false;
        }
    }
    else {
            if (content == "") {
                spanNode.innerHTML = "密码不能为空".fontcolor("red");
                return false;
            }
            else {
                spanNode.innerHTML = "√".fontcolor("green");
                return true;
            }
    }
}


//检查再次输入的密码
function checkRePassword() {
    var password = document.getElementById("password").value;
    var re_password = document.getElementById("password_check").value;
    var spanNode = document.getElementById("tips_repassword");
    if (document.getElementById("switcher1").className != "switcher1_active") {
        if (re_password != password) {
            spanNode.innerHTML = "两次输入的密码不一致".fontcolor("red");
            return false;
        }
        if (re_password != "") {
            spanNode.innerHTML = "√".fontcolor("green");
            return true;
        }
        else {
            spanNode.innerHTML = "请再次输入密码".fontcolor("red");
            return false;
        }
    }
}

//检查邮箱
function checkEmail() {
    var email = document.getElementById("email").value;
    var spanNode = document.getElementById("tips_email");
    //验证邮箱的正则
    var reg = /^[a-z0-9]\w+@[a-z0-9]+(\.[a-z]{2,3}){1,2}$/i;
    if (document.getElementById("switcher1").className != "switcher1_active") {
        if (email == "") {
            spanNode.innerHTML = "邮箱不能为空".fontcolor("red");
            return false;
        }
        if (reg.test(email)) {
            spanNode.innerHTML = "√".fontcolor("green");
            return true;
        }
        else {
            spanNode.innerHTML = "邮箱格式不正确".fontcolor("red");
            return false;
        }
    }
}


//检查手机号
function checkTelephone() {
    var telephone = document.getElementById("phone_number").value;
    var reg_telephone = /^(((13[0-9]{1})|(14[0-9]{1})|(17[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
    var flag = reg_telephone.test(telephone);
    var spanNode = document.getElementById("tips_telephone");
    if (document.getElementById("switcher1").className != "switcher1_active") {
        if (flag) {
            spanNode.innerHTML = "√".fontcolor("green");
            return true;
        } else if (telephone.value <= 0) {
            spanNode.innerHTML = "手机号不能为空".fontcolor("red");
            return false;
        } else {
            spanNode.innerHTML = "手机号格式错误".fontcolor("red");
            return false;
        }
    }
}


//检查性别
function checkGender() {
    var spanNode = document.getElementById("user_gender");
    //检查不能为空
    if (document.getElementById("switcher1").className != "switcher1_active") {
        if (!document.getElementById("gender_male").checked && !document.getElementById("gender_female").checked) {
            spanNode.innerHTML = "请填写性别".fontcolor("red");
            return false;
        }
        else {
            return true;
        }
    }
}

//检查姓名
function checkPersonalName() {
    var inputNode = document.getElementById("name");
    var pNameLength = document.getElementById("name").value.length;
    //显示提示
    var spanNode = document.getElementById("tips_p_name");
    //获取输入框的内容
    var content = inputNode.value;
    if (document.getElementById("switcher1").className != "switcher1_active") {
        if (content == "" || pNameLength <= 0) {
            spanNode.innerHTML = "姓名不能为空".fontcolor("red");
            return false;
        }
        else {
            spanNode.innerHTML = "√".fontcolor("green");
            return true;
        }
    }
}

//检查学院
function checkInstitute() {
    var inputNode = document.getElementById("institute");
    var instituteLength = document.getElementById("institute").value.length;
    //显示提示
    var spanNode = document.getElementById("tips_institute");
    //获取输入框的内容
    var content = inputNode.value;
    if (document.getElementById("switcher1").className != "switcher1_active") {
        if (content == "" || instituteLength <= 0) {
            spanNode.innerHTML = "学院不能为空".fontcolor("red");
            return false;
        }
        else {
            spanNode.innerHTML = "√".fontcolor("green");
            return true;
        }
    }
}

//检查班级
function checkClass() {
    var inputNode = document.getElementById("class");
    var instituteLength = document.getElementById("class").value.length;
    //显示提示
    var spanNode = document.getElementById("tips_class");
    //获取输入框的内容
    var content = inputNode.value;
    if (document.getElementById("switcher1").className != "switcher1_active") {
        if (content == "" || instituteLength <= 0) {
            spanNode.innerHTML = "班级不能为空".fontcolor("red");
            return false;
        }
        else {
            spanNode.innerHTML = "√".fontcolor("green");
            return true;
        }
    }
}


