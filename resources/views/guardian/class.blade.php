<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class</title>
    @include('partials.css')
</head>
<body>

  @include('guardianpartial.navbar')
  


  <div class="wrapper">
    



@include('partials.maincontent')
      
<div class="card">
  <div class="card-body">

  <h5 class="mb-5 fw-bold">{{ $student->lastname }}, {{ $student->firstname }} {{ substr($student->middlename, 0, 1) }}.</h5>

    



 <table class="table table-bordered">
 <thead>
 <tr>
 <th>Subjects</th>
 <th>Day</th>
 <th>Tme</th>
 <th>Teacher</th>
 </tr>
 </thead>

 @foreach ($classes as $class )
  <tr>
  <td>{{$class->subject}}</td>
  <td>{{$class->day}}</td>
  <td>{{ date('h:i A', strtotime($class->time_start)) }} - {{ date('h:i A', strtotime($class->time_end)) }}</td>
  <td>{{$class->lastname}}, {{$class->firstname}} {{$class->initial}}.</td>
  </tr>
   
 @endforeach
 </table>


    
    </div>
    </div>
  </div>

  
    
 @include('partials.script')


</script>
</body>
</html>
