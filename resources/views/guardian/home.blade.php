<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @include('partials.css')
</head>
<body>

  @include('guardianpartial.navbar')
  


  <div class="wrapper">
    



@include('partials.maincontent')
      
<div class="card">
  <div class="card-body">
    <strong>Welcome guardian {{ $guardian->firstname }} {{ $guardian->lastname }}</strong>
    <br>
    <br>
 <p>
  We are delighted to have you here. The Guardian Portal is your comprehensive resource for staying connected and informed about your child’s educational journey
 </p>
</div>





    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
