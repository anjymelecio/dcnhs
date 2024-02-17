<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/dash.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/add.css')}}">
</head>
<body>

    <nav class="navbar navbar-light border-primary sticky-top fixed-top" style="border: 1px solid rgba(46, 140, 213, 0.50); border-right: none; background-color: #ffff;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logo.png') }}" alt="">
          </a>
          <div class="search-form">
            <form action="">
              <div class="input-group" style="border: none; gap: 5px;">
                <span class="text-white"><i class="fas fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search" style="background-color: none; border: none; ">
              </div>
            </form>
          </div>

          
        </div>
    </nav>

    <div class="wrapper">
      <aside id="sidebar" class="">

        
       <button id="toggle-btn" type="button" class="toggle-btn">
          <i class="fas fa-bars" id="toggle-i"></i>
          </button>
        <div class="sidebar-logo d-flex ">

        


          

          

          



          

          
          <div class="profile-name">
           
          

            
          </div>

        
            
             
 
          
        </div>
        <ul class="sidebar-nav">
       
          
          <li class="sidebar-item">
            <a href="#" class="sidebar-link">
              <i class="fa-solid fa-gauge"></i>
              <span>Dashboard</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#users" aria-expanded="false" aria-controls="auth">
              <i class="fa-solid fa-circle-user"></i>
              <span>Accounts</span>
            </a>
            <ul id="users" class="sidebar-dropdown list-unstyled collapse" aria-labelledby="headingOne" data-bs-parent="#sidebar">
              <li class="sidebar-item">
                
                <a href="#" class="sidebar-link"> <i class="fa-solid fa-users-line"></i>All data</a>
              </li>
              <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                  <i class="fa-solid fa-user-plus"></i>
                  Add data</a>
              </li>

             
             

             
            </ul>
          </li>

          

          

          <li class="sidebar-item">
            <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
              <i class="fas fa-solid fa-school"></i>
              <span>Strands</span>
            </a>
            <ul id="auth" class="sidebar-dropdown list-unstyled collapse" aria-labelledby="headingOne" data-bs-parent="#sidebar">
              <li class="sidebar-item">
                <a href="#" class="sidebar-link">STEM</a>
              </li>
              <li class="sidebar-item">
                <a href="#" class="sidebar-link">TVL</a>
              </li>

               <li class="sidebar-item">
                <a href="#" class="sidebar-link">HUMMS</a>
              </li>
              <li class="sidebar-item">
                <a href="#" class="sidebar-link">ABM</a>
              </li>

              <li class="sidebar-item">
                <a href="#" class="sidebar-link">GAS</a>
              </li>
            </ul>
          </li>

          <li class="sidebar-item">
            <a href="#" class="sidebar-link">
              <i class="fa-solid fa-file"></i>
              <span>Subjects</span>
            </a>
          </li>

            <li class="sidebar-item">
            <a href="#" class="sidebar-link">
              <i class="fa-solid fa-file-pen"></i>
              <span>Grades</span>
            </a>
          </li>

          <hr style="height: 2px; border: 1px black solid;">

          <li class="sidebar-item">
          <a href="" class="sidebar-link">
          <i class="fa-solid fa-user"></i>
          <span>Profile</span>
          </a>
          </li>
          

           <li class="sidebar-item">
          <a href="" class="sidebar-link">
          <i class="fa-solid fa-gear"></i>  
          <span>Settings</span>
          </a>
          </li>

        </ul>
        <div class="sidebar-footer">
        
        </div>
      </aside>
      <div class="main container p-5">

   
         <ul>
      <div class="row justify-content-center" style="gap: 24px; margin: 0 auto; margin-left: 48px;">


  

<ul class="add-list">

    <li>
 <a href="#">
    <div class="col-md-3 add-widgets p-3">
     
      <span style="color: black">    <i class="fa-solid fa-graduation-cap"></i> Students</span>
    </div>
    </a>
</li>


   <li>
   <a href="#" >
    <div class="col-md-3 add-widgets p-3">
   <span style="color: black">    <i class="fa-solid fa-chalkboard-user"></i> Teachers</span></a>
    </div>
    </a>
    </li>
  

    <li>
    <a href="#">
    <div class="col-md-3 add-widgets p-3">
    
        <span style="color: black">    <i class="fa-solid fa-hands-holding-child"></i> Parents</span>
</div>
</a>

</li>
<li>
    <a href="{{ route('admin-add') }}">
<div class="col-md-3 add-widgets p-3">
    <span style="color: rgb(0, 117, 252)"><i class="fa-solid fa-user-tie"></i> Admin</span>
    
</div>
</a>
</li>
</ul>

      <h1 style="font-weight: 600;">Add Admin</h1>
          <form action="{{route('add-admin-post')}}" method="POST">
   <div class="row  justify-content-center">


   @if ($errors->any())
<div class="alert alert-danger" role="alert">
 @foreach ($errors->all() as $error)
            <p style="font-weight: 600; color: rgb(238, 34, 34)">{{ $error }}</p>
        @endforeach
                    
</div>

     
   @endif
     



    <div class="col-md-3">
     <input type="text" class="form-control p-3" placeholder="Name" required name="name">
     <br>
            <input type="email" class="form-control p-3" placeholder="Email" required name="email">
            <br>

                 <input type="password" class="form-control p-3" placeholder="Password" required name="password">
         <br>
               <input type="password" class="form-control p-3" placeholder="Confirm Password" required name="password_confirmation">
    </div>
    
     <div class="col-md-3">
    
     </div>
          <div class="col-md-3">
        
          </div>
        <div class="col-md-3">
         
          </div>
   </div>
     <div class="col-md-3 mt-3 ">
            <button class=" btn btn-primary ">Add</button>
          </div>
 
          </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/dash.js') }}"></script>

</body>
</html>
