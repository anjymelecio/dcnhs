<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $strand->strands }}</title>
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
                

              @foreach ($subjects as $subject)
    <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input @error('subject_id.' . $subject->id) is-invalid @enderror"
               id="subject_{{ $subject->id }}" name="subject_id[]" value="{{ $subject->id }}"
               {{ in_array($subject->id, $strandSubjects->pluck('subject_id')->toArray()) ? 'disabled' : '' }}>

        <label class="form-check-label" for="subject_{{ $subject->id }}">{{ $subject->subjects }}</label>
        
        @if(in_array($subject->id, $strandSubjects->pluck('subject_id')->toArray()))
        <div class="invalid-feedback">One or more selected subjects do not exist.</div>
    @endif
    

    </div>
@endforeach


            
            </div>
        
            <div class="col-md-4">
                <label for="semester_id">Semester *</label>
                <select name="semester_id" id="semester_id" class="form-control @error('semester_id') is-invalid @enderror" required>
                    @foreach ($semesters as $semester )
                        <option value="{{ $semester->id }}"> {{ $semester->semester }}</option>
                    @endforeach
                </select>
                @error('semester_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
    
                <label for="grade_level_id" class="mt-3">Grade Level*</label>
                <select name="grade_level_id" id="grade_level_id" class="form-control @error('grade_level_id') is-invalid @enderror" required>

                    @foreach ($gradeLevels as $level )
                        <option value="{{ $level->id }}">{{ $level->level }}</option>
                    @endforeach
                </select>
                @error('grade_level_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                  <button class="btn btn-primary mt-3">Create</button>
            </div>
        </div>

        
      
    </form>
    
  
  </div>

  
      
      </div>

   @foreach ($gradeLevels as $level)
    @foreach ($semesters as $semester)
        <div class="card mt-5">
            <div class="card-header bg-primary text-white">
                <span>Subject list for grade {{ $level->level }} {{ $semester->semester }}</span>
            </div>
            <div class="card-body">
                @php
                    $subjectsFound = false;
                @endphp

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Subject Name</th>
                           <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($strandSubjects as $subject)
                            @if ($subject->grade_level_id == $level->id && $subject->semester_id == $semester->id)
                                <tr>
                                    <td>{{ $subject->subject }}</td>
                                    <td>
                                     <form action="{{route('strandsub.delete', ['id'=>$subject->id])}}" method="POST">
                                     @csrf
                                     @method('DELETE')
                                    <button class="btn">
                                    <i class="link-danger fa-solid fa-trash"></i>
                                    </button>
                                    </form> </td>
                                   
                                </tr>
                                @php
                                    $subjectsFound = true;
                                @endphp
                            @endif
                        @endforeach

                        @if (!$subjectsFound)
                            <tr>
                                <td colspan="2">No subjects found for this grade level and semester.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
@endforeach

   






    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
