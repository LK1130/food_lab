// Coin switch
function leftClick() {
    var btnSwitch = document.getElementById('btnSwitch');
    var coinBox = document.querySelectorAll('.coinBox');
    var cashBox = document.querySelectorAll('.cashBox');
    var coinDiv = document.querySelectorAll('.coinDiv');
    var  cashDiv = document.querySelectorAll('.cashDiv');

    btnSwitch.style.left = '0px';
    console.log(cashBox.length);
    for (let index = 0; index < cashBox.length; index++) {
        cashBox[index].style.display = 'none';     
    }
    for (let index = 0; index < cashDiv.length; index++) {
        cashDiv[index].style.display = 'none';
    }
    for (let index = 0; index < coinBox.length; index++) {
        coinBox[index].style.display = 'block';     
    }
    for (let index = 0; index < coinDiv.length; index++) {
        coinDiv[index].style.display = 'block';    
    }
}   
// Cash switch
function rightClick() {
    var btnSwitch = document.getElementById('btnSwitch');
    var coinBox = document.querySelectorAll('.coinBox');
    var cashBox = document.querySelectorAll('.cashBox');
    var coinDiv = document.querySelectorAll('.coinDiv');
    var  cashDiv = document.querySelectorAll('.cashDiv');

    btnSwitch.style.left = '50%';
    for (let index = 0; index < cashBox.length; index++) {
        cashBox[index].style.display = 'block';    
    }    
    for (let index = 0; index < cashDiv.length; index++) {
        cashDiv[index].style.display = 'block';
    }
    for (let index = 0; index < coinBox.length; index++) {
        coinBox[index].style.display = 'none';    
    }
    for (let index = 0; index < coinDiv.length; index++) {
        coinDiv[index].style.display = 'none';    
    }
}
//Quantity Adjust
$(document).ready(function () { 
    $(".plus").click(function() {
        var increase = $(".num").text();
        var increaseNum = parseInt(increase )+parseInt(1);
        if ( increaseNum <10) { 
            $(".num").text(increaseNum);   
        }else{
            alert("You can buy this product in 9 times.");
        }
    });    
    $(".minus").click(function() {
        var decrease= $(".num").text();
        var decreaseNum = parseInt(decrease)-parseInt(1);
        if ( decreaseNum > 0) { 
            $(".num").text(decreaseNum); 
        }else{
            alert("If you don't want to buy this product,please click delete button.");
        }
    });   
});



