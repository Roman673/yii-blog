$(document).ready(function() {
    $("#openNav").click(function() {
        $("#mySidenav").css("width", "250px");
        console.log("open");
    });
    $("#closeNav").click(function() {
        $("#mySidenav").css("width", "0");
    });
});
