
let lsUserRoleList = rootFolder+"-user_role-list";
let lsUserList = rootFolder+"-user-list";
let lsUserStatusList = rootFolder+"-user_status-list";
let lsSampleList = rootFolder+"-sample-list"; // SAMPLE ONLY

getUserRole();
getUserStatus();
getUserList();

function getUserRole(){
    let list = [
        {a:"0", b:"SUPERADMIN"},
        {a:"1", b:"USER"},
        {a:"2", b:"SUB_ADMIN"},
    ];

    localStorage.setItem(lsUserRoleList, JSON.stringify(list));
}
function getUserStatus(){
    let list = [
        {a:"1", b:"ACTIVE"},
        {a:"2", b:"INACTIVE"},
    ];

    localStorage.setItem(lsUserStatusList, JSON.stringify(list));
}
function getUserList(){

    $.ajax({
        url: '/'+rootFolder+'/getRecords/user.php', // Replace with your server-side script URL
        type: 'POST',
        dataType: 'json',
        success: function(data) {

            localStorage.setItem(lsUserList, JSON.stringify(data));
            
        },
        error: function(error) {
            alert('Error fetching data from the database.');
        }
    });
}

// ===================== //
// SAMPLE ONLY

function getSampleList(callback){

    $.ajax({
        url: '/'+rootFolder+'/getRecords/list_sample.php', // Replace with your server-side script URL
        type: 'POST',
        dataType: 'json',
        success: function(data) {

            callback(data)
            
        },
        error: function(error) {
            alert('Error fetching data from the database.');
        }
    });
}


// SETTERS

function setUserRole(id){
    let list = JSON.parse(localStorage.getItem(lsUserRoleList))
    let result = list.find(element => element.a === id);
        
    return result ? result.b:"";
}

function setUserStatus(id){
    let list = JSON.parse(localStorage.getItem(lsUserStatusList))
    let result = list.find(element => element.a === id);
        
    return result ? result.b:"";
}

function setUserFullName(id){
    let list = JSON.parse(localStorage.getItem(lsUserList))
    let result = list.find(element => element.a === id);
        
    return result ? result.c +" "+ result.b:"";
}



// SELECT ADD NEW FUNCTION //
function setSelectAddNew(select, txtAddNew, btnAddNew, btnSaveNew, btnCancelNew, url){

    populateSelectDesc(select);

    btnAddNew.click(function(){
        btnAddNew.hide();
        btnSaveNew.show();
        btnCancelNew.show();
    
        txtAddNew.show();
        select.hide();
        select.val("");
        txtAddNew.val("");
    });
    
    btnCancelNew.click(function(){
        btnAddNew.show();
        btnSaveNew.hide();
        btnCancelNew.hide();
    
        txtAddNew.hide();
        select.show();
    });

    txtAddNew.on("input", function(){
        let value = $(this).val();
    
        $(this).val(value.toUpperCase())
    });

    btnSaveNew.click(function(){
        let desc = txtAddNew.val();
    
        if(desc != ""){
            btnSaveNew.prop("disabled", true);

            $.ajax({
                url: url,
                method: "POST",
                data: {
                    desc:desc,
                },
                success: function(response) {
                    populateSelectDesc(select, response);
                        
                    btnAddNew.show();
                    btnSaveNew.hide();
                    btnCancelNew.hide();
    
                    txtAddNew.hide();
                    select.show();
                    btnSaveNew.prop("disabled", false);
        
                }
            });
        }
    })

    function populateSelectDesc(select, id){
        getSampleList(function(data) {
            let list = data;
            let options = '<option value="">-Select-</option>';
    
            for(let index = 0; index < list.length; index++){
                let selected = ""
                if(id != undefined){
                    selected = (list[index].a == id)? "selected":"";
                }
                options += '<option value="'+list[index].a+'" '+selected+'>'+list[index].b+'</option>';
    
            }
            select.html(options);
        });
    }
    
}


