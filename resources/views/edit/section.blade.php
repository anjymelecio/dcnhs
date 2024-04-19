<!-- Button trigger modal -->
<a href="#edit{{ $section->id }}" class="btn" data-bs-toggle="modal" data-bs-target="#edit{{ $section->id }}">
    <i class="fa-solid link-warning fa-pencil"></i>
</a>
   
<!-- Modal -->
<div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('section.post.update', ['id'=>$section->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
           
                <label for="section">Section</label>
                <input type="text" name="section_name" id="section" class="form-control mb-3 @error('section_name') is-invalid @enderror"
                value="{{ $section->section }}" required>
                @error('section_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label for="strand_id">Strands</label>
                <select name="strand_id" id="strand_id" class="form-control mb-3 @error('strand_id') is-invalid @enderror" required>
                    @foreach ($strands as $strand)
                        <option value="{{ $strand->id }}" {{ $strand->id == $section->strand_id ? 'selected' : ''}}>{{ $strand->strands }}</option>
                    @endforeach
                </select>
                @error('strand_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror


                <label for="teacher_id">Adviser</label>
                <select name="teacher_id" id="teacher_id" class="form-control mb-3 @error('teacher_id') is-invalid @enderror" required>
                 
                    @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ $teacher->id == $section->teachers_id ? 'selected' : '' }}>{{ $teacher->firstname }} {{ $teacher->lastname }} ({{ $teacher->teacher_id }})</option>

                    @endforeach
                </select>
                @error('teacher_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
           

                <label for="grade_level_id">Grade Level</label>
                <select name="grade_level_id" id="grade_level_id" class="form-control mb-3 @error('grade_level_id') is-invalid @enderror" required>
                 
                    @foreach ($gradeLevel as $level)
                        <option value="{{ $level->id }}" {{ $level->id == $section->grade_level_id ? 'selected': '' }}>{{ $level->level}}</option>
                    @endforeach
                </select>
                @error('teacher_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                

     <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button> 
      </form>
      </div>

            </div>
        </div>
   
</div>
