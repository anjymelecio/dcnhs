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
    Create {{$strand->strands}} class
  </div>
  <div class="card-body">

    @include('partials.message')

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
        <label for="day">Semester</label>
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
 <button class="btn btn-primary mt-3">Create</button>

      </form>

      
          </div>


        </div>
        <div class="card mt-5">
            <div class="card-header bg-primary text-white">
             Classes of {{ $strand->strands }}
            </div>
            <div class="card-body">

                @if($classes->count() > 0)


                
                <table class="table table-bordered">
                <thead>
                <th>Day</th>
                <th>Subjects</th>
                <th>Time</th>
                <th>Grade level</th>
                <th>Section</th>
                <th> Semester</th>
                <th>Teacher</th>
                <th>Action</th>
                </thead>

                <tbody>
                <tbody>

                    @foreach ($classes as $class )

                    <tr>
                        <td>{{$class->day}}</td>
                    <td>{{$class->subject}}</td>
                    <td>{{ date('h:i A', strtotime($class->time_start)) }} - {{ date('h:i A', strtotime($class->time_end)) }}</td>
                    <td>Grade {{ $class->level }} </td>
                    <td>{{$class->section}}</td>
                     <td>{{$class->semester}}</td>
                    <td>{{$class->firstname}} {{$class->lastname}}</td>
                        <td>
                          <div class="d-flex">
                            
                            @include('edit.classes')
                          <form action="{{ route('strand.class.delete', ['id' => $class->id]) }}" method="POST">

                            @csrf
                            @method('DELETE')
                            <button class="btn">
                            <i class="fa-solid link-danger fa-trash"></i>
                            </button>
                            </form>
                            </td>
                            </div>
                    </tr>

                
                        
                    @endforeach
                </tbody>
                
                </tbody>
                </table>

                @else

                <p>No classes found on this strand</p>

                @endif

             
          </div>
 
</div>





    
    </div>
    
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
