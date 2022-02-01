const main = document.getElementById('mainimg');

$(document).ready(function () {
    $('.count').prop('disabled', true);
    $(document).on('click', '.plus', function () {

        if ($('.count').val() < 5) {
            $('.count').val(parseInt($('.count').val()) + 1);

        }
    });
    $(document).on('click', '.minus', function () {
        $('.count').val(parseInt($('.count').val()) - 1);
        if ($('.count').val() == 0) {
            $('.count').val(1);
        }
    });

    let count = 0;
    $('.btns').click(function (e) {

        let text = $('#count').text();

        $('#count').text($('.count').val());
        e.preventDefault();
    })

    $(".btns").click(function (e) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });
        e.preventDefault();
        var formdata = { pid: pid, qty: $("#qty").val(), };
        console.log(formdata);
        console.log($("input[type='checkbox']:checked").val());
        let status = [];
        $('input[type=checkbox]:checked').each(function () 
        {
             status = (this.checked ? $(this).val() : ""); 
            
             let text = $(this).parent().parent().siblings(".lab").find('.ptop').text();
               console.log(text);
            });
          
        var checkedValues = $('input:checkbox:checked').map(function() {
            
                return $(this).parent().parent().siblings().children().find('.ptop');
            }).get();
        console.log(checkedValues);
            console.log(status);

        $.ajax({
            type: "POST",
            url: "cartsession",
            data: formdata,
            dataType: "json",
            success: function (data) {

                console.log(data);
            },
            error: function (data) {
                console.log(data);
            }
        });



    });
});

function changeImage(img) {

    main.src = img.src;
    //  this.src = img.src;
}