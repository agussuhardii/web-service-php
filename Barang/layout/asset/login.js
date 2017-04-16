function login() {
    
    var userName = $('#userName').val();
    var password = $('#password').val();


    $.ajax({
        method: "post",
        url: "../middleware/user.controller.php",
        data: {userName: userName, password: password, aksi: "Login"}
    }).done(function (data) {

        if (data == "[]") {
            alert("Maaf!! Login Gagal...");
        } else {
            $('#login').html("Logout <b>" + userName + "</b>"); //change name link
            //simpan Hasil login ke Local Storage
            localStorage.setItem("userName", userName);
            localStorage.setItem("password", password);
            window.location.replace("index.php"); //redirect to index.php
        }
    });
}

$(document).ready(function () {
    var loginValue = $('#login').text();

    if (loginValue != "Login") {
        window.location.replace("index.php");
    }
});
