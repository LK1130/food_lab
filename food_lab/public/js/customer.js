let prices = document.querySelectorAll(".prices");

// Start Access Section
// start register
let username = document.getElementById("username"),
    phone = document.getElementById("phone"),
    email = document.getElementById("email"),
    addressNo = document.getElementById("addressNo"),
    addressTownship = document.getElementById("addressTownship"),
    addressCity = document.getElementById("addressCity"),
    password = document.getElementById("password");
// end register
// End Access Section

/*
 * Create : Min Khant(13/1/2022)
 * Update :
 * Explain of function : To separate thousand prices
 * Prarameter : string
 * return : thousand separator value
 * */
function addCommas(nStr) {
    nStr += "";
    var x = nStr.split(".");
    var x1 = x[0];
    var x2 = x.length > 1 ? "." + x[1] : "";
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, "$1" + "," + "$2");
    }
    return x1 + x2;
}

for (let i = 0; i < prices.length; i++) {
    prices[i].textContent = addCommas(prices[i].textContent);
}

// Start Access Section
// start register
// username.addEventListener('keypress',function (event){
//    let character = username.value;
//    if(character.length+1 < 6){
//        console.log('hay');
//    }
// });
// end register
// End Access Section

/*
 * Create : zayar(17/1/2022)
 * Update :
 * Explain of function : To toggle profile alert
 * Prarameter : no
 * return : toggle
 * */
firstClick();
back();
function firstClick() {
    document
        .getElementById("profileButton")
        .addEventListener("click", function () {
            document.getElementById("profileAlert").style.visibility =
                "visible";
        });
}
function back() {
    document.getElementById("back").addEventListener("click", function () {
        document.getElementById("profileAlert").style.visibility = "hidden";
    });
}

/*
 * Create : zayar(23/1/2022)
 * Update :
 * Explain of function : To toggle inform alert
 * Prarameter : no
 * return : toggle
 * */
firstClickInform();

function firstClickInform() {
    document
        .getElementById("informButton")
        .addEventListener("click", function () {
            document.getElementById("informAlert").style.visibility = "visible";
        });
}
clickInformBack();

function clickInformBack() {
    document
        .getElementById("backInform")
        .addEventListener("click", function () {
            document.getElementById("informAlert").style.visibility = "hidden";
        });
}
/*
 * Create : zayar(23/1/2022)
 * Update :
 * Explain of function : for initial ifrom alert
 * Prarameter : no
 * return : toggle
 * */
initialInformAlert();
function initialInformAlert() {
    document.getElementById("forNews").removeAttribute("id");
    document.getElementById("clickNews").style.borderBottom = "1px solid black";
}

/*
 * Create : zayar(23/1/2022)
 * Update :
 * Explain of function : To toggle inform alert headers
 * Prarameter : no
 * return : toggle
 * */
clickNews();

function clickNews() {
    document.getElementById("clickNews").addEventListener("click", function () {
        document.getElementsByClassName("forMessages")[0].id = "forMessages";
        document.getElementsByClassName("forTracks")[0].id = "forTracks";
        document.getElementById("forNews").removeAttribute("id");
        // document.getElementsByClassName("informAlert")[0].style.height = "60vh";
        document.getElementById("clickMessages").style.borderBottom = "";
        document.getElementById("clickNews").style.borderBottom =
            "1px solid black";
        document.getElementById("clickTracks").style.borderBottom = "";
    });
}

clickMessages();

function clickMessages() {
    document
        .getElementById("clickMessages")
        .addEventListener("click", function () {
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
}

clickTracks();

function clickTracks() {
    document
        .getElementById("clickTracks")
        .addEventListener("click", function () {
            document.getElementsByClassName("forNews")[0].id = "forNews";
            document.getElementsByClassName("forMessages")[0].id =
                "forMessages";
            document.getElementById("forTracks").removeAttribute("id");

            // document.getElementsByClassName("informAlert")[0].style.height =
            //     "70vh";
            document.getElementById("clickMessages").style.borderBottom = "";
            document.getElementById("clickNews").style.borderBottom = "";
            document.getElementById("clickTracks").style.borderBottom =
                "1px solid black";
        });
}
