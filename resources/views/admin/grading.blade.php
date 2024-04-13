<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grading</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      
  
 @include('partials.message');
<div class="card">
    <div class="card-header bg-primary text-white">
      <span>Grading</span>
    </div>
    <div class="card-body">


        @foreach ($gradings as $grading)
   

     


        <div class="progress mb-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: {{$grading->written_works}}%" aria-valuenow="{{$grading->written_works}}" aria-valuemin="0" aria-valuemax="100">
           Written works {{$grading->written_works}}%
            </div>
          </div>
          <div class="progress mb-3">
            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$grading->performance_task}}%" aria-valuenow="{{$grading->performance_task}}" aria-valuemin="0" aria-valuemax="100">
            Performance Task {{$grading->performance_task}}%
            </div>
          </div>
          <div class="progress mb-3">
            <div class="progress-bar bg-warning" role="progressbar" style="width: {{$grading->assesment}}%" aria-valuenow="{{$grading->assesment}}" aria-valuemin="0" aria-valuemax="100">
                Assesment {{$grading->assesment}}%
            </div>
          </div>

          @include('edit.grading')
         
@endforeach

</div>




  </div>

  <div class="card mt-5">
    <div class="card-header bg-primary text-white">
      <span>Student Grade List</span>
    </div>
    <div class="card-body">
<table class="table table-bordered">
  <thead>
  <th>Student name</th>
  <th>Strand</th>
  <th>Grade level</th>
   <th>Section</th>
    <th>Subject</th>
     <th>Semester</th>
     <th>School Year</th>
  </thead>
</table>


        
         


</div>
  
        





    
    </div>
    
 @include('partials.script')


</script>
</body>
</html>
