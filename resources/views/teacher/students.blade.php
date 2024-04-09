<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    @include('partials.css')
</head>
<body>

  @include('teacherpartials.navbar')
  


  <div class="wrapper">
    



@include('partials.maincontent')
      
   <div class="row widgets">
     
    @if($students->count() > 0)

      <table class="table table-bordered">

        <thead>
        <tr>
        <th scope="col">LRN</th>
      <th scope="col">Last name</th>
      <th scope="col">First name</th>
      <th scope="col">Middle name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
        </tr>
        </thead>
    
    

      <tbody>
      @foreach ( $students as $student )
            <tr>
            <td>{{$student->lrn}}</td>
            <td>{{$student->firstname}}</td>
              <td>{{$student->lastname}}</td>
              <td>{{$student->middlename}}</td>
              <td>{{$student->email}}</td>
              <td><a href="" class="btn btn-primary">Enter grades</a></td>
            </tr>
        @endforeach
      </tbody>
      </table>

      @else
      <p>No student found</p>


    @endif






    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
