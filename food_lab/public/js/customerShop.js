/*
 * Create : Aung Min Khant(29/1/2022)
 * Update :
 * Explain of function : To change product category with type
 * Prarameter : no
 * return :
 */
$(document).ready(function() {

    $('.shopcart').unbind().click(function(e) {

        clickCount();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });
        e.preventDefault();
        let count = 1;
        let formdata = { "pid": Number(e.target.id), "q": Number(count) };
        $.ajax({
            type: "POST",
            url: "sessionCount",
            data: { data: formdata },
            dataType: "json",
            success: function(data) {
                console.log(data);
            },
            error: function(data) {
                console.log(data);
            }
        });

    });

});


function clickCount() {
    if (sessionStorage.clickcount) {
        sessionStorage.clickcount = Number(sessionStorage.clickcount) + 1;
    } else {
        sessionStorage.clickcount = 1;
    }
    $('.cartcount').text(sessionStorage.clickcount);

};
