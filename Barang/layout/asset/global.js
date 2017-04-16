$(document).ready(function () {
    var userName = localStorage.getItem("userName");
    var password = localStorage.getItem("password");
    
    if (userName == null) {
        $('#login').html("Login");
        //$('#login').attr('href', 'login.php');

    } else {
        $('#login').html("Logout <b>" + userName + "</b>");
        //$('#login').attr('href', '#');
    }


    //confirmasi logout dan login
    $('#login').click(function () {
        if (userName == null) {
            window.location.replace("login.php");
        } else {
            var c = confirm("Yakin ingin keluar?");
            if (c == false) {
                return false
            } else if (c == true) {
                localStorage.removeItem("userName");
                localStorage.removeItem("password");
                window.location.replace("login.php");
                return true;
            }
        }
    })


});




//delete data barang from local storage________________________________________________________________
function removeBarangFromLocalStorage() {
    localStorage.removeItem("barang");
    localStorage.removeItem("formInputBarangTemp");
    localStorage.removeItem("formBarangUpdateTemp");
}

