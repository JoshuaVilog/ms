$(document).ready(function() {
    displayTableRecords();

    
});


function displayTableRecords() {
    $.ajax({
      url: "/"+rootFolder+"/getRecords/list_sample2.php", // Replace with your server-side script URL
      type: 'POST',
      dataType: 'json',
      success: function(data) {

        // Initialize DataTables with DataTables Buttons
        var dataTable = $('#tableRecords').DataTable({ });
  
        // Clear the table before adding new rows
        dataTable.clear();
  
        // Loop through the fetched data and add it to the table
        $.each(data, function(index, record) {
            var editButton = '<button class="btn btn-primary btn-sm" onclick="modifyRecord(\''+ record.a+'\')" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></button>';
            var deleteButton = '<button class="btn btn-danger btn-sm" onclick="deleteRecord(\'' + record.a + '\')" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></button>';
    
            // Create a new row for the DataTable
            dataTable.row.add([
                record.a,
                record.b,
                record.c,
                editButton + ' ' + deleteButton // Add buttons column
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
            
            $("#txtEditDesc").val(data.b);
            $("#selectEditDesc").val(data.c);
            $("#hiddenID").val(data.a);
            $('#modalEdit').modal('show');

        },
        error: function(error) {
          alert('Error geting data');
        }
    });

}

function deleteRecord(id){

    Swal.fire({
        title: 'Are you sure you want to remove the record?',
        text: '',
        icon: 'warning',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Yes',
        showCancelButton: true,
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'ajax/remove.php', // Replace with your server-side script URL
                type: 'POST',
                data: {
                    id: id,
                },
                success: function(data) {
                    Swal.fire({
                        title: 'Record Removed Successfully!',
                        text: '',
                        icon: 'success',
                        timer: 2000,
                        willClose: () => {
                            window.location.href = "/"+rootFolder+"/"+pageName+"/";
                        },
                    })
                },
                error: function(error) {
                  alert('Error geting data');
                }
            });
        }
    })

    

}





