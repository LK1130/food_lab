/*
 * Create : zayar(17/1/2022)
 * Update :
 * Explain of function : To toggle profile alert
 * Prarameter : no
 * return : toggle
 * */
firstClick();
back();
initial();
function firstClick() {
    var el = document.getElementById("changePassword");

    el.addEventListener("click", function () {
        document.getElementById("alertBox").style.visibility = "visible";
    });
}

function back() {
    document.getElementById("back").addEventListener("click", function () {
        document.getElementById("alertBox").style.visibility = "hidden";
    });
}
function initial() {
    var checkerror = document.getElementById("error").value;
    if (checkerror == 0) {
        document.getElementById("alertBox").style.visibility = "hidden";
    } else {
        document.getElementById("alertBox").style.visibility = "visible";
    }
}
