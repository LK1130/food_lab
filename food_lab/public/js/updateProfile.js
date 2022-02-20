$(document).ready(function () {
    initial();

    firstClick();

    function firstClick() {
        document
            .getElementById("changePassword")
            .addEventListener("click", function () {
                $("#alertBox").toggleClass("visible");
            });
    }

    function initial() {
        var checkerror = document.getElementById("error").value;
        console.log(checkerror);
        if (checkerror == 1) {
            $("#alertBox").addClass("visible");
        }
        var checkerror2 = document.getElementById("error2").value;
        if (checkerror2 == 1) {
            $("#alertBox").addClass("visible");
        }
    }
});
