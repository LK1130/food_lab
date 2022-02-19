let radionbutton = document.querySelectorAll("input[type='radio']"),
    coin = document.querySelector('.coin'),
    cash = document.querySelector('.cash');

let order = document.querySelector('.order');

$(document).ready(function() {
    $('#phone').bind('cut copy paste', function(event) {
        event.preventDefault();
    });
});

document.getElementById('phone').addEventListener('keydown', (e) => {
    let reg = new RegExp(/^([0-9+-]{1,})$/);
    if (reg.test(e.key) == true || e.key == 'Backspace') {
        console.log('true');
    } else {
        e.preventDefault();
        console.log('false');
    }
});

radionbutton[0].addEventListener('click', () => {
    coin.style.display = 'block';
    cash.style.display = 'none';
});

radionbutton[1].addEventListener('click', () => {
    coin.style.display = 'none';
    cash.style.display = 'block';
});

order.addEventListener('click', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '/deliveryInfo',
        data: { 'vouncher': $('.vouncher:checked').val(), 'phone': $('.phone').val() },
        success: function(res) {
            console.log(res);
            $('#modal').modal('show');
        },
        error: function(err) {
            console.error(err);
        }
    })
})
