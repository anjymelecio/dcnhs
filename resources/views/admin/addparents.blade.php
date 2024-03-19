<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Guardian</title>
    @include('partials.css')
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
    <link rel="stylesheet" href="{{asset('css/addstudent.css')}}">
</head>
<body>


  @include('partials.navbar')



  <div class="wrapper">
    

        



     














@include('partials.maincontent')
      
<div class="mt-4 address-menu">
  <span class="fw-light ">Home <img src="{{asset('icons/Vector.png')}}" alt=""> <span style="color: #2780C2">Add <img src="{{asset('icons/Vector.png')}}" alt=""> Parents Data</span></span>
  </div>
  @include('partials.addmenu')
   

   <div class="card-body">
   <h3 class="card-title">Add Parents</h3>
     
   <form action="{{ route('add.parents.post') }}" method="POST">
    @csrf
    @if($errors->any())
    <div class="alert alert-danger mt-5">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success mt-5">
        {{ session('success') }}
    </div>
@endif
    <div class="row mt-5">
      <div class="col-md-3">
        <label for="">Last Name*</label>
        <input type="text" class="form-control input-student" name="lastname" required>
      </div>
      <div class="col-md-3">
        <label for="">Middle Name*</label>
        <input type="text" class="form-control input-student" name="middlename" required>
      </div>
      <div class="col-md-3">
        <label for="">First Name*</label>
        <input type="text" class="form-control input-student" name="firstname" required>
      </div>
      <div class="col-md-3">
        <label for="">Relationship*</label>
        <input type="text" class="form-control input-student" name="relationship" required>
      </div>
    </div>
    
    <div class="row mt-5">
      <div class="col-md-3">
        <label for="">Phone*</label>
        <input type="text" class="form-control input-student" name="phone">
      </div>
      <div class="col-md-3">
        <label for="">Occupation*</label>
        <input type="text" class="form-control input-student" name="occupation" required>
      </div>
      <div class="col-md-3">
        <label for="">Place of Birth*</label>
        <input type="text" class="form-control input-student" name="place_of_birth" required>
      </div>
      <div class="col-md-3">
        <label for="">Birth Date*</label>
        <input type="date" class="form-control input-student" name="birth_date" required>
      </div>
          <div class="row mt-5">
      <div class="col-md-3">
        <label for="">Email</label>
        <input type="email" class="form-control input-student" name="email" required>
      </div>
      </div>
      
    

      <h4 class="navbar-brand mt-5 fw-light">Present Address</h4>
      <div class="row mt-5">
      <div class="col-md-3">
        <label for="">House Number</label>
        <input type="text" class="form-control input-student" name="house_number">
      </div>
      <div class="col-md-3">
        <label for="">Street</label>
        <input type="text" class="form-control input-student" name="street">
      </div>
      <div class="col-md-3">
        <label for="">Barangay</label>
        <input type="text" class="form-control input-student" name="barangay">
      </div>
      <div class="col-md-3">
        <label for="">City</label>
        <input type="text" class="form-control input-student" name="city">
      </div>
      <div class="row mt-5">
        <div class="col-md-3">
          <label for="">State</label>
          <input type="text" class="form-control input-student" name="state">
        </div>
        <div class="col-md-3">
          <label for="">Zip code </label>
          <input type="text" class="form-control input-student" name="zip_code">
        </div>
        </div>

      
    </div>
    
    </div>
    <button class="btn btn-add btn-primary mt-5" type="submit">Add</button>
   </form>
   </div>
    </div>
  </div>
    
  @include('partials.script')


</script>
</body>
</html>
