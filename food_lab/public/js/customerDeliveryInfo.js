var coin = document.getElementById("inlineRadio1");
var cod = document.getElementById("inlineRadio2");
var coinAmount=document.getElementsByClassName("coinAmount");
var codAmount=document.getElementsByClassName("codAmount");

coin.addEventListener("click" , () =>{
    coinAmount.style.display = "inline";
    coinAmount.style.position= "relative";
});

cod.addEventListener("click" , () =>{
    codAmount.style.display = "inline"; 
    codAmount.style.position= "relative";
});
