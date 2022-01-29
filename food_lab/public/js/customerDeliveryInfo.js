let radionbutton = document.querySelectorAll("input[type='radio']"),
    coin = document.querySelector('.coin'),
    cash = document.querySelector('.cash');


radionbutton[0].addEventListener('click', () => {
    coin.style.display = 'block';
    cash.style.display = 'none';
});

radionbutton[1].addEventListener('click', () => {
    coin.style.display = 'none';
    cash.style.display = 'block';
});