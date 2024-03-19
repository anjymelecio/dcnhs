<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#studentForm">
  <i class="fa-solid fa-circle-plus"></i> Add Students
</button>

<!-- Modal -->
<div class="modal fade" id="studentForm" tabindex="-1" aria-labelledby="teacherFormlabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="teacherFormlabel">Add Students</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="{{ route('students.add.post') }}" method="POST">
                  @csrf
                  <div class="row mt-5">
                      <div class="col-md-3">
                          <label for="">LRN*</label>
                          <input type="text" value="{{ old('lrn') }}" class="form-control input-student" name="lrn" required>
                      </div>
                      <div class="col-md-3">
                          <label for="">Last name*</label>
                          <input type="text" value="{{ old('lastname') }}" class="form-control input-student" name="lastname" required>
                      </div>
                      <div class="col-md-3">
                          <label for="">First Name*</label>
                          <input type="text" class="form-control input-student" value="{{ old('firstname') }}"  name="firstname" required>
                      </div>
                      <div class="col-md-3">
                          <label for="">MiddleName*</label>
                          <input type="text" class="form-control input-student"  value="{{ old('middlename') }}"name="middlename" required>
                      </div>
                  </div>
                  <div class="row mt-5">
                      <div class="col-md-3">
                          <label for="">Sex*</label>
                          <select name="sex" id="sex" class="form-control">
                              <option value="" disabled selected>Select sex</option>
                              <option value="Male" {{ (old('sex') == 'Male' || old('sex') == 'male') ? 'selected' : '' }}>Male</option>
                              <option value="Female" {{ (old('sex') == 'Female' || old('sex') == 'female') ? 'selected' : '' }}>Female</option>

                          </select>
                      </div>
                      <div class="col-md-3">
                          <label for="">Strand*</label>
                          <select name="strand_id" class="form-control input-student">
                              <option disabled selected>Select Strand</option>
                              @foreach ($strands as $strand)
                                <option value="{{ $strand->id }}" {{ old('strand_id') == $strand->id ? 'selected' : '' }}>
                                          {{ $strand->strands }}
                                   </option>
                              @endforeach
                          </select>
                      </div>
                      <div class="col-md-3">
                          <label for="">Section*</label>
                          <select name="section_id" class="form-control input-student" required>
                              <option disabled selected>Select Section</option>
                              @foreach ($sections as $section)
                                  <option value="{{ $section->id }}" {{ old('section_id') == $section->id ? 'selected' : '' }}>
                                   {{ $section->section_name }}
                                              </option>
   

                              @endforeach
                          </select> 
                      </div>
                      <div class="col-md-3">
                          <label for="grade_level">Grade Level*</label>
                         <select name="grade_level" id="grade_level" class="form-control input-student">
    <option value="11" {{ old('grade_level') == '11' ? 'selected' : '' }}>11</option>
    <option value="12" {{ old('grade_level') == '12' ? 'selected' : '' }}>12</option>
           </select>

                      </div>
                  </div>
                 <div class="row mt-5">

                  <div class="col-md-3">
                     <label for="">Year start*</label>
                     <input type="text" value="{{old('year_start')}}" class="form-control input-student" name="year_start" required>
                   </div>
                   <div class="col-md-3">
                     <label for="">Year end*</label>
                     <input type="text" value="{{old('year_end')}}" class="form-control input-student" name="year_end" required>
                   </div>
                   <div class="col-md-3">
                     <label for="">Place of Birth*</label>
                     <input type="text" value="{{old('place_birth')}}" name="place_birth" class="form-control input-student" required>
                   </div>
                    <div class="col-md-3">
                     <label for="">Date Of Birth*</label>
                     <input type="date" name="birth_date" value="{{old('birth_date')}}"  class="form-control input-student" required>
                   </div>
                   <div class="row mt-5">
                    <div class="col-md-3 ">
                     <label for="">Email*</label>
                     <input type="email" name="email" value="{{old('email')}}"   class="form-control input-student" required >
                   </div>

                    <div class="col-md-3 search-select-box">
                     <label for="">Parents*</label>
                      <select name="guardian_id" class="form-control input-student" data-live-search="true" required>
            @foreach ($guardians as $guardian)
            <option value="{{ $guardian->id }}" {{ old('guardian_id') == $guardian->id ? 'selected' : '' }}>{{ $guardian->firstname }}</option>
              @endforeach
            </select>
                    
                   </div>
                   <div class="row mt-5">
                   <div class="col-md-3">
                     <label for="">House Number</label>
                     <input type="text" value="{{old('house_address')}}" name="house_address" class="form-control input-student">
                   </div>
                   <div class="col-md-3">
                     <label for="">Street</label>
                     <input type="text" value="{{old('street')}}" name="street" class="form-control input-student" >
                   </div>
                   <div class="col-md-3">
                     <label for="">Barangay</label>
                     <input type="text" name="brgy" value="{{old('brgy')}}" class="form-control input-student" >
                   </div>
                   <div class="col-md-3">
                     <label for="">City</label>
                     <input type="text" name="city" value="{{old('city')}}" class="form-control input-student">
                   </div>
                   </div>
                    <div class="row mt-5">
                     <div class="col-md-3">
                       <label for="">State</label>
                       <input type="text" value="{{old('state')}}" name="state" class="form-control input-student">
                     </div>
                     <div class="col-md-3">
                       <label for="">Zip code </label>
                       <input type="text" value="{{old('zip')}}" name="zip" class="form-control input-student" >
                     </div>
                     </div>
                   </div>
                 </div>
              
          </div>
          <div class="modal-footer mt-5">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </form>
          </div>
      </div>
  </div>
</div>
