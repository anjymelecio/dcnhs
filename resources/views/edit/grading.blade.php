<!-- Button trigger modal -->
<a href="#edit{{ $grading->id  }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{ $grading->id }}">
    Edit grading System
  </a>
  
 
  <div class="modal fade" id="edit{{ $grading->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Grading System</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('grading.update', ['id'=> $grading->id]) }}" method="POST">

            @csrf

            @method('PUT')

            <label for="written_works mb-3">Writtent Works</label>
               <div class="input-group">
              
            <input type="number" class="form-control" name="written_works" id="written_works" value="{{ $grading->written_works }}">
            <span class="input-group-text">%</span>
                  </div>
                  <label for="written_works">performance Task</label>

                  <div class="input-group">
            
            <input type="number" class="form-control" name="performance_task" id="performance_task" value="{{ $grading->performance_task }}">
            <span class="input-group-text">%</span>
                  </div>
             
            <label for="assesment">Assesment</label>
            <div class="input-group">
            
            <input type="number" class="form-control" name="assesment" id="assesment" value="{{ $grading->assesment }}">
            <span class="input-group-text">%</span>
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