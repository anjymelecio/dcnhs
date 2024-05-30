<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fa-solid fa-plus"></i>  Create school year
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create school year</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('school.year.post') }}" method="POST">
                @csrf
               
        
              
                    <label for="year_start">School Date Start</label>
                <input type="date" id="year_start"class="form-control mt-3 @error('date_start') is-invalid @enderror" name="date_start">
                <label for="year_end" class="mt-3">School Date End</label>
                <input type="date" id="year_end"  class="form-control mt-3 @error('date_end') is-invalid @enderror" value="{{ old('date_end') }}" name="date_end">
                  
        
                  <label for="year_start" class="mt-3">School Year Name</label>
                  <input type="text" id="school_year_name" name="school_year_name" placeholder="School Year name" class="form-control mt-3 @error('school_year_name') is-invalid @enderror" value="{{ old('school_year_name') }}" required>
        
               
             
               
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>