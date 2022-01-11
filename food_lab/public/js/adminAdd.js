$(document).ready(function () {
    /*
     * Create:zayar(2022/01/11)
     * Update:
     * This function is used to toggle the attribute of password.
     */
    iconClick();
    function iconClick() {
        $("#icon").click(function () {
            let attribute = $("#password").attr("type");
            if (attribute == "password") {
                $("#password").attr("type", "text");
            } else $("#password").attr("type", "password");
        });
    }
});
