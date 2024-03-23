<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#strandForm">
  Add New
</button>

  <!-- Modal -->
  <div class="modal fade" id="strandForm" tabindex="-1" aria-labelledby="strandFormlabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="strandFormlabel">Add Strand</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('strand.post')}}" method="POST">
              @csrf
                <label for="strand" class="col-form-label">Strand Name*</label>
                <input type="text" class="form-control input-student mb-3" name="strands" required>

                <label for="description" class="col-form-label">Description*</label>
                <input type="text" id="description" class="form-control input-student mb-3" name="description" required>

                
              
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
      </div>
    </div>
  </div>