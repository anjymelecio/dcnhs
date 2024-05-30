<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fa-solid fa-plus"></i> Add subjects
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add subjects</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('subject.create')}}" method="POST"> 
                @csrf
                <div class="row">
                  <div class="col-md-4">
                  <label for="subjects" class="mb-3">Subject *</label>
                    <input type="text" name="subjects" placeholder="Subject" class="form-control @error('subjects') is-invalid @enderror" required>
                    @error('subjects')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                            </div>
         <div class="col-md-4">
            <label for="written_works" class="mb-3">Written Works *</label>
            <input type="number" name="written_works" id="written_works" placeholder="Written Works" class="form-control @error('written_works') is-invalid @enderror" required>
            @error('written_works')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        
                   <div class="col-md-4">
            <label for="performance_task" class="mb-3">Performance task *</label>
            <input type="number" name="performance_task" id="performance_task" placeholder="Performance Task" class="form-control @error('performance_task') is-invalid @enderror" required>
            @error('performance_task')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-4 mt-3">
          <label for="assessment" class="mb-3">Assessment *</label>
          <input type="number"  name="assessment" id="assessment" placeholder="Assessment" class="form-control mb-3 @error('assessment') is-invalid @enderror"  required>
          
            @error('assessment')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
                  
          
                </div>
              
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>