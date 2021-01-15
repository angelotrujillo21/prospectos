$(document).ready(function () {
    $("input").focus(function () {
        $("#menu-bottom").hide();
    });

    $("input").blur(function () {
        $("#menu-bottom").show();
    });
});


