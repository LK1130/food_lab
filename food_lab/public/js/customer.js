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

// for google signin 
function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log("ID: " + profile.getId()); // Don't send this directly to your server!
    console.log('Full Name: ' + profile.getName());
    console.log('Given Name: ' + profile.getGivenName());
    console.log('Family Name: ' + profile.getFamilyName());
    console.log("Image URL: " + profile.getImageUrl());
    console.log("Email: " + profile.getEmail());
}

// for facebook login 
function statusChangeCallback(response) { // Called with the results from FB.getLoginStatus().
    console.log('statusChangeCallback');
    console.log(response); // The current login status of the person.
    if (response.status === 'connected') { // Logged into your webpage and Facebook.
        testAPI();
    } else { // Not logged into your webpage or we are unable to tell.
        document.getElementById('status').innerHTML = 'Please log ' +
            'into this webpage.';
    }
}


function checkLoginState() { // Called when a person is finished with the Login Button.
    FB.getLoginStatus(function(response) { // See the onlogin handler
        statusChangeCallback(response);
    });
}


window.fbAsyncInit = function() {
    FB.init({
        appId: '4571537182964313',
        cookie: true, // Enable cookies to allow the server to access the session.
        xfbml: true, // Parse social plugins on this webpage.
        version: 'v7.0' // Use this Graph API version for this call.
    });


    FB.getLoginStatus(function(response) { // Called after the JS SDK has been initialized.
        statusChangeCallback(response); // Returns the login status.
    });
};

function testAPI() { // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
        console.log('Successful login for: ' + response.name);
        document.getElementById('status').innerHTML =
            'Thanks for logging in, ' + response.name + '! and Email is ' + response.email;
    });
}
// End Access Section