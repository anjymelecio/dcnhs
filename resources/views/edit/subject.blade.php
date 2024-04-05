<!-- Button trigger modal -->
<a href="#edit{{ $subject->id }}" class="btn" data-bs-toggle="modal" data-bs-target="#edit{{ $subject->id }}">
    <i class="fa-solid link-warning fa-pencil"></i>
</a>
   
<!-- Modal -->
<div class="modal fade" id="edit{{ $subject->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Semester</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('subject.update', ['id'=> $subject->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                
            
                        <input name="strand_id" type="hidden" value="{{ $strand->id }}">
                
                     
                            <label for="subjects">Subject*</label>
                            <input type="text" class="form-control mt-3 @error('subjects') is-invalid @enderror" id="subjects" name="subjects" placeholder="Add Subject" value="{{ $subject->subject }}">
                            @error('subjects')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    
                
                              <label for="semester_id">Semester*</label>
       <select name="semester_id" id="semester_id" class="form-control mt-3 @error('semester_id') is-invalid @enderror">
    @foreach ($semesters as $semester)
        <option value="{{ $semester->id }}" {{ $subject->semester_id == $semester->id ? 'selected' : '' }}>{{ $semester->semester }}</option>
     @endforeach
   </select>
        @error('semester_id')
     <div class="invalid-feedback">{{ $message }}</div>
        @enderror

                  
                
                  
                            <label for="grade_level_id">Grade Level*</label>
                            <select name="grade_level_id" id="grade_level_id" class="form-control mt-3 @error('grade_level_id') is-invalid @enderror">
                                @foreach ($gradeLevels as $level)
                                <option value="{{ $level->id }}" {{ $subject->grade_level_id == $level->id ? 'selected' : '' }}>{{ $level->level }}</option>
                                @endforeach
                            </select>
                            @error('grade_level_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                      
                   
                
                  
              
                
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>

            </form>
              </div>
            
        </div>
    </div>
</div>
