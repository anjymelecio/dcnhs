<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class</title>
    @include('partials.css')
</head>
<body>

  @include('teacherpartials.navbar')
  


  <div class="wrapper">
    



@include('partials.maincontent')
      
<div class="card">
    <div class="card-header bg-primary text-white">
      Class
    </div>
    <div class="card-body table-responsive">
    <table class="table table-bordered ">
        <thead>
        <th>Subject</th>
        <th>Strand</th>
        <th>Section</th>
        <th>Grade level</th>
        <th>Time</th>
        <th>Day</th>
        <th>Action</th>
        </thead>
        <tbody>
        @foreach ($classes as $class )
        <tr>
            <td>{{ $class->subject }}</td>
            <td>{{$class->strand}}</td>
            <td>{{$class->section}}</td>
            <td>{{$class->level}}</td>
           <td>{{ date('h:i A', strtotime($class->time_start)) }} 
           - {{ date('h:i A', strtotime($class->time_end)) }}</td>
           <td>{{$class->day}}</td>
           <td>
          <a href="{{ route('teacher.classes.student', ['strand_id' => $class->strand_id, 'grade_level_id'=>$class->level_id, 'section_id'=>$class->section_id, 'subject_id' => $class->subject_id, 'class_id'=>$class->id ] ) }}"
            class="btn btn-primary btn-sm ">
            Students
    
</a>


           </td>

            
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
