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
    

        @include('partials.sidebar')
    

<div class="toggle-sidebar" id="toggle-bar">
  <span>
    <i class="fa-solid fa-bars"></i>
  </span>
</div>
     

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
          Total Students
         </h4>

         <span class="widgets-count ">
         17
         
         </div>
     </div>





     <div class="table table-container">

      <h3>
      Students Status
      </h3>
       <table class="table mt-5">
       <thead>
       <tr>
       
       <th>Student Name</th>
       <th>Strand</th>
       <th>Age</th>
        <th>Grade</th>
        <th>Section</th>
       
       </tr>
       
       </thead>
       <tbody>

        <tr>
         <td><img src="{{ asset('images/default-user-icon.webp') }}" alt="" style="height: 50px; width: 50px;border-radius: 50px;"> Art Lois Estacio</td>
         <td>TVL ICT</td>
         <td>22</td>
         <td>98</td>
         <td>Productive</td>

        </tr>
        <tr>
          <td><img src="{{ asset('images/default-user-icon.webp') }}" alt="" style="height: 50px; width: 50px;border-radius: 50px;"> Art Lois Estacio</td>
          <td>TVL ICT</td>
          <td>22</td>
          <td>98</td>
          <td>Productive</td>
 
         </tr>
         <tr>
          <td><img src="{{ asset('images/default-user-icon.webp') }}" alt="" style="height: 50px; width: 50px;border-radius: 50px;"> Art Lois Estacio</td>
          <td>TVL ICT</td>
          <td>22</td>
          <td>98</td>
          <td>Productive</td>
 
         </tr>
       </tbody>
       </table>
     </div>
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
