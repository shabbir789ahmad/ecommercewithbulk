<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
    <label>Select State</label>
    <select class="form-control" id="state">
        
    </select>

    <label class="mt-3">Select City</label>
    <select class="form-control" id="city">
        
    </select>

    <label class="mt-3">Complete Address</label>
    <input type="text" id="address" class="form-control">
</form>
         
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary border-0 py-3 px-4 update_address" data-id="{{Auth::id()}}">Save</button>
      </div>
    </div>
  </div>
</div>