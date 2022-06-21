var color = document.getElementById("colorPanel");

function changeColor() {　

    var colorElements = new Array();

    colorElements[0] = document.getElementById("navbar");
    colorElements[1] = document.getElementById("gray");
    colorElements[2] = document.getElementById("grays");

    colorElements.forEach(element => {
        element.style.backgroundColor = color.value;
    });
    
}