<!-- Button trigger modal -->
<a href="#edit{{ $level->id }}" class="btn" data-bs-toggle="modal" data-bs-target="#edit{{ $level->id }}">
    <i class="fa-solid link-warning fa-pencil"></i>
</a>
   
<!-- Modal -->
<div class="modal fade" id="edit{{ $level->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Grade level</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('grade.level.update', ['id'=> $level->id]) }}" method="POST"> <!-- Add action and method to your form -->
                @csrf 
                @method('PUT') <!-- Use PUT method for update -->
                <div class="modal-body">
                    <input type="text" class="form-control" name="level" value="{{ $level->level }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
