
let pageName = "tableCRUD";


$(document).ready(function() {
    $("#navUtilities").addClass("active");
    $("#navUtility1").addClass("active");
    $("#collapseUtilities").addClass("show");


    $("#btnOpenAddModal").click(function(){
        $("#modalAdd").modal("show");
    });

    $("#btnAdd").click(function(){
    
        let desc = $("#txtDesc").val();

        if(desc == ""){
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
                    desc:desc
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
                            title: 'Record Added Successfully!',
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
    $("#btnEdit").click(function(){
        let desc = $("#txtEditDesc").val();
        let id = $("#hiddenID").val();
    
        if(desc == ""){
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
                    desc: desc,
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
  

