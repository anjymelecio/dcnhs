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
      
<div class="card">
  <div class="card-header bg-primary text-white">
  Create Semester
  </div>
  <div class="card-body">

    @include('partials.message')
   <form action="{{route('semester.add.post')}}" method="POST">
   @csrf
    <div class="row">
        <div class="col-md-4">
            <label for="semester">Semester</label>
            <input type="text" id="semester" name="semester" class="form-control @error('semester') is-invalid @enderror" placeholder="Add semester">
            @error('semester')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <button class="mt-3 btn btn-primary">Create</button>
</form>

</div>
</div>


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
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($semesters as $semester )
      <tr>
        <td >{{ $semester->semester }}</td>
       
        <td style="width: 200px;">
        
          <div class="d-flex">
            @if ($semester->status == 'active')
            <form action="{{ route('semester.deactive.status', ['id' => $semester->id]) }}" method="POST">
              @csrf
              @method('PUT')
           <button class="btn btn-success btn-sm">Active</button>
          </form>
           
            @else
            <form action="{{ route('semester.active.status', ['id' => $semester->id]) }}" method="POST">
              @csrf
              @method('PUT')
          <button class="btn btn-secondary btn-sm">Inactive</button>
          </form>
            @endif

           @include('edit.semester')
            
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
