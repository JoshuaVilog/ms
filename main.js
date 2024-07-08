
//alert("Hello Baby!");

let rootFolder = "ms";
let lsUserId = rootFolder+"-user-id";

let userFullName = "";
let userFname = "";
let userLname = "";
let userMname = "";
let userFullName2 = "";
let userUsername = "";
let userRole = "";
let userCode = "";


if(localStorage.getItem(lsUserId) != null){
    let userID = localStorage.getItem(lsUserId)
    let currentUrl = location.pathname;
    let loginUrl = "/"+rootFolder+"/login/";

    if(currentUrl == loginUrl && userID != 0){
        window.location.href = "/"+rootFolder+"/dashboard/";

    } else if(currentUrl != loginUrl && userID == 0){
        window.location.href = "/"+rootFolder+"/login/";
    }

    getUserInformation();

} else {
    localStorage.setItem(lsUserId, 0);
    window.location.href = "/"+rootFolder;
}



function getUserInformation(){
    let user = JSON.parse(localStorage.getItem(lsUserId));
    
    if(user != 0){

        userCode = user.USER_ID;
        userUsername = user.USERNAME;
        userFname = user.USER_FNAME;
        userLname = user.USER_LNAME;
        userMname = user.USER_MNAME;
        userFullName = user.USER_FNAME +" "+ user.USER_LNAME;
        userFullName2 = user.USER_FNAME +" "+ user.USER_MNAME+" "+ user.USER_LNAME;
        userRole = user.USER_ROLE;
        userEmail = user.USER_EMAIL;

        
    }
}


$(document).ready(function() {
    //Display User Name
    $("#displayUserName").text(userFullName);
    $("#displayRole").text(setUserRole(userRole));
});

checkRestriction();

$("#btnLogout").click(function(){

    Swal.fire({
        title: 'Are you sure you want to Log out?',
        showCancelButton: true,
        confirmButtonText: 'Yes',
    }).then((result) => {
        
        if (result.isConfirmed) {
            logOutAccount();
        }
    })
});


function logOutAccount(){

    localStorage.setItem(lsUserId, 0);
    window.location.href = "/"+rootFolder+"/";
}

function checkRestriction(){
    $.ajax({
        url: "/"+rootFolder+"/restriction.php",
        type: "POST",
        data: { 
            userCode: userCode
        },
        success: function(response) {
            //alert(response);
            if(response == 0){
                logOutAccount();
            }
        }
    });
}