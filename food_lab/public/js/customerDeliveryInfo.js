let radionbutton = document.querySelectorAll("input[type='radio']"),
    coin = document.querySelector('.coin'),
    cash = document.querySelector('.cash');

let order = document.querySelector('.order');

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
            window.alert('Your order is completed');
            window.location.href = '/';
        },
        error: function(err) {
            console.error(err);
        }
    })
})