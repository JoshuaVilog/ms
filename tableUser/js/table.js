$(document).ready(function() {
    displayTableRecords();

});


function displayTableRecords() {
    $.ajax({
        url: '/'+rootFolder+'/getRecords/user.php', // Replace with your server-side script URL
        type: 'POST',
        dataType: 'json',
        success: function(data) {

            // Initialize DataTables with DataTables Buttons
            var dataTable = $('#tableRecords').DataTable({});
    
            // Clear the table before adding new rows
            dataTable.clear();
    
            // Loop through the fetched data and add it to the table
            $.each(data, function(index, record) {
                var editButton = '<button class="btn btn-primary btn-sm" onclick="modifyRecord(\''+ record.a+'\')"  data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></button>';
                var changePassButton = '<button class="btn btn-warning btn-sm" onclick="changePass(\'' + record.a + '\')" data-toggle="tooltip" title="Change Password"><i class="fas fa-key"></i></button>';
        
                // Create a new row for the DataTable
                dataTable.row.add([
                    record.c + " "+ record.d + " "+record.b,
                    record.e,
                    record.h,
                    setUserRole(record.f),
                    setUserStatus(record.g),
                    editButton + ' ' + changePassButton // Add buttons column
                ]).draw();
            });
        },
        error: function(error) {
            alert('Error fetching data from the database.');
        }
    });
}
  
function modifyRecord(id){

    $.ajax({
        url: 'ajax/setUpdate.php', // Replace with your server-side script URL
        type: 'POST',
        data: {
            id: id,
        },
        success: function(data) {
            
            $("#txtEditLastname").val(data.b);
            $("#txtEditFirstname").val(data.c);
            $("#txtEditMiddlename").val(data.d);
            $("#txtEditUsername").val(data.e);
            $("#selectEditRole").html(populateUserRole(data.f));
            $("#selectEditStatus").html(populateUserStatus(data.g));
            $("#txtEditEmail").val(data.h);

            $("#hiddenID").val(data.a);
            $('#modalEdit').modal('show');

        },
        error: function(error) {
          alert('Error geting data');
        }
    });

}

function changePass(id){

    Swal.fire({
        title: 'Are you sure you want to change your password?',
        text: '',
        icon: 'warning',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Yes',
        showCancelButton: true,
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'ajax/changePassword.php', // Replace with your server-side script URL
                type: 'POST',
                data: {
                    id: id,
                },
                success: function(data) {
                    Swal.fire({
                        title: 'Password Changed!',
                        text: 'Your new password: '+ data,
                        icon: 'success',
                    })
                },
                error: function(error) {
                  alert('Error geting data');
                }
            });
        }
    })
}





