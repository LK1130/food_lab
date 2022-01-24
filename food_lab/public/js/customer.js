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
let navbuttons = document.querySelector(".nav-buttons");
let prices = document.querySelectorAll(".prices");
let news = document.querySelectorAll(".news"),
    marquee = document.querySelector("marquee");
// Start Access Section
// start register
let username = document.getElementById("username"),
    phone = document.getElementById("phone"),
    email = document.getElementById("email"),
    addressNo = document.getElementById("addressNo"),
    addressTownship = document.getElementById("addressTownship"),
    addressCity = document.getElementById("addressCity"),
    password = document.getElementById("password"),
    cpassword = document.getElementById("cPassword"),
    createAccs = document.getElementById("createAccs");

let peye = document.querySelector(".pwd-eye"),
    peyeSlash = document.querySelector(".pwd-eye-slash");

let cpeye = document.querySelector(".cpwd-eye"),
    cpeyeSlash = document.querySelector(".cpwd-eye-slash");
// end register
// End Access Section

let importantNew = function () {
    if (news.length != 0) {
        for (let i = 0; i < news.length; i++) {
            let category = news[i].getAttribute("id");
            switch (category) {
                case "1":
                    news[i].style.color = "green";
                    break;
                case "2":
                    news[i].style.color = "red";
                    break;
                case "3":
                    news[i].style.color = "blue";
                    break;
                case "4":
                    news[i].style.color = "red";
                    break;
                case "5":
                    news[i].style.color = "black";
                    break;
            }
        }
    } else {
        marquee.style.display = "none";
    }
};

importantNew();

navbuttons.addEventListener("click", function () {
    console.log("hay");
    navbuttons.classList.toggle("changes");
});

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

// for password eye icon addEventListener
peyeSlash.addEventListener("click", function () {
    peyeSlash.style.display = "none";
    peye.style.display = "block";
    password.setAttribute("type", "text");
});

peye.addEventListener("click", function () {
    peye.style.display = "none";
    peyeSlash.style.display = "block";
    password.setAttribute("type", "password");
});

// for confirm password eye icon addEventListener
cpeyeSlash.addEventListener("click", function () {
    cpeyeSlash.style.display = "none";
    cpeye.style.display = "block";
    cpassword.setAttribute("type", "text");
});

cpeye.addEventListener("click", function () {
    cpeye.style.display = "none";
    cpeyeSlash.style.display = "block";
    cpassword.setAttribute("type", "password");
});

// for google signin
function onSignIn(googleUser) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr("content"),
        },
    });
    var profile = googleUser.getBasicProfile();
    let userData = {
        id: `${profile.getId()}`,
        name: `${profile.getName()}`,
        email: `${profile.getEmail()}`,
        all: `${profile}`,
    };

    $.ajax({
        type: "POST",
        url: "/google",
        data: userData,
        success: function (res) {
            username.value = res.name;
            email.value = res.email;
        },
        error: function (err) {
            console.log(err);
        },
    });
}

// for facebook login
function statusChangeCallback(response) {
    // Called with the results from FB.getLoginStatus().
    console.log("statusChangeCallback");
    console.log(response); // The current login status of the person.
    if (response.status === "connected") {
        // Logged into your webpage and Facebook.
        testAPI();
    } else {
        // Not logged into your webpage or we are unable to tell.
        document.getElementById("status").innerHTML =
            "Please log " + "into this webpage.";
    }
}

function checkLoginState() {
    // Called when a person is finished with the Login Button.
    FB.getLoginStatus(function (response) {
        // See the onlogin handler
        statusChangeCallback(response);
    });
}

window.fbAsyncInit = function () {
    FB.init({
        appId: "4571537182964313",
        cookie: true, // Enable cookies to allow the server to access the session.
        xfbml: true, // Parse social plugins on this webpage.
        version: "v7.0", // Use this Graph API version for this call.
    });

    FB.getLoginStatus(function (response) {
        // Called after the JS SDK has been initialized.
        statusChangeCallback(response); // Returns the login status.
    });
};

function testAPI() {
    // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
    console.log("Welcome!  Fetching your information.... ");
    FB.api("/me", function (response) {
        console.warn(
            "Thanks for logging in, " +
                response.name +
                "! and Email is " +
                response.email
        );
    });
}

createAccs.addEventListener("click", function () {
    (function ($) {
        "use strict";
        operate();
    })(window.jQuery);
});

// End Access Section
