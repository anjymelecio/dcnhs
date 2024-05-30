<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @include('partials.css')
</head>
<body>

  @include('studentpartials.navbar')
  


  <div class="wrapper">
    



@include('partials.maincontent')
      
<div class="card">
  <div class="card-body">
    <strong>Welcome {{ $student->lastname }}, {{ $student->firstname}} {{ substr($student->middlename, 0, 1) }}. to your personal page</strong>
    <br>
    <br>
    <p>
    We’re excited to support you in your educational journey. The Student Portal is your one-stop destination for everything you need to excel in your studies. 
      <br>
      <br>

If you do not agree with the conditions or you are not {{$student->lrn}} please logout.
    </p>
  </div>
</div>





    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
