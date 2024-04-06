<!-- Button trigger modal -->
<a href="#edit{{ $subject->id }}" class="btn" data-bs-toggle="modal" data-bs-target="#edit{{ $subject->id }}" 
    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit subject">
    <i class="fa-solid link-warning fa-pencil"></i>
</a>
   
<!-- Modal -->
<div class="modal fade" id="edit{{ $subject->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('subject.update', $subject->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                
            
                    <label for="subjects" class="mb-3">Subject *</label>
                    <input type="text" name="subjects" placeholder="Add Subject" value="{{ $subject->subjects }}" class="form-control @error('subjects') is-invalid @enderror" required>
                   
                      
                   
                
                  
              
                
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>

            </form>
              </div>
            
        </div>
    </div>
</div>
