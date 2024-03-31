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
      
   <div class="row widgets">
         <div class="col-md-3 widgets-item">
         <h4 class="navbar-brand text-uppercase widgets-title">
          Total Students
         </h4>

         <span class="widgets-count ">
         2,400
         </span>
         </div>

         <div class="col-md-3 widgets-item">
          <h4 class="navbar-brand text-uppercase widgets-title">
          Total Teachers
         </h4>

         <span class="widgets-count ">
        72
         
         </div>
         <div class="col-md-3 widgets-item">
          <h4 class="navbar-brand text-uppercase widgets-title">
          Parents
         </h4>

         <span class="widgets-count ">
         2,380
         </div>
         <div class="col-md-3 widgets-item">
          <h4 class="navbar-brand text-uppercase widgets-title">
          Resigned Teachers
         </h4>

         <span class="widgets-count ">
         17
         
         </div>
     </div> 






    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
