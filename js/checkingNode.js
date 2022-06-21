var width=height=size=hsize=diff="";

function verifyFun(diff) {
//width:块宽，height:块高，hsize:文字大小，size:滑动块箭头字体大小,diff:误差值
	var verifyBox = document.getElementById('rolling_box').children[0];
	var verifyLayer = document.getElementById('rolling_box').children[0].children[0];
	var verifyDom = document.getElementById('rolling_box').children[0].children[1];
	var verifyTip = document.getElementById('rolling_box').children[0].children[2];
	var slideNum = parseInt(width) - parseInt(height);
    var x = 0;
    var y = 0;
    var l = 0;
    var t = 0;
    var flag = false;

	verifyTip.style.fontSize = parseInt(hsize) + 'px';
	verifyTip.style.lineHeight = parseInt(height) + 'px';


	verifyDom.onmousedown = function (e) {
		clickPoint(e);
	}
	verifyDom.onmousemove = function (e) {
		movingPoint(e);
	}
	verifyDom.onmouseup = function (e) {
		leavingPoint(e);
	}

	verifyDom.ontouchstart = function (e) {
		clickPoint(e);
	}

	verifyDom.ontouchmove = function (e) {
		movingPoint(e);
	}

	verifyDom.ontouchend = function (e) {
		leavingPoint(e);
	}
	verifyDom.onmouseout = function (e) {
		flag = false;
		var ll = verifyDom.offsetLeft;
		if (ll < (slideNum - diff)) {
			verifyDom.style.left = l + 'px';
			verifyDom.style.top = t + 'px';
			verifyLayer.style.zIndex = 1;
		}
	}

	function clickPoint(e) {
		x = typeof (e.clientX) !== "undefined" ? e.clientX : e.changedTouches[0].clientX;
		y = typeof (e.clientY) !== "undefined" ? e.clientY : e.changedTouches[0].clientY;
		l = verifyDom.offsetLeft;
		t = verifyDom.offsetTop;
		flag = true;
	}

	function movingPoint(e) {
		if (flag == false) {
			return;
		}
		var nx = typeof (e.clientX) !== "undefined" ? e.clientX : e.changedTouches[0].clientX;
		var ny = typeof (e.clientY) !== "undefined" ? e.clientY : e.changedTouches[0].clientY;
		ny = y;
		nx = nx < x ? x : nx;
		nx = nx - slideNum > x ? slideNum + x : nx;
		var nl = nx - (x - l);
		var nt = ny - (y - t);
		verifyDom.style.left = nl + 'px';
		verifyDom.style.top = nt + 'px';
		if (nl > (slideNum - diff)) {
			verifyDom.style.left = slideNum + 'px';
			verifyDom.style.top = t + 'px';
			verifyLayer.style.zIndex = 5;
			verifyDom.innerHTML = '√';
			verifyDom.style.color = 'green';
			document.getElementById('rolling_box').children[0].style.border = '1px solid #0a6af9';
		
			verifyTip.innerText = '验证通过!';
			verifyBox.style.backgroundColor = "#98FB98";
		}
	}

	function leavingPoint(e) {
		flag = false;
		var ll = verifyDom.offsetLeft;
		if (ll < (slideNum - diff)) {
			verifyDom.style.left = l + 'px';
			verifyDom.style.top = t + 'px';
		} else {
			verifyDom.style.left = slideNum + 'px';
			verifyDom.style.top = t + 'px';
			verifyLayer.style.zIndex = 5;
			verifyDom.innerHTML = '√';
			verifyDom.style.color = 'green';
			document.getElementById('rolling_box').children[0].style.border = '1px solid #0a6af9';

			verifyTip.innerText = '验证通过!';
			verifyBox.style.backgroundColor = "#98FB98";
		}
	}
}
