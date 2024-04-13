<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    @include('partials.css')
</head>
<body>


  


  <div class="wrapper">
    



@include('partials.maincontent')
      
   <div class="row widgets">
    <h4> {{ $subjectMail }}</h4>
    <p>{{ $mailmessage}}</p>
    
      








    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
