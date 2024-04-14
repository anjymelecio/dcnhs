s<!DOCTYPE html>
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
            <span class="fw-light ">Home <span > <img src="{{ asset('icons/Vector.png') }}" alt=""> Add</span> 
             <img src="{{ asset('icons/Vector.png') }}" alt=""> <span style="color: #2780C2"> Students </span></span>
        </div>


        <div class="card mt-4">
          <div class="card-header bg-primary text-white">
            Add Student
          </div>
          <div class="card-body shadow-sm">
            <h5 class="mt-3">Personal Information</h5>


                  @include('partials.message')
      
           <form action="{{route('students.create.post')}}" class="mt-5" method="POST">

           @csrf

            <div class="row">
            
              <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
              <label for="lrn">LRN *</label>
               <input type="text" class="form-control @error('lrn') is-invalid @enderror" id="lrn" name="lrn" placeholder="LRN" value="{{ old('lrn') }}" required>
               @error('lrn')
               <div class="invalid-feedback">{{ $message }}</div>
           @enderror
              </div>


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
           <label for="strand_id">Strand *</label>
         <select class="form-control @error('strand_id') is-invalid @enderror" id="strand_id" name="strand_id">
       
        @foreach ($strands as $strand)
            <option value="{{ $strand->id }}" {{ old('strand_id') == $strand->id ? 'selected' : '' }}>
                {{ $strand->strands }}
            </option>
        @endforeach
    </select>
        @error('strand_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
               </div>

            

        
              
               <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
                <label for="grade_level_id">Grade level *</label>
                <select class="form-control @error('grade_level_id') is-invalid @enderror" id="grade_level_id" name="grade_level_id">
                    @foreach ($gradeLevel as $level)
                        <option value="{{ $level->id }}" {{ old('grade_level_id') == $level->id ? 'selected' : '' }}>
                            {{ $level->level }}
                        </option>
                    @endforeach
                </select>
                @error('grade_level_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            



                 <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
       <label for="section_id">Section *</label>
       <select class="form-control @error('section_id') is-invalid @enderror" id="section_id" name="section_id">
        @foreach ($sections as $section)
            <option value="{{ $section->id }}" {{ old('section_id') == $section->id ? 'selected' : '' }}>
                {{ $section->section_name }}
            </option>
        @endforeach
         </select>
      @error('section_id')
        <div class="invalid-feedback">{{ $message }}</div>
           @enderror
            </div>


          

             </div>



        
         <div class="row mt-3">

         <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
            <label for="school_year_id">School Year *</label>
            <select class="form-control @error('school_year_id') is-invalid @enderror" id="school_year_id" name="school_year_id" >
             @foreach ($years as $year )
               <option value="{{$year->id}}">{{$year->start_year}} - {{$year->end_year}}</option>
             @endforeach
            </select>
            @error('school_year_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


          <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
            <label for="place_birth">Place of Birth *</label>
            <input type="text" class="form-control @error('place_birth') is-invalid @enderror" id="place_birth" name="place_birth" placeholder="Place of Birth" value="{{ old('place_birth') }}" required>
            @error('place_birth')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        
         <div class="col-xs-3 col-sm-3 col-md-3 mt-3">
    <label for="date_birth">Date of Birth *</label>
    <input type="date" class="form-control @error('date_birth') is-invalid @enderror" id="date_birth" name="date_birth"  value="{{ old('date_birth') }}" required>
    @error('date_birth')
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
            <label for="semester_id">Semester *</label>
            <select class="form-control @error('semester_id') is-invalid @enderror" id="semester_id" name="semester_id">
                @foreach ($semesters as $semester)
                    <option value="{{ $semester->id }}" {{ old('semester_id') == $semester->id ? 'selected' : '' }}>
                        {{ $semester->semester}}
                    </option>
                @endforeach
            </select>
            @error('semester_id')
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
