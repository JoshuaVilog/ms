<div id="modalAdd" class="modal fade">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add Record</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Description:</label>
                <input type="text" class="form-control" id="txtDesc" oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label>Category:</label>
                <div class="input-group mb-3">
                    <select id="selectDesc" class="form-control" ></select>
                    <input type="text" id="txtAddNewDesc" class="form-control" style="display:none">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary" id="btnAddNewDesc" >New</button>
                        <button type="button" class="btn btn-success" style="display:none" id="btnSaveNewDesc">
                            <i class="fas fa-check"></i>
                        </button>
                        <button type="button" class="btn btn-danger" style="display:none" id="btnCancelAddDesc">
                            <i class="fas fa-times"></i> 
                        </button>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" id="btnAdd">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            
        </div>
    </div>

  </div>
</div>