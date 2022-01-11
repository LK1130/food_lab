$(document).ready(function () {
    //to show the mobile view of nav bars when list-icon button is clicked
    $("#mobileNav").click(function () {
        //show the nav bar of the mobile view
        $(".mobileNavShow").css({ visibility: "visible" });
        //hide the list-icon button
        $("#mobileNav").css({ visibility: "hidden" });
    });
    //to hide the mobile view of nav bars when cross-icon button is clicked
    $("#cross").click(function () {
        //hide the nav bar of the mobile view
        $(".mobileNavShow").css({ visibility: "hidden" });
        //show the list-icon button
        $("#mobileNav").css({ visibility: "visible" });
    });
});
