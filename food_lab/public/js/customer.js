let prices = document.querySelectorAll('.prices');

let news = document.querySelectorAll('.news');

let importantNew = function() {
    for (let i = 0; i < news.length; i++) {
        console.log(news[i].getAttribute('id'));
        let category = news[i].getAttribute('id');
        switch (category) {
            case '1':
                news[i].style.color = 'green';
                break;
            case '2':
                news[i].style.color = 'red';
                break;
            case '3':
                news[i].style.color = 'blue';
                break;
            case '4':
                news[i].style.color = 'red';
                break;
            case '5':
                news[i].style.color = 'black';
                break;
        }
    }
}

importantNew();
// Start Access Section
// start register
let username = document.getElementById('username'),
    phone = document.getElementById('phone'),
    email = document.getElementById('email'),
    addressNo = document.getElementById('addressNo'),
    addressTownship = document.getElementById('addressTownship'),
    addressCity = document.getElementById('addressCity'),
    password = document.getElementById('password'),
    cpassword = document.getElementById('cPassword');

let peye = document.querySelector('.pwd-eye'),
    peyeSlash = document.querySelector('.pwd-eye-slash');

let cpeye = document.querySelector('.cpwd-eye'),
    cpeyeSlash = document.querySelector('.cpwd-eye-slash');
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

// for password eye icon addEventListener
peyeSlash.addEventListener('click', function() {
    peyeSlash.style.display = 'none';
    peye.style.display = 'block';
    password.setAttribute('type', 'text');
});

peye.addEventListener('click', function() {
    peye.style.display = 'none';
    peyeSlash.style.display = 'block';
    password.setAttribute('type', 'password');
});

// for confirm password eye icon addEventListener
cpeyeSlash.addEventListener('click', function() {
    cpeyeSlash.style.display = 'none';
    cpeye.style.display = 'block';
    cpassword.setAttribute('type', 'text');
});

cpeye.addEventListener('click', function() {
    cpeye.style.display = 'none';
    cpeyeSlash.style.display = 'block';
    cpassword.setAttribute('type', 'password');
});

// for google signin
function onSignIn(googleUser) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var profile = googleUser.getBasicProfile();
    let userData = {
        'id': `${profile.getId()}`,
        'name': `${profile.getName()}`,
        'email': `${profile.getEmail()}`,
        'all' : `${profile}`
    };

    $.ajax({
        type: 'POST',
        url: '/google',
        data: userData,
        success: function(res) {
            username.value = res.name;
            email.value = res.email;
        },
        error: function(err) {
            console.log(err);
        }
    });
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
        console.warn('Thanks for logging in, ' + response.name + '! and Email is ' + response.email);
    });
}
// End Access Section
