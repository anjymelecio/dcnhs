<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grading</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      
  
 @include('partials.message');


  <div class="card mt-5">
    <div class="card-header bg-primary text-white">
      <span>Student Grade List</span>
    </div>
    <div class="card-body">
<table class="table table-bordered">
  <thead>
  <th>Student name</th>
  <th>Strand</th>
    <th>Subject</th>
     <th>Semester</th>
  
     <th>Grade</th>
        <th>School Year</th>
        <th>Action</th>
  </thead>
  <tbody>
  @foreach ($finalGrades as $grade )
  <tr>
  <td>{{ $grade->stud_firstname }} , {{ $grade->stud_lastname }} </td>
  <td>{{$grade->strand}}- {{$grade->level}}</td>

  <td>{{$grade->subject}}</td>
  <td>{{ $grade->semester }}</td>
  <td>{{$grade->final_grade}}</td>
  <td>{{$grade->year_start}} - {{$grade->year_end}}</td>
  <td>
  <form>
  <button class="btn btn-primary btn-sm">Post</button>
  </form>
  </td>
  </tr>
    
  @endforeach
  </tbody>
</table>


        
         


</div>
  
        





    
    </div>
    
 @include('partials.script')


</script>
</body>
</html>
