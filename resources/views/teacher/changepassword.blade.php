<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
    @include('partials.css')
</head>
<body>

  @include('teacherpartials.navbar')
  


  <div class="wrapper">
    



@include('partials.maincontent')
      
<div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-pills card-header-pills">
          <li class="nav-item">
            <a class="nav-link " href="{{route('teacher.profile')}}">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('admin.change.password')}}">Change Password</a>
          </li>
         
        </ul>
      </div>
      <div class="card-body">
        @include('partials.message')
         <form action="{{ route('teacher.password.update')}}" method="POST">
    
            @csrf
            @method('PUT')
            <div class="row">
    
             <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
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
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
