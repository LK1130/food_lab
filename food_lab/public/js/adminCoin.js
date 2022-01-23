decision();
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

/*
  * Create : linn(2022/01/17) 
  * Update : 
  * This function is use to check request coin and received amount.
  * Parameters : no
  * Return : 
*/
$("#checkBtn").click(function (event) {
    event.preventDefault();
    let reqCoin = Number($("#reqCoin").text());
    let recAmt = Number($("#recAmt").val());
    // Calculate
    let amount = Number(reqCoin) * rate;
    // check
    if (recAmt === amount)
        Swal.fire(
            'Correct!',
            'Amount is Correct To pay!',
            'success'
        )
    else
        Swal.fire({
            icon: 'error',
            title: 'Request Coin and Received Amount is Not Match',
        })
});

/*
  * Create : linn(2022/01/17) 
  * Update : 
  * This function is use to approve.
  * Parameters : no
  * Return : 
  */
$(document).ready(function () {
    $("#approve").click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        popToggle(true);
        Swal.fire({
            title: "Approve this Coin Charge?",
            text: "You won't be able to revert this!",
            icon: "warning",
            backdrop: false,
            showDenyButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes",
            denyButtonText: "Cancel",
        }).then((result) => {
            popToggle(false);
            if (result.isConfirmed) {
                $("<input />").attr("type", "hidden")
                    .attr("name", "decision")
                    .attr("value", 2) // Approve
                    .appendTo("#decisionform");
                // Add ChargeId
                $("<input />").attr("type", "hidden")
                    .attr("name", "chargeId")
                    .attr("value", chargeId) // Charge Id
                    .appendTo("#decisionform");
                form.submit();
            }
        });
    });

    /*
      * Create : linn(2022/01/17) 
      * Update : 
      * This function is use to waiting.
      * Parameters : no
      * Return : 
    */
    $("#waiting").click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        popToggle(true);
        Swal.fire({
            title: "Approve this Coin Charge?",
            text: "You won't be able to revert this!",
            icon: "info",
            backdrop: false,
            showDenyButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes",
            denyButtonText: "Cancel",
        }).then((result) => {
            popToggle(false);
            if (result.isConfirmed) {
                // form.submit();
            }
        });
    });

    /*
      * Create : linn(2022/01/17) 
      * Update : 
      * This function is use to reject.
      * Parameters : no
      * Return : 
    */
    $("#reject").click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        popToggle(true);
        Swal.fire({
            title: "Reject this Coin Charge?",
            text: "You won't be able to revert this!",
            icon: "error",
            backdrop: false,
            showDenyButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes",
            denyButtonText: "Cancel",
        }).then((result) => {
            popToggle(false);
            if (result.isConfirmed) {
                // form.submit();
            }
        });
    });

    /*
      * Create : linn(2022/01/17) 
      * Update : 
      * This function is use to under background layer disable or not.
      * Parameters : no
      * Return : 
    */
    function popToggle(enable) {
        if (enable) {
            $(".sidenav").css('display', 'none');
            $(".atag").css('display', 'none');
            $(".labeltag").css('display', 'block');
            $("button").prop('disabled', true);
            $("textarea").prop('disabled', true);
        } else {
            $(".sidenav").css('display', 'block');
            $(".atag").css('display', 'block');
            $(".labeltag").css('display', 'none');
            $("button").prop('disabled', false);
            $("textarea").prop('disabled', false);
        }
    }
});

