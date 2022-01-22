
/*
  * Create : linn(2022/01/17) 
  * Update : 
  * This function is use to show or not in decision.
  * Parameters : no
  * Return : 
  */
function decision() {
    var makeDecision = document.getElementById("decision").checked;
        var decisionDiv = document.getElementsByClassName("decisiondiv");
        makeDecision ? decisionDiv[0].style.display = "block" :
            decisionDiv[0].style.display = "none"
    }