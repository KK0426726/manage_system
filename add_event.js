
function checkActivityNumber(){
    var inputNode = document.getElementById("teach_no");
    var Length = document.getElementById("teach_no").value.length;
    var content = inputNode.value;
    if(content == "" || Length <= 0 || Length > 20){
        return false;
    }
    if (isNaN(Number(inputNode.value))) {
        return false;
    }
    else {
        return true;
    }
}

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

function checkChanges() {
        var addNumber = checkActivityNumber();
        var addName = checkActivityName();
        var addTime = checkActivityTime();
        var addPlace = checkActivityPlace();

        if (addNumber && addName && addTime && addPlace) {
            alert("添加成功");
            document.getElementsByName("activity").submit();
            return true;
        }
        else {
            alert("添加失败！");
            return false;
        }
}