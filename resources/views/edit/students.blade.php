@foreach ( $students as $student )
  

  <div class="modal fade" id="editStudent{{ $student->id }}" tabindex="-1" aria-labelledby="editStudentFormlabel{{ $student->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStudentFormlabel{{ $student->id }}">Edit Students</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('students.update', ['id' => $student->id]) }}" method="POST">
                  @method('PUT')
                    @csrf
                    <div class="row mt-5">
                        <div class="col-md-3">
                            <label for="">LRN*</label>
                            <input type="text" value="{{ $student->lrn }}" class="form-control input-student" name="lrn" required>
                        </div>
                        <div class="col-md-3">
                            <label for="">Last name*</label>
                            <input type="text" value="{{ $student->lastname }}" class="form-control input-student" name="lastname" required>
                        </div>
                        <div class="col-md-3">
                            <label for="">First Name*</label>
                            <input type="text" value="{{ $student->firstname }}" class="form-control input-student" name="firstname" required>
                        </div>
                        <div class="col-md-3">
                            <label for="">MiddleName*</label>
                            <input type="text "value="{{ $student->middlename }}" class="form-control input-student" name="middlename" required>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-3">
                            <label for="">Sex*</label>
                            <select name="sex" id="sex" class="form-control">
                              <option value="" disabled selected>Select sex</option>
                              @if ($student->sex == $student->sex)
                                  <option value="{{ $student->sex }}" selected>{{ $student->sex }}</option>
                              @endif
                              
                              @if ($student->sex == 'male' || $student->sex == 'Male')
                                  <option value="Female">Female</option>
                              @elseif ($student->sex == 'female' || $student->sex == 'Female')
                                  <option value="Male">Male</option>
                              @endif
                          </select>
                          
                        </div>
                        <div class="col-md-3">
                            <label for="">Strand*</label>
                            <select name="strand_id" class="form-control input-student" >
                                <option disabled selected>Select Strand</option>
                                @foreach ($strands as $strand)
                                    <option value="{{$strand->id}}"
                                       @if ($strand->strands == $strand->strands)
                                         selected
                                      
                                       @endif>
                                       {{ $strand->strands}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">Section*</label>
                            <select name="section_id" class="form-control input-student">
                                <option disabled selected>Select Section</option>
                                @foreach ($sections as $section)
                                <option value="{{ $section->id }}" 
                                  @if($student->section_name == $section->section_name) selected
                                   @endif>{{ $section->section_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="grade_level">Grade Level*</label>
                            <select name="grade_level" value="{{ $student->grade_level }}" id="grade_level" class="form-control input-student">

                              @if ($student->grade_level == $student->grade_level)
                              <option value="{{ $student->grade_level }}">{{ $student->grade_level }}</option>
                              @endif
                               @if ($student->grade_level == 11)

                                <option value="12">12</option>
                                 
                                 @else
                                  <option value="11">11</option>
                               @endif
                            </select>
                        </div>
                    </div>
                   <div class="row mt-5">
  
                    <div class="col-md-3">
                       <label for="">Year start*</label>
                       <input type="text"value="{{ $student->year_start }}" class="form-control input-student" name="year_start" required>
                     </div>
                     <div class="col-md-3">
                       <label for="">Year end*</label>
                       <input type="text" value="{{ $student->year_end }}" class="form-control input-student" name="year_end" required>
                     </div>
                     <div class="col-md-3">
                       <label for="">Place of Birth*</label>
                       <input type="text" name="place_birth" value="{{ $student->place_birth }}" class="form-control input-student" required>
                     </div>
                      <div class="col-md-3">
                       <label for="">Date Of Birth*</label>
                       <input type="date" name="birth_date" value="{{ $student->birth_date }}" class="form-control input-student" required>
                     </div>
                     <div class="row mt-5">
                      <div class="col-md-3 ">
                       <label for="">Email*</label>
                       <input type="email" name="email" value="{{ $student->email }}" class="form-control input-student" required>
                     </div>
  
                      <div class="col-md-3 search-select-box">
                       <label for="">Parents*</label>
                       <select name="guardian_id" class="form-control input-student"  data-live-search="true">
                       
                       @foreach ( $guardians as $guardian )
                         <option value="{{ $guardian->id }}">{{ $guardian->firstname }} {{ $guardian->lastname }}</option>
                       @endforeach
                       </select>
                      
                     </div>
                     <div class="row mt-5">
                     <div class="col-md-3">
                       <label for="">House Number</label>
                       <input type="text"  @if ($student->house_address == null)  placeholder="N/A" @else value="{{$student->house_address}}"
                       @endif name="house_address" class="form-control input-student">

                     </div>
                     <div class="col-md-3">
                       <label for="">Street</label>
                       <input type="text" @if ($student->street == null)  placeholder= "N/A" 
                       @else
                       value="{{$student->street}}"
                       @endif name="street" class="form-control input-student" >
                     </div>
                     <div class="col-md-3">
                       <label for="brgy">Barangay</label>
                       <input type="text" @if ($student->brgy == null)
                       placeholder="N/A"
                        @else value="{{$student->brgy}}"
                       @endif id ="brgy"name="brgy" class="form-control input-student" >
                     </div>
                     <div class="col-md-3">
                       <label for="city">City</label>
                       <input type="text" @if ($student->city == null)
                         placeholder ="N/A"
                         @else
                         value="{{$student->city}}"
                       @endif id="city" name="city" class="form-control input-student">
                     </div>
                     </div>
                      <div class="row mt-5">
                       <div class="col-md-3">
                         <label for="state">State</label>
                         <input type="text" @if ($student->state == null)
                           placeholder="N/A"
                           @else
                           value="{{$student->state}}"
                         @endif id="state" name="state" class="form-control input-student">
                       </div>
                       <div class="col-md-3">
                         <label for="zip_code">Zip code </label>
                         <input type="text" id="zip_code" @if ($student->zip == null)
                           placeholder="N/A"
                           @else value="{{ $student->zip }}"
                         @endif name="zip" class="form-control input-student" >
                       </div>
                       </div>
                     </div>
                   </div>
              
            </div>
            <div class="modal-footer mt-5">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
    </div>
  </div>
  @endforeach