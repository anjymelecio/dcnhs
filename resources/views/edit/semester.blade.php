<!-- Button trigger modal -->
<a href="#edit{{ $semester->id }}" class="btn " data-bs-toggle="modal" data-bs-target="#edit{{ $semester->id }}"><i class="fa-solid link-warning fa-pencil"></i></a>
   
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
                    <select name="semester" class="form-control mt-3 @error('semester') is-invalid @enderror">
                        <option value="1st Semester" {{ $semester->semester == '1st Semester' ? 'selected' : '' }}>1st Semester</option>
                        <option value="2nd Semester" {{ $semester->semester == '2nd Semester' ? 'selected' : '' }}>2nd Semester</option>
                    </select>
                    <label for="school_year_id" class="mt-3">School Year</label>
                    <select name="school_year_id" id="school_year_id" class="form-control @error('school_year_id') is-invalid @enderror mt-3">
                        @foreach ($years as $year)
                            <option value="{{ $year->id }}" {{ $semester->school_year_id == $year->id ? 'selected' : '' }}>
                                {{ $year->start_year }} - {{ $year->end_year }} {{ $year->school_year_name }}
                            </option>
                        @endforeach
                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
