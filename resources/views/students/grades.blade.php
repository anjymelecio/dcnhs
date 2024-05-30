<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grades</title>
    @include('partials.css')
</head>
<body>

  @include('studentpartials.navbar')
  


  <div class="wrapper">
    



@include('partials.maincontent')
      
<div class="card">
    <div class="card-header bg-primary text-white">
      Grades
    </div>
    <div class="card-body table-responsive">
      <table class="table table-bordered">  

        <tr>
        <th>Subjects</th>
        <th>Grades</th>
        <th>Grade level</th>
        <th>Quarter</th>
        <th>Semester</th>
        <th>S.Y.</th>
        <th>Teacher</th>
        </tr>

        <tbody>
        @foreach ($finalGrades as $grade )
      <tr>
        <td>{{$grade->subject}}</td>
        <td>{{$grade->final_grade}}</td>
        <td>{{$grade->level}}</td>
         <td>{{$grade->quarter}}</td>
         <td>{{$grade->semester}}</td>
         <td>{{$grade->year_start}} - {{$grade->year_end}} </td>
            <td>{{ $grade->lastname }}, {{ $grade->firstname }} , {{ $grade->middle_initial }}.</td>
        @endforeach
        </tr>
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
