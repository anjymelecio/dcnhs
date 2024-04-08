<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      
<div class="card">
    <div class="card-header bg-primary text-white">
      Create classes
    </div>
    <div class="card-body">
      @include('partials.message')
      <form action="{{ route('classes.create.post') }}" method="POST">

      @csrf
        <div class="row">
          <div class="col-md-4">
              <label for="strand_id">Strands</label>
              <select name="strand_id" id="strand_id" class="form-control @error('strand_id') is-invalid @enderror">
                  @foreach ($strands as $strand)
                      <option value="{{ $strand->id }}" {{ old('strand_id') == $strand->id ? 'selected' : '' }}>{{ $strand->strands }}</option>
                  @endforeach
              </select>
              @error('strand_id')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
      
          <div class="col-md-4">
              <label for="strand_subject_id">Subjects</label>
              <select name="strand_subject_id" id="strand_subject_id" class="form-control @error('strand_subject_id') is-invalid @enderror">
                  @if($subjects->count() > 0)
                      @foreach ($subjects as $subject)
                          <option value="{{ $subject->id }}" {{ old('strand_subject_id') == $subject->id }}>{{ $subject->subjects }}</option>
                      @endforeach
                  @else 
                      <option>No subjects found</option>
                  @endif
              </select>
              @error('subject_id')
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
      </div>
      
      <div class="row mt-3">
          <div class="col-md-4">
              <label for="section_id">Section</label>
              <select name="section_id" id="section_id" class="form-control @error('section_id') is-invalid @enderror">
                  @foreach ($sections as $section)
                      <option value="{{ $section->id }}" {{ old('section_id') == $section->id ? 'selected' : '' }}>
                        {{ $section->sections }}
               </option>

                  @endforeach
              </select>
              @error('section_id')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
      
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
                      <option value="{{ $semester->id }}" {{ old('semester_id') == $semester->id ? 'selected' : '' }}>{{ $semester->semester }}</option>
                  @endforeach
              </select>
              @error('semester_id')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
      </div>
      


        <div class="row mt-3">


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
 <button class="btn btn-primary mt-3">Create</button>

      </form>
        </div>
       
      </div>
    
      <div class="card  mt-3">
        <div class="card-header bg-primary text-white">
         Classes
        </div>
        <div class="card-body">
       @if ($classes->count() > 0)

        <table class="table table bordered">

          <thead>
          <tr>
          
          <th>Subject</th>
           <th>Strand</th>
           <th>Section</th>
            <th>Day</th>
            <th>time</th>
            <th>Teacher</th>
             <th>Action</th>
            
          </tr>
          </thead>

          <tbody>

            @foreach ($classes as $class )

            <tr>
         
            <td>{{$class->subject}}</td>
            <td>{{$class->strand}} - {{ $class->level }}</td>
            <td>{{$class->section}}</td>
            <td>{{ $class->day }}</td>
            <td>{{ $class->time_start }} - {{$class->time_end}}</td>
            <td>{{$class->firstname}} {{$class->lastname}}</td>
            </tr>
              
            @endforeach
          
          
          </tbody>
        </table>
         @else 

         <p>No classes found</p>
       @endif
       
      </div>

      </div>


      
      
  </div>





    
    </div>
  </div>
    
 @include('partials.script')

<script>
$('#strand_id, #grade_level_id, #semester_id').on('change', function() {
    var strandId = $('#strand_id').val();
    var gradeLevelId = $('#grade_level_id').val();
    var semesterId = $('#semester_id').val();
    
    $.ajax({
        type: 'get',
        url: '{{ route('classes.fetchdata') }}',
        data: {
            'strand_id': strandId,
            'grade_level_id': gradeLevelId,
            'semester_id': semesterId 
        },
        success: function(data) {
            console.log(data);
            $('#strand_subject_id').html(data);
        }
    });
});

</script>

<script>
  $('#strand_id, #grade_level_id').on('change', function() {
      var strandId = $('#strand_id').val();
      var gradeLevelId = $('#grade_level_id').val();
  
      $.ajax({
          type: 'get',
          url: '{{ route('classes.fetch.section') }}',
          data: {
              'strand_id': strandId,
              'grade_level_id': gradeLevelId,
          },
          success: function(data) {
              console.log(data);
              $('#section_id').html(data);
          }
      });
  });
  </script>
  

  







  </script>



 <script>









  </script>
  



</body>
</html>
