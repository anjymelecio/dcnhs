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


      <div class="card">
  <div class="card-header">
    <span>Strands</span>
  </div>
  <div class="card-body">

  @include('add.strand');

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
      
        @foreach ($strands as $strand )
        <tr>
      
          
          
          <td col>{{$strand->strands}} ({{$strand->description}})</td>
          <td><a href="{{ url('admin/add/subject/' . $strand->id) }}" class="btn btn-success" 
           data-bs-toggle="tooltip" data-bs-placement="top" title="Add subjects">
          <i class="fa-solid fa-circle-plus"></i>
          </a></td>
          </tr>
        @endforeach
       
        </tbody>
      </table>

      @else

      <p>No Strands Found</p>
    @endif
 

  </div>

  </div>

</div>

    
    </div>

        <!---- This is main content -->





  </div>
    
 @include('partials.script')


</script>
</body>
</html>
