$(document).ready(function () {
    initial();
    onChange();
    checked();
    /*
     * Create:zayar(2022/01/13)
     * Update:
     * This function is used to toggle the App Management and Site Management.
     */
    function initial() {
        var selected = $("#select").val();
        if (selected == "1") {
            $("#site").css("display", "block");
            $("#app").css("display", "none");
            $("#news").css("display", "none");
        } else if (selected == "2") {
            $("#site").css("display", "none");
            $("#app").css("display", "block");
            $("#news").css("display", "none");
        } else {
            $("#site").css("display", "none");
            $("#app").css("display", "none");
            $("#news").css("display", "block");
        }
        if ($("#maintenance").is(":checked")) {
            $("#mvalue").val(1);
        } else $("#mvalue").val(0);
    }

    /*
     * Create:zayar(2022/01/13)
     * Update:
     * This function is used to toggle the App Management and Site Management.
     */
    function onChange() {
        $("#select").change(function () {
            initial();
        });
    }
    /*
     * Create:zayar(2022/01/13)
     * Update:
     * This function is used to check if maintenance checkbox is checked or not.
     */
    function checked() {
        $("#maintenance").click(function () {
            if ($("#maintenance").is(":checked")) {
                $("#mvalue").val(1);
            } else $("#mvalue").val(0);
        });
    }
    /*
     * Create:zayar(2022/01/13)
     * Update:
     * This function is used to show chosen image.
     */
    var Element = $("#logo");
    var img = $("#imageChange");
    Element.change(function (e) {
        $(".showImageInitial").css("visibility", "hidden");
        $(".showImageChange").css("visibility", "visible");
        var inputFile = e.target.files[0];
        var url = window.URL.createObjectURL(inputFile);
        img.attr("src", url);
        console.log(url);
    });
    /*
     * Create:zayar(2022/01/13)
     * Update:
     * This function is used show confirm alert to delete.
     */
    $(".delete").click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            backdrop: false,
            showDenyButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
            denyButtonText: `Cancel`,
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
