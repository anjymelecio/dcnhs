<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    @include('partials.css')
</head>
<body>

  @include('guardianpartial.navbar')
  


  <div class="wrapper">
    



@include('partials.maincontent')
      
<div class="card">
  <div class="card-body">
  <div class="table-responsive">
   <table class="table-bordered table">
    <thead>
    <tr>
    <th>Students</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($guardianStudents as $student )

    <tr>

        <td>{{$student->lastname}}, {{$student->firstname}} {{$student->middle_initial}}.</td>
        <td>
        <div class="d-flex gap-3">
        <a href="{{ route('guardian.student.grades', ['student_id' => $student->student_id]) }}" class="btn btn-sm btn-success">Grades</a>
        <a href="{{route('guardian.student.class', ['student_id' => $student->student_id])}}" class="btn btn-sm btn-success">Class</a>
        <a href="{{route('guardian.student.checklist', ['student_id' => $student->student_id])}}" class="btn btn-sm btn-success">CheckList</a>
        </div>
        </td>
        
    </tr>
        
    @endforeach
    </tbody>
    </div>
   </table>
 </p>
</div>





    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
