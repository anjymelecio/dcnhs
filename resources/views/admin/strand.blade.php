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
  <div class="card-header bg-primary text-white">
    <span>Create Strand</span>
  </div>
  <div class="card-body">



  @include('partials.message')

  <div class="row">

    <div class="col-md-4">

    <form action="{{route('strand.post')}}" method="POST">
              @csrf
              
                <label for="strand" class="col-form-label">Strand Name*</label>
                <input type="text" class="form-control mb-3  {{ $errors->has('strands') ? 'is-invalid' : '' }}" name="strands" required>
                @if ($errors->has('strands'))
                    <div class="invalid-feedback">{{ $errors->first('strands') }}</div>
                @endif
     
        
          
                <label for="description" class="col-form-label">Description*</label>
                <input type="text" id="description" class="form-control  {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" required>
                @if ($errors->has('description'))
                    <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                @endif
         <button type="submit" class="btn btn-primary mt-3">Add</button>
          
          </div>
          </form>


</div>

    
    </div>

      </div>



      <div class="card mt-5">
  <div class="card-header bg-primary text-white">
    <span>Strands</span>
  </div>
  <div class="card-body">

 


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


      <a href="{{ route('strandsub.index', ['id'=>$data->id]) }}" class="btn" 
      data-bs-toggle="tooltip" data-bs-placement="top" title="Add subjects to {{ $data->strands }}"><i class="link-success fa-solid fa-file"></i></a>
       
        @include('edit.strand')

        <form action="{{ route('strand.delete', ['id' => $data->id]) }}"method="POST">
          @csrf
          @method('DELETE')

       <button class="btn" data-bs-placement="top" title="Delete {{ $data->strands }}">

        <i class="link-danger fa-solid fa-trash"></i>
 
        
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

        <!---- This is main content -->





  </div>
    
 @include('partials.script')


</script>
</body>
</html>
