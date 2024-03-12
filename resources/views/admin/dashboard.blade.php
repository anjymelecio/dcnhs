<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dash.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>


  <nav class="navbar shadow-lg top-bar navbar-expand-lg navbar-light bg-light">
  <img src="{{ asset('images/logo.png') }}" alt="school-logo" class="school-logo">
 


  <form>
    <div class="search-container gap-2">
      <span><i class="fa-solid fa-magnifying-glass"></i></span>
  <input type="search" class="search-input" placeholder="Search">

  </div>
  </form>
 <div class="icons-bar d-flex gap-3">
  <div class="notif-container">
    <i class="fa-regular fa-bell"></i>
    <span class="notif-count">0</span>
  </div>
  

 </div>
</nav>



  <div class="wrapper">
    

        
    <div class="close-nav" id="sidebar">

     <span class="btn-close" id="btn-close">
        <i class="fa-solid fa-xmark"></i>
        </span>

       <div class="profile-container d-flex">


        <img src="{{ asset('images/default-user-icon.webp') }}" alt="profile-img" class="profile-img">
         
        <span class="username">Admin@gmail.com</span>

       
       </div>
      
      <ul>
      <li class="active-link"><a href="http://127.0.0.1:8000/admin/dashboard" class="active-link"><i class="fa-solid fa-gauge"></i> <span>Dashboard</span></a></li>
      <li class="dropdown side-item">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-circle-user"></i> <span>Account</span>
          </a>

          <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink">
            <li class="side-item"><a class="dropdown-item" href="#"><i class="fa-solid fa-user-group"></i> All Data </a></li>
            <li class="side-item"><a class="dropdown-item" href="http://127.0.0.1:8000/add/data"><i class="fa-solid fa-user-plus"></i> Add Data</a></li>

          </ul>
      </li>
      <li class="side-item"><a href="#"><span><i class="fa-solid fa-school"></i> Strand</span></a></li>
      <li class="side-item"><a href="#"><i class="fa-solid fa-book"></i> <span>Subjects</span></a></li>
      <li class="side-item"><a href="#"><i class="fa-solid fa-file"></i> <span>Grades</span></a></li>
      
      <hr>
      <li class="side-item"><a href="#"><i class="fa-solid fa-user"></i> <span>Profile</span></a></li>
      <li class="side-item"><a href="#"><i class="fa-solid fa-gear"></i> <span>Settings</span></a></li>
      
      </ul>
    </div>

<div class="toggle-sidebar" id="toggle-bar">
  <span>
    <i class="fa-solid fa-bars"></i>
  </span>
</div>
     

    <div class="main-content container">
      
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
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+CE8a7M4PBO2kNTfzx5Tp1kq8Rx2h2A2U4M6GdP" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/main.js') }}">


</script>
</body>
</html>
