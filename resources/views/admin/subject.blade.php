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
  <div class="card-header">
    <span>Add Subject to Senior High</span>
  </div>
  <div class="card-body">
  @include('partials.message')

   <form action="{{route('subject.add.post')}}" class="row g-3 needs-validation" novalidate method="POST">

   @csrf

   <div class="row">
   <div class="col-md-4">
   <label for="subject_name" class="mt-3 form-label">Subject</label>
   <input type="text" name="subject_name" id="subject_name" placeholder="Add Subject" class="form-control  @error('subject_name') is-invalid @enderror" required>
   


   <button class="mt-3 btn btn-primary">Add</button>
   </div>
   
   </div>

   
   </form>
  </div>
</div>




<div class="card mt-5">
  <div class="card-header">
    <span>Subject List</span>
  </div>
  <div class="card-body">
   <table class="table table-bordered">

    <thead>
    
    <tr>
    <th>Subject</th>
    <th>Action</th>
    
    </tr>
    </thead>

    <tbody>

      @foreach ($subjects as $subject )
      @include('edit.subject')
        <tr>
           <td>{{$subject->subject_name}}</td>
           <td><div class="d-flex gap-3">


           <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#subjectEdit{{ $subject->id }}">
           <i class="fa-solid fa-pencil"></i>
           </a>
           <form action="{{ route('subject.delete', ['id' => $subject->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
        </form>
        
           </div>
           </td>
        </tr>
      @endforeach
    
    </tbody>
   </table>
  </div>
</div>







    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
