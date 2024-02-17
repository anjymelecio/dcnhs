<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>


   
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 school-bg" >
              
            </div>
            
            <div class="col-md-6 login-page">



              
               


                   @if ($errors->any())
                 <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <p style="font-weight: 600; color: rgb(238, 34, 34)">{{ $error }}</p>
        @endforeach
                    </div>
                 @endif
          

                    
                <div class="form-container">
                  
                  
          <form action="{{ route('admin-post') }}" method="POST" class="mt-5">

                        @csrf
                   
                    <input type="email" placeholder="Username" class="form-control @error('email')
                        error-border
                    @enderror" name="email" value="{{ old('email') }}" >
                  
                    <input type="password" placeholder="Password" class="form-control @error('password')
                        error-border
                    @enderror" name="password" >
             
                    <br>
                    <button class="form-control btn-login fw-bold text-uppercase">Log in</button>
                    
                    <p class="text-center fw-light mt-3 forgot-password"><a href="">Forgot password?</a></p>
                   
                </form>

                </div>
                 <p class="copy-right">Copyright 2024 MEDI. All right reserved</p>
                 

              

  

                 

               
                

                  

                
                
               
            

            </div>
            
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>