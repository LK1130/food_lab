let prices = document.querySelectorAll('.prices');

// Start Access Section
// start register
let username = document.getElementById('username'),
    phone = document.getElementById('phone'),
    email = document.getElementById('email'),
    addressNo = document.getElementById('addressNo'),
    addressTownship = document.getElementById('addressTownship'),
    addressCity = document.getElementById('addressCity'),
    password = document.getElementById('password');
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
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
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