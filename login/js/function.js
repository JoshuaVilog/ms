$(document).ready(function(){

    $("#btnLogin").click(function(){
        login()
    });
    $('#txtPassword').keydown(function(event) {
        if (event.key === 'Enter') {
            login();
        }
    });

    $("#btnForgotPassword").click(function(){
        $("#containerLogin").hide();
        $("#containerEmail").show();
    });
    $("#btnAlreadyHaveAccount").click(function(){
        $("#containerEmail").hide();
        $("#containerLogin").show();
    });
});


function login(){
    let txtUsername = $("#txtUsername").val();
    let txtPassword = $("#txtPassword").val();

    //alert("heyyy");
    
    $.ajax({
        url: "ajax/login.php",
        method: "POST",
        data: { 
            username: txtUsername,
            password: txtPassword 
        },
        success: function(response) {

            //console.log(response);
            if(response == "False"){
                Swal.fire({
                    title: 'Incorrect Username or Password!',
                    text: 'Please check your username or password.',
                    icon: 'warning'
                })
                $("#txtPassword").val("");
            } else if(response == "disabled"){
                Swal.fire({
                    title: 'The account is restricted!',
                    text: 'Ask the administrator to unrestrict your account',
                    icon: 'warning'
                })
            } else {
                let user = JSON.parse(response);

                console.log(response);
                localStorage.setItem(lsUserId, JSON.stringify(user));

                Swal.fire({
                    title: 'Successfully Login!',
                    text: 'Proceed to Homepage!',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Proceed!',
                    timer: 2000,
                    willClose: () => {
                        window.location.href = "/"+rootFolder+"/dashboard/";
                    },
                })
            }
            
        }
    });
}
