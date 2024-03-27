<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="subjectEdit{{ $subject->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Subject</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('subject.update', ['id' => $subject->id]) }}" method="POST">
                @csrf
                @method('PUT')

            <input type="text" class="form-control" name="subject_name" value="{{ $subject->subject_name }}">


          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button> 
        </form>
        </div>
      </div>
    </div>
  </div>