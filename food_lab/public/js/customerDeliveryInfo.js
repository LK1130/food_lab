var coin = document.getElementById("inlineRadio1");
var cod = document.getElementById("inlineRadio2");
var coinAmount=document.getElementsByClassName("coinAmount");
var codAmount=document.getElementsByClassName("codAmount");

coin.addEventListener("click" , () =>{
    coinAmount[0].style.display = "inline";
    coinAmount[0].style.position= "relative";
});

cod.addEventListener("click" , () =>{
    codAmount[0].style.display = "inline"; 
    codAmount[0].style.position= "relative";
});
