<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('partials.css')
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
</head>
<body>


  @include('partials.navbar')



  <div class="wrapper">
    

        
    

     














@include('partials.maincontent')
<span class="fw-light ">Home <img src="{{asset('icons/Vector.png')}}" alt=""> <span style="color: #2780C2">Add </span></span>
          @include('partials.addmenu')
          
        <div class="card-body">
               
        </div>
      </div>

     
    </div>
  </div>
    
 @include('partials.script')
</body>
</html>
