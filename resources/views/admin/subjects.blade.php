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
            <input type="text" name="subjects" placeholder="Subject" class="form-control @error('subjects') is-invalid @enderror" required>
            @error('subjects')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
                    </div>
 <div class="col-md-4">
    <label for="written_works" class="mb-3">Written Works *</label>
    <input type="number" name="written_works" id="written_works" placeholder="Written Works" class="form-control @error('written_works') is-invalid @enderror" required>
    @error('written_works')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


           <div class="col-md-4">
    <label for="performance_task" class="mb-3">Performance task *</label>
    <input type="number" name="performance_task" id="performance_task" placeholder="Performance Task" class="form-control @error('performance_task') is-invalid @enderror" required>
    @error('performance_task')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-4 mt-3">
  <label for="assessment" class="mb-3">Assessment *</label>
  <input type="number"  name="assessment" id="assessment" placeholder="Assessment" class="form-control mb-3 @error('assessment') is-invalid @enderror"  required>
  
    @error('assessment')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
          
  
        </div>
          <button type="submit" class="btn btn-primary mt-3">Add</button>
      </form>
    </div>
  </div>
</div>


      
<div class="card mt-5">
  <div class="card-header bg-primary text-white">
    All subjects of senior high school
  </div>
  <div class="card-body table-responsive">
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
