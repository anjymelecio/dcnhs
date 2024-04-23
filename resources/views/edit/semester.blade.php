<!-- Button trigger modal -->
<a href="#edit{{ $semester->id }}" class="btn " data-bs-toggle="modal" data-bs-target="#edit{{ $semester->id }}">
    <button class="btn btn-warning btn-sm">Edit</button></a>
   
<!-- Modal -->
<div class="modal fade" id="edit{{ $semester->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Semester</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('semester.update', ['id' => $semester->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <label for="semester" class="mt-3">Semester</label>
                   <input type="text" name="semester" class="form-control" value="{{ $semester->semester }}">
                    <label for="school_year_id" class="mt-3">School Year</label>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
