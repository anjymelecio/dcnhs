<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Semester</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      



<div class="card mt-5">
  <div class="card-header bg-primary text-white">
    Semester Status
  </div>
  <div class="card-body table-responsive">
   @if ($semesters->count() > 0)

   <table class="table table-bordered">

    <thead>
      <tr>
        <th>Semester</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($semesters as $semester )
      <tr>
        <td >{{ $semester->semester }}</td>
        <td> <div class="{{ $semester->status == 'active' ? '' : '' }} bg-gradient  text-center">
                      <p style="font-size: px; ">{{ $semester->status }}</p> 
        </div> </td>
        <td style="width: 200px;">
        
          <div class="d-flex">
            @if ($semester->status == 'active')
            <form action="{{ route('semester.deactive.status', ['id' => $semester->id]) }}" method="POST">
              @csrf
              @method('PUT')
            <button type="submit" class="btn  btn-sm"><i class=" link-success fa-solid fa-toggle-on"></i></button>
          </form>
           
            @else
            <form action="{{ route('semester.active.status', ['id' => $semester->id]) }}" method="POST">
              @csrf
              @method('PUT')
            <button class="btn  btn-sm"><i class=" link-secondary fa-solid fa-toggle-off"></i></button>
          </form>
            @endif

           
            
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
     @else 
     <p>No semesters found</p>
   @endif
</div>
  



    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
