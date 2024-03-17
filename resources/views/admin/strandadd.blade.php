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
    <link rel="stylesheet" href="{{asset('css/addstrand.css')}}">
  
</head>
<body>


  @include('partials.navbar')



  

<div class="toggle-sidebar" id="toggle-bar">
  <span>
    <i class="fa-solid fa-bars"></i>
  </span>
</div>
     









<div class="wrapper">

  @include('partials.sidebar')


@include('partials.maincontent')
   

   <div class="mt-4 address-menu">
   <span class="fw-light ">Home <img src="{{asset('icons/Vector.png')}}" alt=""> <span style="color: #2780C2">Add Strand</span></span>
   </div>

  

   <div class="card mt-5 form-container shadow-lg">
    <h5 class="card-header">Strand</h5>
    <div class="card-body">
       
      @include('partials.message')
    @include('add.strand')
         <button class="btn btn-primary border-dark" data-bs-toggle="modal" data-bs-target="#strandForm">
         <i class="fa-solid fa-circle-plus"></i> Add Strand
         </button>

          
    </div>
  </div>
    


    </div>
  </div>
</div>
 @include('partials.script')


</script>
</body>
</html>
