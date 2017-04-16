$(document).ready(function () {
    var userName = localStorage.getItem("userName");

    if (userName!=null){
        $('#loginValue').html(userName);
        $('#logOutValue').html("LogOut");
    }else {
        $('#logOutValue').html("|");
    }



})

function Login() {

    var userName  = $('#userName').val();
    var password  = $('#password').val();
    console.log("error");

    $.ajax({
        url : "../middleware/member.controller.php",
        method  : "post",
        data    : {"userName":userName, "password":password, "aksi":"Login"}
    }).done(function (data) {
        if(data == "[]"){
            alert("UserName dan Password tidak ditemukan")
        }else {

            localStorage.setItem("userName", userName);
            localStorage.setItem("password", password);
            window.location.replace("index.php");
        }
    })
}

//function Logout
function logOut() {
    var loginValue =localStorage.getItem("userName");
    if (loginValue != "Login"){
        alert("Yakin Keluar");
        localStorage.removeItem("userName");
        localStorage.removeItem("password");
        $('#loginValue').html("Login");
    }
}







