<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dash.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
    <link rel="stylesheet" href="{{asset('css/addstudent.css')}}">
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
      <li class="side-item"><a href="http://127.0.0.1:8000/admin/dashboard"><i class="fa-solid fa-gauge"></i> <span>Dashboard</span></a></li>
      <li class="dropdown side-item">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-circle-user"></i> <span>Account</span>
          </a>

          <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink">
            <li class="side-item"><a class="dropdown-item" href="#"><i class="fa-solid fa-user-group"></i> All Data </a></li>
            <li class="active-link"><a class="dropdown-item" href="http://127.0.0.1:8000/add/data"><i class="fa-solid fa-user-plus"></i> Add Data</a></li>

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
      
   <div class="menu">

    <a href="http://127.0.0.1:8000/admin/add/students" class="menu-link">
        <div class="active-link"><span>
       <span><i class="fa-solid fa-graduation-cap"></i></span>
        <span>Students</span></div></a>
    <a href="#" class="menu-link"><div class="menu-item"><span>
        <span><i class="fa-solid fa-chalkboard-user"></i></span>
     <span>Teacher</span>    
    </span></div></a>
    <a href="#" class="menu-link"><div class="menu-item"><span>
        <i class="fa-solid fa-person-breastfeeding"></i>
    </span> <span>Parents</span>    
    </span></div></a>
   
   </div>

   <div class="mt-4 address-menu">
   <span class="fw-light ">Home <img src="{{asset('icons/Vector.png')}}" alt=""> <span style="color: #2780C2">Add Student Data</span></span>
   </div>

   <div class="form-student-container shadow-lg">
   <h3 class="fw-light">Add Student</h3>

   <form>
    
    <div class="row mt-5">
      <div class="col-md-3">
        <label for="">LRN*</label>
        <input type="text" class="form-control input-student" required>
      </div>
      <div class="col-md-3">
        <label for="">First Name*</label>
        <input type="text" class="form-control input-student" required>
      </div>
      <div class="col-md-3">
        <label for="">Middle Name*</label>
        <input type="text" class="form-control input-student" required>
      </div>
      <div class="col-md-3">
        <label for="">Last Name*</label>
        <input type="text" class="form-control input-student" required>
      </div>
    </div>
    
    <div class="row mt-5">
      <div class="col-md-3">
        <label for="">Sex*</label>
        <select name="sex" id="sex" class="form-control">

          <option value="" disabled selected>Select sex</option>
    <option value="male">Male</option>
    <option value="female">Female</option>
        </select>
      </div>
      <div class="col-md-3">
        <label for="">Strand*</label>
        <input type="text" class="form-control input-student" required>
      </div>
      <div class="col-md-3">
        <label for="">Section*</label>
        <input type="text" class="form-control input-student" required>
      </div>
      <div class="col-md-3">
        <label for="">Grade Level*</label>
        <input type="text" class="form-control input-student" required>
      </div>
      <div class="row mt-5">
      <div class="col-md-3">
        <label for="">School Year*</label>
        <input type="date" class="form-control input-student" required>
      </div>
      <div class="col-md-3">
        <label for="">Place of Birth*</label>
        <input type="text" class="form-control input-student" required>
      </div>
      <div class="col-md-3">
        <label for="">Date Of Birth*</label>
        <input type="date" class="form-control input-student" required>
      </div>
      <div class="col-md-3">
        <label for="">Email*</label>
        <input type="email" class="form-control input-student" required>
      </div>
    </div>

      <h4 class="navbar-brand mt-5 fw-light">Present Address</h4>
      <div class="row mt-5">
      <div class="col-md-3">
        <label for="">House Number</label>
        <input type="text" class="form-control input-student">
      </div>
      <div class="col-md-3">
        <label for="">Street</label>
        <input type="text" class="form-control input-student" >
      </div>
      <div class="col-md-3">
        <label for="">Barangay</label>
        <input type="text" class="form-control input-student" >
      </div>
      <div class="col-md-3">
        <label for="">City</label>
        <input type="text" class="form-control input-student">
      </div>
      <div class="row mt-5">
        <div class="col-md-3">
          <label for="">State</label>
          <input type="text" class="form-control input-student">
        </div>
        <div class="col-md-3">
          <label for="">Zip code </label>
          <input type="text" class="form-control input-student" >
        </div>
        </div>

      
    </div>
    
    </div>
    <button class="btn btn-add btn-primary mt-5">Add</button>
   </form>
   </div>
    </div>
  </div>
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+CE8a7M4PBO2kNTfzx5Tp1kq8Rx2h2A2U4M6GdP" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/main.js') }}">


</script>
</body>
</html>
