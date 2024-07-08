
let pageName = "tableUser";

$(document).ready(function() {
    $("#navUserManagement").addClass("active");

    $("#btnOpenAddModal").click(function(){
        $("#modalAdd").modal("show");
        $("#selectRole").html(populateUserRole())
    });

    $("#btnAdd").click(function(){
    
        let lastname = $("#txtLastname").val();
        let firstname = $("#txtFirstname").val();
        let middlename = $("#txtMiddlename").val();
        let username = $("#txtUsername").val();
        let role = $("#selectRole").val();
        let email = $("#txtEmail").val();

        if(lastname == "" || firstname == "" || username == "" || role == ""){
            Swal.fire({
                title: 'Incomplete Form!',
                text: 'Please fill up all the required information.',
                icon: 'warning'
            })
        } else {
            $.ajax({
                url: "ajax/insert.php",
                method: "POST",
                data: {
                    lastname: lastname,
                    firstname: firstname,
                    middlename: middlename,
                    username: username,
                    role: role,
                    email: email,
                },
                success: function(response) {
                    console.log(response);
                    if(response == "duplicate"){
                        Swal.fire({
                            title: 'Duplicate!',
                            text: 'Please fill up another description.',
                            icon: 'warning'
                        })
                    } else {
                        Swal.fire({
                            title: 'Record Added Successfully!',
                            text: '',
                            icon: 'success',
                            timer: 2000,
                            willClose: () => {
                                window.location.href = "/"+rootFolder+"/"+pageName+"/";
                            },
                        })
                    }
                    
                },
                error: function(error) {
                  alert('Error inserting data to the database.');
                }
            });
        }
        
    });
    $("#btnEdit").click(function(){
        let lastname = $("#txtEditLastname").val();
        let firstname = $("#txtEditFirstname").val();
        let middlename = $("#txtEditMiddlename").val();
        let username = $("#txtEditUsername").val();
        let role = $("#selectEditRole").val();
        let status = $("#selectEditStatus").val();
        let email = $("#txtEditEmail").val();
        let id = $("#hiddenID").val();
    
        if(lastname == "" || firstname == "" || username == "" || role == ""){
            Swal.fire({
                title: 'Incomplete Form!',
                text: 'Please fill up all the required information.',
                icon: 'warning'
            })
        } else {
            $.ajax({
                url: "ajax/update.php",
                method: "POST",
                data: { 
                    lastname: lastname,
                    firstname: firstname,
                    middlename: middlename,
                    username: username,
                    role: role,
                    status: status,
                    email: email,
                    id: id,
                },
                success: function(response) {

                    if(response == "duplicate"){
                        Swal.fire({
                            title: 'Duplicate!',
                            text: 'Please fill up another description.',
                            icon: 'warning'
                        })
                    } else {
                        Swal.fire({
                            title: 'Record Updated Successfully!',
                            text: '',
                            icon: 'success',
                            timer: 2000,
                            willClose: () => {
                                window.location.href = "/"+rootFolder+"/"+pageName+"/";
                            },
                        })
                    }
                    
                }
            });
         }
    
    });
});


function populateUserRole(id){
    let list = JSON.parse(localStorage.getItem(lsUserRoleList))
    let element = '<option value="">-Select-</option>';

    for(let index = 0; index < list.length; index++){
        let selected = ""
        if(id != undefined){
            selected = (list[index].a == id)? "selected":"";
        }
        element += '<option value="'+list[index].a+'" '+selected+'>'+list[index].b+'</option>';
        
    }

    return element;

}

function populateUserStatus(id){
    let list = JSON.parse(localStorage.getItem(lsUserStatusList))
    let element = '<option value="">-Select-</option>';

    for(let index = 0; index < list.length; index++){
        let selected = ""
        if(id != undefined){
            selected = (list[index].a == id)? "selected":"";
        }
        element += '<option value="'+list[index].a+'" '+selected+'>'+list[index].b+'</option>';
        
    }

    return element;

}

