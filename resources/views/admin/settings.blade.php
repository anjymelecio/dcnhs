<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      
  
<div class="container-fluid  d-flex justify-content-center ">
<div class="card w-50">
    <div class="card-header bg-primary text-white">
      Change password
    </div>
    <div class="card-body">
        @include('partials.message')
     <form action="{{ route('admin.update.password') }}" method="POST">

        @csrf
        <div class="row">

         <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
    <label for="old-password">Old Password *</label>
    <input type="password" class="form-control @error('old-password') is-invalid @enderror" id="old-password" name="old-password" placeholder="Old Password" value="" required>
    @error('old-password')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror

     <label for="new-password" class="mt-3">New Password *</label>
    <input type="password" class="form-control @error('new-password') is-invalid @enderror" id="new-password" name="new-password" placeholder="New Password" value="" required>
    @error('new-password')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror

     <label for="password_confirmation" class="mt-3">Confirm Password*</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
</div>









            
        </div>
        <button class="btn btn-primary mt-3">Save</button>
     </form>
    </div>
  </div>



    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
