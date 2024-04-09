<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students section</title>
    @include('partials.css')
</head>
<body>

  @include('teacherpartials.navbar')
  


  <div class="wrapper">
    



@include('partials.maincontent')
      
<div class="card">
    <div class="card-header bg-primary text-white">
      Advsories students
    </div>
    <div class="card-body">
        @if ($students->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Students</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{$student->lastname}}, {{$student->firstname}} ({{$student->lrn}})</td> 
                    <td><button class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="view"><i class="fa-regular fa-eye"></i></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else 

        <p>No students found</p>
            
        @endif
        
  </div>

    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
