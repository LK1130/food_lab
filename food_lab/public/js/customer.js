let navbuttons = document.querySelector(".nav-buttons");
let prices = document.querySelectorAll(".prices");
let importantnews = document.querySelectorAll(".importantnews"),
    marquee = document.querySelector("marquee");

let importantNew = function() {
    if (importantnews.length != 0) {
        for (let i = 0; i < importantnews.length; i++) {
            let category = importantnews[i].getAttribute("id");
            switch (category) {
                case "1":
                    importantnews[i].style.color = "green";
                    break;
                case "2":
                    importantnews[i].style.color = "red";
                    break;
                case "3":
                    importantnews[i].style.color = "blue";
                    break;
                case "4":
                    importantnews[i].style.color = "red";
                    break;
                case "5":
                    importantnews[i].style.color = "black";
                    break;
            }
        }
    } else {
        marquee.style.display = "none";
    }
};

importantNew();

navbuttons.addEventListener("click", function() {
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