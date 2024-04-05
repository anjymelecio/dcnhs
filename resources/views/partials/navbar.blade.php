<nav class="navbar shadow-lg top-bar navbar-expand-lg navbar-light bg-light">
  <div>
    <i class="fa-solid fa-bars" style="cursor: pointer; margin-left: 20px;" 
    data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
    </i>
    <img src="{{ asset('images/logo.png') }}" alt="school-logo" class="school-logo">
  </div>
</nav>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width: 250px;">
  <div>
    <button type="button" class="btn btn-text-reset text-reset " data-bs-dismiss="offcanvas" aria-label="Close">
      <i class="fa-solid fa-bars w-25"></i>
    </button>
    <span>{{ $email }}</span>
  </div>
  <div class="offcanvas-body ">
    <div>
    </div>
    <div class="dropdown mt-3">
      <ul class="item">
        <li class="side-item"><a href="http://127.0.0.1:8000/admin/dashboard" class="active-link"><i class="fa-solid fa-gauge"></i> <span>Dashboard</span></a></li>
        
        <!-- add data-->
          <li class="accordion-button collapsed side-item" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            <a href="#"><i class="fa-solid fa-user-plus"></i>  <span>Add data</span></a>
          </li>
          <ul id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <li class="side-item"><a href="{{route('teachers.create')}}"><i class="fa-solid fa-chalkboard-user"></i> <span>Teachers</span></a></li>
            <li class="side-item"> <a href="{{ route('students.create') }}"><i class="fa-solid fa-graduation-cap"></i> <span>Student</span></a></li>
            <li class="side-item"> <a href="{{route('guardians.create')}}"><i class="fa-solid fa-person-breastfeeding"></i> <span>Guardian</span></a></li>
          </ul>



           
           <!-- data list -->
          <li class="accordion-button collapsed side-item" type="button" data-bs-toggle="collapse" data-bs-target="#allData" aria-expanded="false" aria-controls="flush-collapseTwo">
            <a href="#"><i class="fa-solid fa-users"></i>  <span>All data</span></a>
          </li>
          <ul id="allData" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <li class="side-item"><a href="{{route('teachers.data')}}"><i class="fa-solid fa-chalkboard-user"></i> <span>Teachers</span></a></li>
            <li class="side-item"> <a href="{{ route('students.data') }}"><i class="fa-solid fa-graduation-cap"></i> <span>Student</span></a></li>
            <li class="side-item"> <a href="{{route('guardians.data')}}"><i class="fa-solid fa-person-breastfeeding"></i> <span>Guardian</span></a></li>
          </ul>
       
        <li class="side-item"><a href="{{route('strand.index')}}"><i class="fa-solid fa-school"></i> <span>Strand</span></a></li>
        <li class="side-item"><a href="{{ route('section.index') }}"><i class="fa-solid fa-scroll"></i> <span>Section</span></a></li>
        <li class="side-item"><a href="{{route('classes.index')}}"><i class="fa-solid fa-calendar-days"></i> <span>Classes</span></a></li>
        <li class="side-item"><a href="{{ route('grade.level') }}"><i class="fa-solid fa-chart-simple"></i> <span>Grade level</span></a></li>
        <li class="side-item"><a href="{{route('school.year')}}"><i class="fa-solid fa-calendar"></i></i> <span>School year</span></a></li>
        <li class="side-item"><a href="{{ route('semester') }}"><i class="fa-solid fa-calendar-check"></i> <span>Semester</span></a></li>
        <li class="side-item"><a href="{{route('grading.index')}}"><i class="fa-solid fa-file"></i> <span>Grading</span></a></li>
        <li class="side-item"><a href="#"><i class="fa-solid fa-trash"></i> <span>Trash</span></a></li>
        <li class="side-item position-relative"><a href="#"><i class="fa-solid fa-bell"></i> <span>Notification
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">20</span></span></a></li>
        <hr>
        <li class="side-item"><a href="#"><i class="fa-solid fa-user"></i> <span>Profile</span></a></li>
        <li class="side-item"><a href="#"><i class="fa-solid fa-gear"></i> <span>Settings</span></a></li>
      </ul>
    </div>
  </div>
</div>

<style>
  .offcanvass-logo {
    width: 50px;
    height: 50px;
  }

  .offcanvas-header {
    gap: 16px;
  }

  .btn-text-reset {
    margin-left: 10px;
  }

  .offcanvas {
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

  .item .side-item:hover {
    background-color: #f7f7fc;
  }

  .item .side-item a {
    gap: 16px;
    align-items: center;
    font-family: 'Poppins', sans-serif;
    text-decoration: none;
    color: #141414;
    font-size: 16px;
  
  }


  .item .side-item a span {
    font-weight: 500;
    font-family: 'Poppins', sans-serif;
    
  }

  /* Style accordion button */
  .accordion-button {
    border: none;
    background: none;
    padding: 0;
    cursor: pointer;
  }
  
</style>
