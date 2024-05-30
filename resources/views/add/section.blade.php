<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fa-solid fa-plus"></i> Add section
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create section</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('section.post.create') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <label for="section">Section</label>
            <input type="text" name="section_name" id="section" class="form-control @error('section_name') is-invalid @enderror" value="{{ old('section_name') }}" required>
            @error('section_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="strand_id">Strands</label>
            <select name="strand_id" id="strand_id" class="form-control @error('strand_id') is-invalid @enderror" required>
                @foreach ($strands as $strand)
                <option value="{{ $strand->id }}" {{ old('strand_id') == $strand->id ? 'selected' : '' }}>{{ $strand->strands }}</option>
                @endforeach
            </select>
            @error('strand_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="teacher_id">Adviser</label>
            <select name="teacher_id" id="teacher_id" class="form-control @error('teacher_id') is-invalid @enderror" required>
                @foreach ($teachers as $teacher)
                <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>{{ $teacher->firstname }} {{ $teacher->lastname }} ({{ $teacher->teacher_id }})</option>
                @endforeach
            </select>
            @error('teacher_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="grade_level_id">Grade Level</label>
            <select name="grade_level_id" id="grade_level_id" class="form-control @error('grade_level_id') is-invalid @enderror" required>
                @foreach ($gradeLevel as $level)
                <option value="{{ $level->id }}" {{ old('grade_level_id') == $level->id ? 'selected' : '' }}>{{ $level->level }}</option>
                @endforeach
            </select>
            @error('grade_level_id')
            <div class="text-danger">{{ $message }}</div>
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