const main = document.getElementById('mainimg');

$(document).ready(function() {
    $('.count').prop('disabled', true);
    $(document).on('click', '.plus', function() {

        if ($('.count').val() < 9) {
            $('.count').val(parseInt($('.count').val()) + 1);

        }
    });
    $(document).on('click', '.minus', function() {
        $('.count').val(parseInt($('.count').val()) - 1);
        if ($('.count').val() == 0) {
            $('.count').val(1);
        }
    });

    let count = 0;
    $('.btns').click(function(e) {

        let text = $('#count').text();

        $('#count').text($('.count').val());
        e.preventDefault();
    })

    $(".btns").click(function(e) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });
        e.preventDefault();

        let status = [];
        let values = [];

        let text;
        let allLabels = [];

        $('.ptop').each(function() {
            allLabels.push($(this).text());
        });

        $('input[type=checkbox]:checked').each(function() {
            text = $(this).parent().parent().prev().find('.ptop').text();
            status = this.checked ? $(this).val() : "";


            for (let index = 0; index < allLabels.length; index++) {
                if (allLabels[index] == text) {
                    var obj = {
                        label: text,
                        value: status
                    };

                    values.push(obj);

                }
            }

        });
        $("select option:selected").each(function() {
            text = $(this).parent().parent().parent().prev().find('.ptop').text();
            status = this.selected ? $(this).val() : "";

            for (let index = 0; index < allLabels.length; index++) {
                if (allLabels[index] == text) {

                    var obj = {
                        label: text,
                        value: status
                    };

                    values.push(obj);

                }
            }

        });
        const sessionValue = [];
        // obj array looping
        values.forEach(function(item) {
            var existing = sessionValue.filter(function(v, i) {
                return v.label == item.label;
            })
            if (existing.length) {
                var existingIndex = sessionValue.indexOf(existing[0]);
                sessionValue[existingIndex].value = sessionValue[existingIndex].value.concat(',', item.value)
            } else {
                if (typeof item.value == 'String')
                    item.value = [item.value];
                sessionValue.push(item);
            }
        })

        var formdata = { "pid": Number(pid), "q": Number($("#qty").val()), "value": sessionValue };
        $.ajax({
            type: "POST",
            url: "cartsession",
            data: { data: formdata },
            success: function(data) {
                console.log(data);
            },
            error: function(data) {
                console.error(data);
            }
        });
    });
});

function changeImage(img) {

    main.src = img.src;
    //  this.src = img.src;
}