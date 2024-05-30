<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fa-solid fa-plus"></i> Add grade level
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create grade level</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('grade.level.post') }}" class="mt-3" method="POST">
            @csrf
            <div class="form-group">
              <label for="level">Grade level*</label>
              <input type="number" class="form-control @error('level') is-invalid @enderror" id="level" name="level" placeholder="Add Grade Level" value="{{ old('level') }}">
              @error('level')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
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
  