<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin List</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      <div class="mt-4 address-menu">
            <span class="fw-light ">Home <span > <img src="{{ asset('icons/Vector.png') }}" alt=""> Add</span> 
             <img src="{{ asset('icons/Vector.png') }}" alt=""> <span style="color: #2780C2"> Admin</span></span>
        </div>
<div class="card mt-3">
    <div class="card-header bg-primary text-white">
        <span>Create admin</span>
    </div>
    <div class="card-body">

        @include('partials.message')
      <form action="{{ route('admin.create.post') }}" method="POST">

        @csrf

        <div class="row">

       
             <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
    <label for="name">Admin name *</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Admin name" value="{{ old('name') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-xs-3 col-sm-3 col-md-3 mt-3">
    <label for="email">Email*</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-xs-3 col-sm-3 col-md-3 mt-3">
    <label for="password">Password*</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
    @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-xs-3 col-sm-3 col-md-3 mt-3">
    <label for="password_confirmation">Confirm Password*</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
</div>


<div class="col-xs-3 col-sm-3 col-md-3 mt-3">
    <label for="is_admin">Admin Role*</label>
    <select name="is_admin" id="is_admin" class="form-control @error('is_admin') is-invalid @enderror">
        <option value="1">Super Admin</option>
        <option value="0">Admin</option>
    </select>
    @error('is_admin')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
</div>

<button class="btn mt-3 btn-primary">Create</button>

      </form>
  </div>

    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
