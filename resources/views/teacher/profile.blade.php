<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $teacher->teacher_id }}</title>
    @include('partials.css')
</head>
<body>

  @include('teacherpartials.navbar')
  


  <div class="wrapper">
    



@include('partials.maincontent')
      
<div class="container-fluid  ">

    <div class="card ">
      <div class="card-header">
        <ul class="nav nav-pills card-header-pills">
          <li class="nav-item">
            <a class="nav-link active" href="{{route('teacher.profile')}}">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('teacher.password')}}">Change Password</a>
          </li>
         
        </ul>
      </div>
      <div class="card-body">

        
      
        <form action="{{route('teacher.change.profile')}}" method="POST">
  
          @csrf
          @method('PUT')
             <div class="row">
               @include('partials.message')
      
               <div class="row">
               <h5 class="fw-bold mb-3">Personal Information</h5>
                <div class="col-xs-4 col-sm-4 col-md-4 mt-3">
                    <label for="lastname">Lastname*</label>
                    <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" placeholder="Lastname" value="{{ $teacher->lastname }}" required>
                    @error('lastname')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            
                    <label for="birth_place" class="mt-3">Birth place *</label>
                    <input type="text" class="form-control @error('birth_place') is-invalid @enderror" id="birth_place" name="birth_place" placeholder="Birth place" value="{{ $teacher->birth_place }}" required>
                    @error('birth_place')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="col-xs-4 col-sm-4 col-md-4 mt-3">
                    <label for="firstname">Firstname*</label>
                    <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" placeholder="Firstname" value="{{ $teacher->firstname }}" required>
                    @error('firstname')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            
                    <label for="email" class="mt-3">Email *</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ $teacher->email }}" required>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="col-xs-4 col-sm-4 col-md-4 mt-3">
                    <label for="middlename">Middlename*</label>
                    <input type="text" class="form-control @error('middlename') is-invalid @enderror" id="middlename" name="middlename" placeholder="Middlename" value="{{ $teacher->middlename }}" required>
                    @error('middlename')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    
                     <label class="mt-3" for="phone_number">Phone number*</label>
                     <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" placeholder="Middlename" value="{{ $teacher->phone_number }}" required>
                    @error('phone_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

               <div class="row">
                 <div class="col-xs-4 col-sm-4 col-md-4 mt-3">
                    <label for="sex">Sex*</label>
                    <select class="form-control @error('sex') is-invalid @enderror" id="sex" name="sex">

                        <option value="Male" {{$teacher->sex == 'Male' ? 'selected': ' '}}>Male</option>
                         <option value="Female"  {{$teacher->sex == 'Female' ? 'selected': ' '}}>Female</option>                     
               
                    </select>
                    @error('sex')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    
                  
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 mt-3">
                        <label for="date_birth">Birth Date*</label>
                        <input type="date" class="form-control @error('date_birth') is-invalid @enderror" id="date_birth" name="date_birth" value="{{ $teacher->date_birth }}" required>
                        @error('date_birth')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    
            </div>


            <h5 class="fw-bold mb-3 mt-5">Address</h5>

            
               <div class="row">
              
        <div class="col-xs-4 col-sm-4 col-md-4 mt-3">
    <label for="street">Street*</label>
    <input type="text" name="street" class="form-control @error('street') is-invalid @enderror" value="{{ $teacher->street }}">
    @error('street')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

                   <div class="col-xs-4 col-sm-4 col-md-4 mt-3">
    <label for="brgy">Brgy*</label>
    <input type="text" class="form-control @error('brgy') is-invalid @enderror" id="brgy" name="brgy" value="{{ $teacher->brgy }}" required>
    @error('brgy')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-xs-4 col-sm-4 col-md-4 mt-3">
    <label for="state">State*</label>
    <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" name="state" value="{{ $teacher->state }}" required>
    @error('state')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


                    
                    
            
            
            
             </div>
        
     
     
           
      </div>
     
    </div>
       <button class="btn btn-primary mt-3">Save</button>
           </form>
  
    </div>
  
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
