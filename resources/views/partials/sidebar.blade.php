<div class="close-nav" id="sidebar">

    <span class="btn-close" id="btn-close">
       <i class="fa-solid fa-xmark"></i>
       </span>

      <div class="profile-container d-flex">


       <img src="{{ asset('images/default-user-icon.webp') }}" alt="profile-img" class="profile-img">
        
       <span class="username">{{$email}}</span>

      
      </div>
     
     <ul>
     <li class="side-item"><a href="http://127.0.0.1:8000/admin/dashboard" class="active-link"><i class="fa-solid fa-gauge"></i> <span>Dashboard</span></a></li>
     <li class="dropdown side-item">
         <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
           <i class="fa-solid fa-circle-user"></i> <span>Account</span>
         </a>

         <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink">
           <li class="side-item"><a class="dropdown-item" href="#"><i class="fa-solid fa-user-group"></i> All Data </a></li>
           <li class="side-item"><a class="dropdown-item" href="http://127.0.0.1:8000/add/data"><i class="fa-solid fa-user-plus"></i> Add Data</a></li>

         </ul>
     </li>
     <li class="side-item"><a href="http://127.0.0.1:8000/admin/add/strand"><span><i class="fa-solid fa-school"></i> Strand</span></a></li>
     <li class="side-item"><a href="#"><i class="fa-solid fa-book"></i> <span>Subjects</span></a></li>
     <li class="side-item"><a href="#"><i class="fa-solid fa-scroll"></i> <span>Section</span></a></li>
     <li class="side-item"><a href="#"><i class="fa-solid fa-file"></i> <span>Grades</span></a></li>
     
     <hr>
     <li class="side-item"><a href="#"><i class="fa-solid fa-user"></i> <span>Profile</span></a></li>
     <li class="side-item"><a href="#"><i class="fa-solid fa-gear"></i> <span>Settings</span></a></li>
     
     </ul>
   </div>