/*
 * Create : zayar(17/1/2022)
 * Update :
 * Explain of function : To toggle profile alert
 * Prarameter : no
 * return : toggle
 * */

// document.getElementById("profileButton").addEventListener("click", function () {
//     console.log("hay");
//     document.getElementById("profileAlert").style.display = "block";
// });

// document.getElementById("back").addEventListener("click", function () {
//     document.getElementById("profileAlert").style.display = "none";
// });

/*
 * Create : zayar(23/1/2022)
 * Update :
 * Explain of function : To toggle inform alert
 * Prarameter : no
 * return : toggle
 * */
document.getElementById("informButton").addEventListener("click", function () {
    document.getElementById("informAlert").style.display = "block";
});

document.getElementById("backInform").addEventListener("click", function () {
    document.getElementById("informAlert").style.display = "none";
});

/*
 * Create : zayar(23/1/2022)
 * Update :
 * Explain of function : for initial ifrom alert
 * Prarameter : no
 * return : toggle
 * */

document.getElementById("forNews").removeAttribute("id");
document.getElementById("clickNews").style.borderBottom = "1px solid black";

/*
 * Create : zayar(23/1/2022)
 * Update :
 * Explain of function : To toggle inform alert headers
 * Prarameter : no
 * return : toggle
 * */

document.getElementById("clickNews").addEventListener("click", function () {
    document.getElementsByClassName("forMessages")[0].id = "forMessages";
    document.getElementsByClassName("forTracks")[0].id = "forTracks";
    document.getElementById("forNews").removeAttribute("id");
    // document.getElementsByClassName("informAlert")[0].style.height = "60vh";
    document.getElementById("clickMessages").style.borderBottom = "";
    document.getElementById("clickNews").style.borderBottom = "1px solid black";
    document.getElementById("clickTracks").style.borderBottom = "";
});

document.getElementById("clickMessages").addEventListener("click", function () {
    document.getElementsByClassName("forNews")[0].id = "forNews";
    document.getElementsByClassName("forTracks")[0].id = "forTracks";
    document.getElementById("forMessages").removeAttribute("id");

    document.getElementById("clickMessages").style.borderBottom =
        "1px solid black";
    document.getElementById("clickNews").style.borderBottom = "";
    document.getElementById("clickTracks").style.borderBottom = "";
    // document.getElementsByClassName("informAlert")[0].style.height =
    //     "60vh";
});

document.getElementById("clickTracks").addEventListener("click", function () {
    document.getElementsByClassName("forNews")[0].id = "forNews";
    document.getElementsByClassName("forMessages")[0].id = "forMessages";
    document.getElementById("forTracks").removeAttribute("id");

    // document.getElementsByClassName("informAlert")[0].style.height =
    //     "70vh";
    document.getElementById("clickMessages").style.borderBottom = "";
    document.getElementById("clickNews").style.borderBottom = "";
    document.getElementById("clickTracks").style.borderBottom =
        "1px solid black";
});
