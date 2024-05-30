<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City High Portal</title>
    @include('partials.css')
  
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .content {
        min-height: 100vh;
        background: url('../images/city-high-bg.jpg') left/cover no-repeat;
        background-size: cover; 
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .content .card .card-body{

        display: flex;
        flex-direction: column; 
        gap: 16px;
        width: 400px;
        
    }
    
    </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home.index')}}">
      <img src="{{ asset('images/logo.png') }}" alt="school-logo" class="school-logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('home.index') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
      
          
        </ul>
        

        <a href="{{ route('home.loginpage') }}" class="btn btn-primary">Login</a>
        
      </div>
    </div>
  </nav>
  <div class="wrapper">
    <div class="content" id="main-content">
    <div class="card shadow-lg">
        <div class="card-body">
         <a href="{{ route('admin.login') }}" class="btn btn-primary bg-gradient">Administrator</a>
         <a href="{{ route('teacher.index') }}" class="btn btn-primary bg-gradient">Teacher</a>
         <a href="{{ route('student.login') }}" class="btn btn-success bg-gradient">Student</a>
         <a href="{{ route('guardian.login') }}" class="btn btn-success bg-gradient">Guardian</a>
         
        </div>
    </div>
    </div>
  </div>

  <!-- Include jQuery and Bootstrap 4 JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  @include('partials.script')

</body>
</html>
