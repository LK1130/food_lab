$(document).ready(function () {
    /*
     * Create:zarni(2022/01/11)
     * Update:
     * This function is used for Click table rows.
     */
    $("#clickrow").click(function () {
        window.location = $(this).data("href");
    });
});
