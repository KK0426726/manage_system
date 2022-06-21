//检查用户名(账号)
function checkName_login(){
    var inputNode = document.getElementById("user_name");
    var nameLength = document.getElementById("user_name").value.length;
    var spanNode = document.getElementById("tips_name");
    var content = inputNode.value;
    if (content == "" || nameLength <= 0) {
        spanNode.innerHTML = "账号不能为空".fontcolor("red");
        return false;
    }
    else{
        spanNode.innerHTML = "√".fontcolor("green");
        return true;
    }
}

//检查密码
function checkPassword_login(){
     var password = document.getElementById("password");
        var passwordLength = document.getElementById("password").value.length;
        var content = password.value;
        var spanNode = document.getElementById("tips_password");
        if (content == "") {
            spanNode.innerHTML = "密码不能为空".fontcolor("red");
            return false;
        }
        else {
            spanNode.innerHTML = "√".fontcolor("green");
            return true;
        }
}