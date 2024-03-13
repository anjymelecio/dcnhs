<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Students</title>
    @include('partials.css')
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
    <link rel="stylesheet" href="{{asset('css/addstudent.css')}}">
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
      <div class="mt-4 address-menu">
        <span class="fw-light ">Home <img src="{{asset('icons/Vector.png')}}" alt=""> <span style="color: #2780C2">Add <img src="{{asset('icons/Vector.png')}}" alt=""> Student Data</span></span>
        </div>
   @include('partials.addmenu')

  

   <div class="card-body ">
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
    
  @include('partials.script')


</script>
</body>
</html>
