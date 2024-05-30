<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @include('partials.css')
</head>
<body>

  @include('teacherpartials.navbar')
  


  <div class="wrapper">
    



@include('partials.maincontent')
      
<div class="card">
<div class="card-body p-5">
 
  <div class="row widgets">
    <div class="col-md-3 widgets-item">
    <h4 class="navbar-brand text-uppercase widgets-title">
     Classes
    </h4>

    <span class="widgets-count ">
    {{$classes}}
    </span>
    </div>

        <div class="col-md-3 widgets-item">
    <h4 class="navbar-brand text-uppercase widgets-title">
     Advisories
    </h4>

    <span class="widgets-count ">
    {{$advisory}}
    </span>
    </div>


@foreach ($subjects as $subject )

 <div class="col-md-3 widgets-item">
    <p>
    {{$subject->subject}}
    </p>

    <span class="widgets-count ">
    
    </span>
    </div>

  
@endforeach
    
    
    
</div> 


</div>
</div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
