<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $strand->strands }} {{ $level->level }}</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    
    
 

 


     

@include('partials.maincontent')
      
   

<div class="card">
  <div class="card-header bg-primary text-white" >
   Students list enroll in {{ $strand->strands }} {{ $level->level }}
  </div>
  <div class="card-body">
       <ul>

@foreach ($students as $student)

<input type="checkbox" class="form-check-input" value="{{ $student->id }}" >
<label>{{ $student->lastname}} {{ $student->firstname }}, {{ $student->middlename }} ({{ $student->lrn }})</label><br>



@endforeach

<button class="btn btn-primary mt-3">Add on <span class="text-lowercase">{{ $section->section_name }}</span> section</button>
</ul>

  </div>
</div>




    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
