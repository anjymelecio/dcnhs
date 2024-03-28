<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      
     
<div class="mt-4 address-menu">
            <span class="fw-light ">Home <span style="color: #2780C2"> <img src="{{ asset('icons/Vector.png') }}" alt=""> Student</span></span>
        </div>


        <div class="card mt-4">
          <div class="card-header bg-primary text-white">
            Add Student
          </div>
          <div class="card-body shadow-sm">
            <h5 class="mt-3">Personal Information</h5>
           <form action="" class="mt-5">

            <div class="row">
              <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
              <label for="LRN">LRN *</label>
               <input type="text" class="form-control @error('LRN') is-invalid @enderror" id="LRN" name="LRN" placeholder="LRN" value="{{ old('LRN') }}">
               @error('LRN')
               <div class="invalid-feedback">{{ $message }}</div>
           @enderror
              </div>


              <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
                <label for="lastname">Last name *</label>
               <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" placeholder="Last name" value="{{ old('lastname') }}">
            @error('lastname')
        <div class="invalid-feedback">{{ $message }}</div>
                   @enderror
               </div>


               
               <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
               <label for="firstname">First name *</label>
              <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" placeholder="First name" value="{{ old('firstname') }}">
                            @error('firstname')
                  <div class="invalid-feedback">{{ $message }}</div>
                       @enderror
                 </div>


                 <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
                  <label for="middlename">Middle name *</label>
                  <input type="text" class="form-control @error('middlename') is-invalid @enderror" id="middlename" name="middlename" placeholder="Middle name" value="{{ old('middlename') }}">
                  @error('middlename')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
               
            </div>

             <div class="row mt-3">
              <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
                <label for="strand_id">Strand *</label>
                <input type="text" class="form-control @error('strand_id') is-invalid @enderror" id="strand_id" name="strand_id" placeholder="Strands" value="{{ old('strand_id') }}">
                @error('strand_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            

        
              <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
                <label for="grade_level">Strand *</label>
                <input type="text" class="form-control @error('grade_level') is-invalid @enderror" id="grade_level" name="grade_level" placeholder="Grade Level" value="{{ old('grade_level') }}">
                @error('grade_level')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
              <label for="section_id">Section *</label>
              <input type="text" class="form-control @error('section_id') is-invalid @enderror" id="section_id" name="section_id" placeholder="Section" value="{{ old('section_id') }}">
              @error('section_id')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>


          <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
            <label for="school_year_id">School Year *</label>
            <input type="text" class="form-control @error('school_year_id') is-invalid @enderror" id="school_year_id" name="school_year_id" placeholder="School Year" value="{{ old('school_year') }}">
            @error('school_year_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>



        
         <div class="row mt-3">

          <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
            <label for="place_birth">Place of Birth *</label>
            <input type="text" class="form-control @error('place_birth') is-invalid @enderror" id="place_birth" name="place_birth" placeholder="Place of Birth" value="{{ old('place_birth') }}">
            @error('place_birth')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        
         <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
    <label for="date_birth">Date of Birth *</label>
    <input type="text" class="form-control @error('date_birth') is-invalid @enderror" id="date_birth" name="date_birth" placeholder="Date of Birth" value="{{ old('date_birth') }}">
    @error('date_birth')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
      <label for="email">Email *</label>
      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
      @error('email')
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


        



          


            </div>
            <button class="btn btn-primary mt-5">Submit</button>
           </form>
        </div>



    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
