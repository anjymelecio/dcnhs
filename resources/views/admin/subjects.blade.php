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
      
<div class="card">
  <div class="card-header bg-primary text-white">
    Add subjects
  </div>
  <div class="card-body">
    <div class="row">
    @include('partials.message')
      <form action="{{route('subject.create')}}" method="POST"> 
        @csrf
        <div class="row">
          <div class="col-md-4">
          <label for="subjects" class="mb-3">Subject *</label>
            <input type="text" name="subjects" placeholder="Add Subject" class="form-control @error('subjects') is-invalid @enderror" required>
            @error('subjects')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary mt-3">Add</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


      
<div class="card mt-5">
  <div class="card-header bg-primary text-white">
    All subjects of senior high school
  </div>
  <div class="card-body">
    <div class="row">
     @if ($subjects->count() > 0)
     
     <table class="table table-bordered">
  <thead>
    <tr>
      <th>Subject name</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($subjects as $subject)
      <tr>
        <td>{{ $subject->subjects }}</td> 
        <td>
        <div class="d-flex">
        @include('edit.subject')
        
        <form action="{{ route('subject.delete', ['id' => $subject->id]) }}" method="POST">

            @csrf
            @method('DELETE')

        <button class="btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
            <i class="link-danger fa-solid fa-trash"></i>
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
