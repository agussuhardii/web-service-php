//if document ready__________________________________________________________________________________
$(document).ready(function(){
    formValid();





});

function formValid() {


    $("#userForm").validate({
        messages: {
            userName: {
                required: 'User name harus ada',
                minlength: "Gunakan minimal 6 karakter"
            },
            password: {
                required: 'Password harus ada',
                minlength: "Gunakan minimal 6 karaakter"
            }
        }
    });
}

