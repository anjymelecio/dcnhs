<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin profile</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
<div class="container-fluid  d-flex justify-content-center ">
<div class="card w-75">
    <div class="card-header bg-primary text-white">
 {{ $admin->name }} profile
    </div>
    <div class="card-body">
     <form action="{{route('admin.profile.post')}}" method="POST">

     @csrf
        <div class="row">
          @include('partials.message')
  <h5>Personal Information</h5>
            <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
                <label for="name">Name *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ $admin->name }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="email">Email *</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ $admin->email }}" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
   


        <button class="btn btn-primary mt-3">Save</button>
      </form>
            
        </div>
     
    </div>
  </div>




    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
