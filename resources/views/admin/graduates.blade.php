<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')



     
<div class="card">
    <div class="card-header bg-primary text-white">
        Alumni
    </div>
    <div class="card-body">

        @include('partials.message')
     <table class="table table-bordered">

        <thead>
        
        <tr>
        <th>Student name</th>
        <th>School Year</th>
        <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach ( $graduates as $grad )
        
        <tr>
        <td>{{$grad->lastname}}, {{$grad->firstname}} {{$grad->initial}}.</td>
        <td>{{$grad->year_start}} - {{$grad->year_end}}</td>
        <td>
            <form action="{{ route('graduates.delete', ['id' => $grad->id, 'stud_id' => $grad->student_id]) }}" method="POST">


            @csrf
            @method('PUT')
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
        </td>
        </tr>
            
        @endforeach
        </tbody>
     </table>
  </div>
       

      
      
 
    



    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
<script>

  
</script>



</script>
</script>

