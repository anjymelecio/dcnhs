<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @include('partials.css')
</head>
<body>


  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
<h1>Reset Password</h1>
<p>Please click the link below to reset your password</p>
      
   <a href="{{ route('reset.password', $token) }}">Reset Password</a>




    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
