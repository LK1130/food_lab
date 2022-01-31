/*
 * Create : Aung Min Khant(29/1/2022)
 * Update :
 * Explain of function : To change product category with type
 * Prarameter : no
 * return :
 */
$(document).ready(function () {
    $("#selectpicker1").change(function (e) {
        console.log($('#selectpicker1').val());
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });
        e.preventDefault();
        var formdata = { type: $("#selectpicker1").val() };
        console.log(formdata);
        $.ajax({
            type: "POST",
            url: "searchCategory",
            data: formdata,
            dataType: "json",
            success: function (data) {
                console.log(data);
            },
            error: function(data){
                console.log(data);
            }
        });
    });

    /*
     * Create : Aung Min Khant(29/1/2022)
     * Update :
     * Explain of function : To change product taste 
     * Prarameter : no
     * return :
     */
    $("#selectpicker2").click(function (e) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });
        e.preventDefault();
        var formdata = { id: $("#search").val() };
         
        $.ajax({
            type: "GET",
            url: "searchid",
            data: formdata,
            dataType: "json",
            success: function (data) {
              
            },
        });
    });
});
