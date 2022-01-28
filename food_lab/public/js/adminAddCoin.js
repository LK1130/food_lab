/*
 * Create : Linn Ko(27/01/2022)
 * Update :
 * Explain : This funtion is used for to show data in customer.
 * Prarameter : no
 * return :
 */
$(document).ready(function () {

    function resetData() {
        $(".nickname").empty();
        $(".cid").empty();
        $(".coin").empty();
        $(".phone").empty();
        $(".address").empty();
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
            type: "GET",
            url: "searchCustomer",
            data: formdata,
            dataType: "json",
            success: function (data) {
                resetData();
            },
            error:
                function (data) {
                    window.location = "/error";
                },
        });
    });
});
