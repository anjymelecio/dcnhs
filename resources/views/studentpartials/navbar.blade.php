<nav class="navbar shadow-lg top-bar navbar-expand-lg navbar-light bg-light">
  <div>
    <i class="fa-solid fa-bars" style="cursor: pointer; margin-left: 20px;" 
    data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
    </i>
    <img src="{{ asset('images/logo.png') }}" alt="school-logo" class="school-logo">
  </div>
<form action="{{ route('student.logout') }}" method="POST">
  @csrf
    <button class="btn" style="margin-right: 16px" data-bs-toggle="tooltip" data-bs-placement="right" title="logout">
      <i class="fa-solid fa-power-off"></i>
      </button>

      </form>
</nav>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width: 250px;">
  <div>
    
    <button type="button" class="btn btn-text-reset text-reset " data-bs-dismiss="offcanvas" aria-label="Close">
      <i class="fa-solid fa-bars w-25"></i>
    </button>

    <span style="font-size: 12px;">{{Auth::guard('student')->user()->firstname }} {{Auth::guard('student')->user()->lastname }} {{Auth::guard('student')->user()->lrn }} </span>


   
  </div>

  <div class="offcanvas-body ">
   
    <div>
    </div>
    <div class="dropdown mt-3">
      <ul class="item">

        <li class="side-item"><a href="{{ route('student.index') }}" class="active-link"><i class="fa-solid fa-house"></i> <span>Home</span></a></li>
         <li class="side-item"><a href="{{ route('student.subject') }}" class="active-link"><i class="fa-solid fa-file"></i> <span> Subject</span></a></li>
          <li class="side-item"><a href="{{route('student.class')}}" class="active-link"><i class="fa-solid fa-calendar-days"></i> <span>Class</span></a></li>
         <li class="side-item"><a href="{{route('student.grades')}}" class="active-link"><i class="fa-solid fa-calendar"></i> <span>Grades</span></a></li>
          <li class="side-item"><a href="{{route('student.checklist')}}" class="active-link"><i class="fa-solid fa-list-check"></i> <span>Check list</span></a></li>
        
         <hr>
         <li class="side-item"><a href="{{route('student.profile')}}" class="active-link"><i class="fa-solid fa-user"></i> <span>Profile</span></a></li>
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
    font-size: 14px;
  
  }


  .item .side-item a span {
    font-weight: 500;
    font-family: 'Poppins', sans-serif;
    
  }


  .accordion-button {
    border: none;
    background: none;
    padding: 0;
    cursor: pointer;
  }
  
</style>
