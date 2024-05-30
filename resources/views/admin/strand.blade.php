<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strand</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      
    <!---- This is main content -->

 
      <div class="card mt-5">
  <div class="card-header bg-primary text-white">
    <span>Strands</span>
  </div>
  <div class="card-body table-responsive">

    @include('add.strand')

    @include('partials.message')

 


  <div class="row">

  <div>
      @if ($strands->count() > 0)
      <table class="table table-bordered">

  
        <thead>
          <tr>
        
            <th scope="col">Strands List</th>
          
             <th scope="col">Action</th>
           
          </tr>
        </thead>
        <tbody>
      
        @foreach ($strands as $data )

      
        <tr>


        
        <td>{{ $data->strands }} ({{ $data->description }})</td>

        <td>

          <div class="d-flex">

          <a href="{{route('strand.class', ['strand'=> $data->strands, 'id' => $data->id])}}" > <button class="btn btn-sm btn-primary mt-2"> <i class="fa-solid fa-landmark"></i> Class</button></a>


      <a href="{{ route('strandsub.index', ['id'=>$data->id]) }}" class="btn" 
      data-bs-toggle="tooltip" data-bs-placement="top" title="Add subjects to {{ $data->strands }}"><button class="btn btn-sm btn-success"><i class="fa-solid fa-book"></i> Subjects</button></i></a>
       
        @include('edit.strand')

        <form action="{{ route('strand.delete', ['id' => $data->id]) }}"method="POST">
          @csrf
          @method('DELETE')

       <button class="btn btn-danger btn-sm mt-2" data-bs-placement="top" title="Delete {{ $data->strands }}">
 <i class="fa-solid fa-trash"></i>
        Delete
 
        
       </button>
       </form>
        </td>

        </div>
  
      
          
          
          
          </tr>
        @endforeach
         <tbody>
        </tbody>
      </table>

      @else

      <p>No Strands Found</p>
    @endif
 

  </div>

  </div>

</div>

    
    </div>

     





  </div>
    
 @include('partials.script')


</script>
</body>
</html>
