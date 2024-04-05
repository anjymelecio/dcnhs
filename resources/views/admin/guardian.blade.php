s<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Guardian</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      
     
<div class="mt-4 address-menu">
            <span class="fw-light ">Home <span > <img src="{{ asset('icons/Vector.png') }}" alt=""> Add</span> 
             <img src="{{ asset('icons/Vector.png') }}" alt=""> <span style="color: #2780C2"> Guardian </span></span>
        </div>


        <div class="card mt-4">
          <div class="card-header bg-primary text-white">
            Add Guardians
          </div>
          <div class="card-body shadow-sm">
            <h5 class="mt-3">Personal Information</h5>


                  @include('partials.message')
      
           <form action="{{ route('guardians.create.post') }}" class="mt-5" method="POST">

           @csrf

            <div class="row">
            
            


              <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
                <label for="lastname">Last name *</label>
               <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" placeholder="Last name" value="{{ old('lastname') }}" required>
            @error('lastname')
        <div class="invalid-feedback">{{ $message }}</div>
                   @enderror
               </div>


               
               <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
               <label for="firstname">First name *</label>
              <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" placeholder="First name" value="{{ old('firstname') }}" required>
                            @error('firstname')
                  <div class="invalid-feedback">{{ $message }}</div>
                       @enderror
                 </div>


                 <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
                  <label for="middlename">Middle name *</label>
                  <input type="text" class="form-control @error('middlename') is-invalid @enderror" id="middlename" name="middlename" placeholder="Middle name" value="{{ old('middlename') }}" required>
                  @error('middlename')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>


              <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
                <label for="occupation">Occupation *</label>
                <input type="text" class="form-control @error('occupation') is-invalid @enderror" id="occupation" name="occupation" placeholder="Occupation" value="{{ old('occupation') }}" required>
                @error('occupation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
               
            </div>

          



        
         <div class="row mt-3">


             
                  <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
            <label for="sex">Sex *</label>
         <select class="form-control @error('sex') is-invalid @enderror" id="sex" name="sex">
       
        <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
       
    </select>
    @error('sex')
        <div class="invalid-feedback">{{ $message }}</div>
     @enderror
            </div>



       

            <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
                <label for="place_of_birth">Place of Birth *</label>
                <input type="text" class="form-control @error('place_of_birth') is-invalid @enderror" id="place_of_birth" name="place_of_birth" placeholder="Place of Birth" value="{{ old('place_of_birth') }}" required>
                @error('place_of_birth')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            


        
            <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
                <label for="birth_date">Date of Birth *</label>
                <input type="date" class="form-control @error('birth_date') is-invalid @enderror" id="birth_date" name="birth_date"  value="{{ old('birth_date') }}" required>
                @error('birth_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            

    <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
      <label for="email">Email *</label>
      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
      @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
         </div>



         <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
            <label for="phone">Phone *</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Phone" value="{{ old('phone') }}" required>
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
  




        
         </div>

         <h5 class="mt-5">Address</h5>


         <div class="row mt-3">

          <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
            <label for="street">Street </label>
            <input type="text" class="form-control @error('street') is-invalid @enderror" id="street" name="street" placeholder="Street" value="{{ old('street') }}">
            @error('street')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        


        
        <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
          <label for="brgy">Barangay *</label>
          <input type="text" class="form-control @error('brgy') is-invalid @enderror" id="brgy" name="brgy" placeholder="Barangay" value="{{ old('brgy') }}">
          @error('brgy')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>
      

    
    <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
    <label for="city">City *</label>
    <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" placeholder="City" value="{{ old('city') }}">
    @error('city')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

  




        
         </div>

          <button class="btn btn-primary mt-5">Submit</button>
        



          


            </div>
            
           </form>
        </div>



    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
