<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      


      
<div class="card mt-5">
  <div class="card-header bg-primary text-white">
    All subjects of senior high school
  </div>
  <div class="card-body">
    @include('add.subjects')
    @include('partials.message')
    <div class="row">
     @if ($subjects->count() > 0)
     
     <table class="table table-bordered">
  <thead>
    <tr>
      <th>Subject</th>
      <th>Written Works</th>
      <th>Performance Task</th>
      <th>Assesment</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($subjects as $subject)
      <tr>
        <td>{{ $subject->subjects }}</td> 
        <td>{{$subject->written_works}} %</td>
         <td>{{$subject->performance_task}} %</td>
         <td>{{$subject->assessment}} %</td>
        <td>
        <div class="d-flex">
        @include('edit.subject')
        
        <form action="{{ route('subject.delete', ['id' => $subject->id]) }}" method="POST" class="mt-2">

            @csrf
            @method('DELETE')

        <button class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
           Delete
        </button>
        </div>

        </form>
     
        </td>
      </tr>
    @endforeach
  </tbody>
</table>


     


        
          
   
      
    @else

         <p>No subjects found</p>
         
     @endif
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
