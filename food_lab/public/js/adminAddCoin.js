/*
 * Create : Linn Ko(27/01/2022)
 * Update :
 * Explain : This funtion is used for to show data in customer.
 * Prarameter : no
 * return :
 */
$(document).ready(function () {

    function resetData() {
        $("#nickname").empty();
        $("#cid").empty();
        $("#coin").empty();
        $("#phone").empty();
        $("#address").empty();
        $("#recAmt").val("");
        $("#note").val("");
    }

    $("#search").click(function (e) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });
        e.preventDefault();
        var formdata = { id: $("#customerID").val() };

        $.ajax({
            type: "POST",
            url: "searchCustomer",
            data: formdata,
            dataType: "json",
            success: function (data) {
                resetData();

                if (data.error == 1) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Not Found',
                        text: 'There is no match Customer Data',
                    })
                    return false;
                }

                $("#nickname").text(data.nickname);
                $("#cid").text(data.cid);
                $("#coin").text(data.coin);
                $("#phone").text(data.phone);
                $("#address").text(data.address);

            },
            error: function (data) {
                window.location = "/error";
            },
        });
    });
});
