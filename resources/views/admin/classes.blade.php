<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      
    
  <!-- This is main Content -->
  
  <div class="card">
  <div class="card-header">
   <span>{{ $teacher->firstname }} {{$teacher->lastname}} ({{ $teacher->teacher_id }})</span> 
  </div>
  <div class="card-body">
    <h5 class="card-title">Add class to {{ $teacher->firstname }}</h5>
    <form action="" method="POST">
    <div class="row">
    <div class="col-md-4">
    
      <input type="hidden" name="teacher_id" value={{$teacher->id}} class="form-control mt-3">
      
      <label for="subectlist" class="mt-3">Subject</label>
<input class="form-control mt-3" list="subjectOption" name="subject" id="subjectList" placeholder="Search Subject...">

    <datalist id="subjectOption" >
 @foreach ($subjects as $subject )
 
       <option  value="{{$subject->subject_name}}"></option>

 @endforeach
</datalist>

<label for="section_id" class="mt-3">Sections</label>
<select name="section_id" id="section_id" class="form-control mt-3" id="">
@foreach ($sections as $section )
    <option value="{{$section->id}}">{{$section->section_name}}</option>
@endforeach
</select>
<label for="strand_id" class="mt-3">Strands</label>
<select name="strand_id" id="strand_id" class="form-control mt-3" id="">
@foreach ($strands as $strand)
    <option value="{{$strand->id}}">{{$strand->strands}}</option>
@endforeach
</select>

<label for="time_start" class="mt-3">Time Start</label>
<input type="time" id="time_start" class="form-control mt-3">


<label for="time_start" class="mt-3">Time End</label>
<input type="time" id="time_start" class="form-control mt-3">


    </div>
    </div>
    <button class="btn btn-primary mt-3">Submit</button>
    </form>
  </div>
</div>


    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
