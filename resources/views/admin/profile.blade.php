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
      
<div class="card">
    <div class="card-header bg-primary text-white">
      change profile {{ $admin->name }}
    </div>
    <div class="card-body">
     <form>
        <div class="row">
  <h5>Personal Information</h5>
            <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
                <label for="name">Name *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ $admin->name }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

           <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
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
    
 @include('partials.script')


</script>
</body>
</html>
