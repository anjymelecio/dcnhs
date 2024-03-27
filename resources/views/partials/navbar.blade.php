<nav class="navbar shadow-lg top-bar navbar-expand-lg navbar-light bg-light">
  <div>

      <i class="fa-solid fa-bars" style="cursor: pointer; margin-left: 20px;" 
      data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
      </i>

<img src="{{ asset('images/logo.png') }}" alt="school-logo" class="school-logo">
</div>
  
  
    
   
  </nav>


  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width: 250px;" >
    <div class="p-3 ">
           

    
      <button  type="button" class="btn btn-text-reset text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
        <i class="fa-solid fa-bars"></i>
     
      </button>
        <span>{{ $email }}</span>
    </div>
    <div class="offcanvas-body">
      <div>
       
      </div>
      <div class="dropdown mt-3">
       
        <ul class="item">
          <li class="side-item"><a href="http://127.0.0.1:8000/admin/dashboard" class="active-link"><i class="fa-solid fa-gauge"></i> <span>Dashboard</span></a></li>
          <li class="side-item"><a href="{{ route('add-data') }}"><i class="fa-solid fa-user-group"></i> All Data </a></li>
          <li class="side-item"><a href="#"><span><i class="fa-solid fa-school"></i> Strand</span></a></li>
          <li class="side-item"><a href="{{ url('admin/subject') }}"><i class="fa-solid fa-book"></i> <span>Subjects</span></a></li>
          <li class="side-item"><a href="{{ route('section') }}"><i class="fa-solid fa-scroll"></i> <span>Section</span></a></li>
          <li class="side-item"><a href="{{route('school.year')}}"><i class="fa-regular fa-calendar"></i> <span>School year</span></a></li>
          <li class="side-item"><a href="{{ route('semester') }}"><i class="fa-solid fa-calendar-check"></i> <span>Semester</span></a></li>
          <li class="side-item"><a href="#"><i class="fa-solid fa-file"></i> <span>Grades</span></a></li>
          <li class="side-item"><a href="#"><i class="fa-solid fa-trash"></i> <span>Trash</span></a></li>
            <li class="side-item position-relative"><a href="#"><i class="fa-solid fa-bell"></i> <span>Notification
            
               <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">20</span></a></li>
                          
                       
          <hr>
          <li class="side-item"><a href="#"><i class="fa-solid fa-user"></i> <span>Profile</span></a></li>
          <li class="side-item"><a href="#"><i class="fa-solid fa-gear"></i> <span>Settings</span></a></li>
      </ul>
      
      </div>
    </div>
  </div>

  <style>
    .offcanvass-logo{
       width: 50px;
       height: 50px;
     
    }
    .offcanvas-header{
       gap: 16px;
    }
    .btn-text-reset {
      margin-left: 10px;
    }
    .offcanvas{
      padding: 5px 10px;
           
      }
 .item {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }
    .item .side-item {
      list-style: none;
      cursor: pointer;
    
     
    }
    .item .side-item:hover{
    
   background-color: #f7f7fc;
    
   
    
    }
    .item .side-item a{
    
              gap: 16px;
              align-items: center;
              font-family: sans-serif;
              text-decoration: none;
              color:  #141414;
              font-size: 18px;
    }
    
  </style>