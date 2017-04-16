$(document).ready(function () {
    var userName = localStorage.getItem("userName");
    var password = localStorage.getItem("password");

    $('#services').hide();
    if(userName == null){
        window.location.replace("login.php");
    }else{
        $('#services').show();
    }
});