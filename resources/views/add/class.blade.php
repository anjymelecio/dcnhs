<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm  mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fa-solid fa-plus"></i>  Add class
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Class</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('strand.class.create', ['id'=> $strand->id]) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="strand_subject_id">Subjects</label>
                        <select name="strand_subject_id" id="strand_subject_id" class="form-control @error('strand_subject_id') is-invalid @enderror">
                            @if($subjects->count() > 0)
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ old('strand_subject_id') == $subject->id }}>{{ $subject->subject }}</option>
                                @endforeach
                            @else 
                                <option>No subjects found</option>
                            @endif
                        </select>
                        @error('strand_subject_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
        
                     <div class="col-md-4">
                      <label for="teacher_id">Teacher</label>
                      <select name="teacher_id" id="teacher_id" class="form-control @error('teacher_id') is-invalid @enderror">
                          @foreach ($teachers as $teacher)
                             <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                   {{ $teacher->lastname }}, {{ $teacher->firstname }} ({{ $teacher->teacher_id }})
                            </option>
        
                          @endforeach
                      </select>
                      @error('teacher_id')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
        
                   <div class="col-md-4">
                      <label for="section_id">Section</label>
                      <select name="section_id" id="section_id" class="form-control @error('section_id') is-invalid @enderror">
                        @if ($sections->count() > 0)
                         @foreach ($sections as $section)
                              <option value="{{ $section->id }}" {{ old('section_id') == $section->id ? 'selected' : '' }}>
                                {{ $section->sections }}
                       </option>
        
                          @endforeach
        
                          @else 
                          <option>No section found</option>
                            
                        @endif
                         
                      </select>
                      @error('section_id')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
        
                  <div class="row mt-3">
                  
                    <div class="col-md-4">
                      <label for="grade_level_id">Grade level</label>
                      <select name="grade_level_id" id="grade_level_id" class="form-control @error('grade_level_id') is-invalid @enderror">
                          @foreach ($gradeLevels as $level)
                              <option value="{{ $level->id }}" {{ old('grade_level_id') == $level->id ? 'selected' : '' }}>Grade {{ $level->level }}</option>
              
                          @endforeach
                      </select>
                      @error('grade_level_id')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
        
        
                      <div class="col-md-4">
                      <label for="semester_id">Semester</label>
                      <select name="semester_id" id="semester_id" class="form-control @error('semester_id') is-invalid @enderror">
                          @foreach ($semesters as $semester)
                              <option value="{{ $semester->id }}" {{ old('semester_id') == $semester->id }} {{$semester->status == 'active' ? 'selected' : '' }}>{{ $semester->semester }}</option>
        
                          @endforeach
                      </select>
                      @error('semester_id')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
        
        
                   @php
                    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday']
                  @endphp
                   <div class="col-md-4">
                <label for="day">Day</label>
                <select name="day" id="day" class="form-control @error('day') is-invalid @enderror">
                    @foreach ($days as $day)
                        <option value="{{ $day }}" {{ old('day') == $day ? 'selected' : '' }}>
                       {{ $day }}
                     </option>
        
                    @endforeach
                </select>
                @error('day')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
              </div>
              <div class="row mt-3">
        
               <div class="col-md-4">
              <label for="time_start">Time start</label>
              <input type="time" name="time_start" id="time_start" class="form-control @error('time_start') is-invalid @enderror" value="{{ old('time_start') }}" required>
              @error('time_start')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
        
          <div class="col-md-4">
            <label for="time_end">Time end</label>
            <input type="time" name="time_end" id="time_end" class="form-control @error('time_end') is-invalid @enderror" value="{{ old('time_end') }}" required>
            @error('time_end')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        </div>
        
        </div>
  
        
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Create</button>
        </form>
        </div>
      </div>
    </div>
  </div>