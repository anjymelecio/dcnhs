<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grades input</title>
    @include('partials.css')
</head>
<body>

  @include('teacherpartials.navbar')
  


  <div class="wrapper">
    



@include('partials.maincontent')
      
  
    <div class="card">
        <div class="card-header bg-primary text-white">
            {{ $subject->subjects }}
        </div>
        <div class="card-body">
            <h5> {{ $student->lastname }}, {{ $student->firstname }} {{ $student->middlename }} ({{ $student->lrn }})</h5>
          <div class="row mt-3">

          
       
           <div class="col-md-3">
           <a href="{{route('student.written', ['student_id'=> $student->id, 'subject_id' =>$subject->id])}}" class="btn btn-warning fw-bold">
           Written Works {{$subject->written_works}}%
           </a>
           </div>
           <div class="col-md-3">
           <a href="{{route('student.perform', ['student_id'=> $student->id, 'subject_id' =>$subject->id])}}" class="btn btn-warning fw-bold">
           Performance Task {{$subject->performance_task}}%
           </a>
           </div>

           <div class="col-md-3">
           <a href="{{ route('student.assessment', ['student_id' => $student->id, 'subject_id' => $subject->id]) }}" class="btn btn-warning fw-bold">
    Assessment {{ $subject->assessment }}%
</a>
           </div>

           @include('partials.message')
<table class="table table-bordered mt-5">
    <thead>
        <tr>
            <th>Quarter</th>
            <th>Initial</th>
            <th>Final Grades</th>
           
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

@foreach($grades as $quarter => $grade)
<tr>
    <form method="POST"  class="gradeForm" action="{{ route('student.grades.post', ['student_id'=>$student->id, 'subject_id'=> $subject->id]) }}">

        @csrf
   
      
        <input type="hidden" name="quarter" value="{{ $quarter }}">
        <td>{{ $quarter }}</td>
        <td>{{ $grade['initialGrade'] }} <input type="hidden" name="initial_grade" value="{{ $grade['initialGrade'] }}"></td>
        <td>{{ $grade['finalGrade'] }} <input type="hidden" name="final_grade" value="{{ $grade['finalGrade'] }}"></td>
        <td>
            <button type="submit" id="submitButton" class="submitButton btn btn-success btn-sm"> <i class="fa-regular fa-envelope"></i> Send to admin</button>
        </td>
    </form>
</tr>
@endforeach

     
    </tbody>
</table>


           

      

    
          </div>
        </div>
      </div>







  </div>
    
 @include('partials.script')


</script>
</body>
</html>
<script>
    const forms = document.querySelectorAll('.gradeForm');
    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            const submitButton = this.querySelector('.submitButton');
            submitButton.setAttribute('disabled', 'disabled');
        });
    });
</script>

