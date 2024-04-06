<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strand Subjects</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
<div class="card">
    <div class="card-header bg-primary text-white">
      <span> Select Subjects for  {{ $strand->strands }}</span>
    </div>
    <div class="card-body">
  
  
  
    @include('partials.message')
    <form action="{{ route('strandsub.create', ['id' =>$strand->id]) }}" method="POST">
        @csrf
      
        <div class="row" style="gap: 200px;">
            <div class="col-md-4">
                <h5 class="mb-3 fw-bold">Subject list</h5>
                <form action="">
                @foreach ($subjects as $subject)
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input @error('subject_id.' . $loop->index) is-invalid @enderror" id="subject_{{ $subject->id }}" name="subject_id[]" value="{{ $subject->id }}">
                    <label class="form-check-label" for="subject_{{ $subject->id }}">{{ $subject->subjects }}</label>
                    @error('subject_id.' . $loop->index)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach
            
            </div>
        
            <div class="col-md-4">
                <label for="semester_id">Semester *</label>
                <select name="semester_id" id="semester_id" class="form-control @error('semester_id') is-invalid @enderror" required>
                    <option value="">Select Semester</option>
                    @foreach ($semesters as $semester )
                        <option value="{{ $semester->id }}"> {{ $semester->semester }} {{ $semester->year_start }} - {{ $semester->year_end }}</option>
                    @endforeach
                </select>
                @error('semester_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
    
                <label for="grade_level_id" class="mt-3">Grade Level*</label>
                <select name="grade_level_id" id="grade_level_id" class="form-control @error('grade_level_id') is-invalid @enderror" required>
                    <option value="">Select Grade Level</option>
                    @foreach ($gradeLevels as $level )
                        <option value="{{ $level->id }}">{{ $level->level }}</option>
                    @endforeach
                </select>
                @error('grade_level_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary">Create</button>
    </form>
    


    
    
    
  </form>
  
  
  </div>
  
      
      </div>
  
        </div>
      
   






    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
