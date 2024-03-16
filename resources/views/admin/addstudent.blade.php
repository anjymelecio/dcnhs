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
@include('add.students');
   
   </div>
    </div>
  </div>
    
  @include('partials.script')


</script>
</body>
</html>
