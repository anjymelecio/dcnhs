<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers Data</title>
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
        <span class="fw-light ">Home <img src="{{asset('icons/Vector.png')}}" alt=""> <span style="color: #2780C2">Add <img src="{{asset('icons/Vector.png')}}" alt=""> Teacher Data</span></span>
        </div>
   @include('partials.addmenu')

  

   <div class="card-body ">
   <h3 class="fw-light">Teachers</h3>

   @include('partials.message')
@include('add.teachers')

<div class="table-responsive-md">
<table class="table mt-5 table-responsive-sm table-bordered">
  <thead>
    <tr>
      <th scope="col">Teacher Id</th>
      <th scope="col">Last Name</th>
      <th scope="col">First name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Rank</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($teachers as $teacher )

    <tr>
      <td>{{$teacher->teacher_id}}</td>
      <td>{{$teacher->lastname}}</td>
      <td>{{$teacher->firstname}}</td>
      <td>{{$teacher->middlename}}</td>
      <td>{{$teacher->rank}}</td>
      <td ><a href="#" class="btn btn-warning "><i class="fa-solid fa-pen-to-square"></i></a>
      <button class="btn btn-danger "><i class="fa-solid fa-trash"></i></button>
      </td>
      
    </tr>
      
    @endforeach
  </tbody>
</table>

</div>
   </div>
    </div>
  </div>
    
  @include('partials.script')


</script>
</body>
</html>
