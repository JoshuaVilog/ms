<div id="modalEdit" class="modal fade">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Record</h4>
        </div>
        <div class="modal-body" id="modal-body-edit">
            <div class="form-group">
                <label>Description:</label>
                <input type="text" class="form-control" id="txtEditDesc" oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label>Category:</label>
                <div class="input-group mb-3">
                    <select id="selectEditDesc" class="form-control" ></select>
                    <input type="text" id="txtEditAddNewDesc" class="form-control" style="display:none">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary" id="btnEditAddNewDesc" >New</button>
                        <button type="button" class="btn btn-success" style="display:none" id="btnEditSaveNewDesc">
                            <i class="fas fa-check"></i>
                        </button>
                        <button type="button" class="btn btn-danger" style="display:none" id="btnEditCancelAddDesc">
                            <i class="fas fa-times"></i> 
                        </button>
                    </div>
                </div>
            </div>
            <input type="hidden" id="hiddenID">

        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" id="btnEdit">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            
        </div>
    </div>

  </div>
</div>