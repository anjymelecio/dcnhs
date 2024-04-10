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

           <div class="row">
           <div class="col-md-4">
           <a href="{{route('student.written', ['student_id'=> $student->id, 'subject_id' =>$subject->id])}}" class="btn btn-warning fw-bold">
           Written Works {{$subject->written_works}}%
           </a>
           </div>
           </div>

    
          </div>
        </div>
      </div>







  </div>
    
 @include('partials.script')


</script>
</body>
</html>
