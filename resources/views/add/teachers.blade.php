<!-- Button trigger modal -->
<button type="button" class="btn btn-primary  mt-5" data-bs-toggle="modal" data-bs-target="#teacherForm">
    <i class="fa-solid fa-circle-plus"></i> Add New
  </button>
  <!-- Modal -->
  <div class="modal fade" id="teacherForm" tabindex="-1" aria-labelledby="teacherFormlabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="teacherFormlabel">Add Teacher</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('teacher.add.post') }}" method="POST">
                @csrf
                 
                 <div class="row mt-5">
                   <div class="col-md-3">
                     <label for="">ID*</label>
                     <input type="text" class="form-control input-student" name="teacher_id" required>
                   </div>
                   <div class="col-md-3">
                     <label for="">Last name*</label>
                     <input type="text" class="form-control input-student" name="lastname"  required>
                   </div>
                   <div class="col-md-3">
                     <label for="">First Name*</label>
                     <input type="text" class="form-control input-student" name="firstname" required>
                   </div>
                   <div class="col-md-3">
                     <label for="">MiddleName*</label>
                     <input type="text" class="form-control input-student" name="middlename"  required>
                   </div>
                 </div>
         
                 
                 <div class="row mt-5">
                  
                   </div>
                  
                   <div class="row ">
                            <div class="col-md-3">
                                  <label for="rank">Rank:</label>
           <select class="form-control input-student" name="rank" id="rank">
    <option value="Teacher I">Teacher I</option>
    <option value="Teacher II">Teacher II</option>
    <option value="Teacher III">Teacher III</option>
    <option value="Master Teacher I">Master Teacher I</option>
    <option value="Master Teacher II">Master Teacher II</option>
    <option value="Master Teacher III">Master Teacher III</option>
    <option value="Master Teacher IV">Master Teacher IV</option>
          </select>

                 </div>

                    <div class="col-md-3">
                        <label for="">Sex*</label>
                        <select name="sex" id="sex" class="form-control" name="sex">
                
                          <option value="" disabled selected>Select sex</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Status*</label>
                        <select name="status" id="sex" class="form-control" name="status">
                
                          <option value="" disabled selected>Status</option>
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                     <option value="widowed">Widowed</option>
                        </select>
                    </div>
                  


                   <div class="col-md-3">
                     <label for="">Place of Birth*</label>
                     <input type="text" name="birth_place" class="form-control input-student" required>
                   </div>
                   <div class="col-md-3 mt-5">
                     <label for="">Birth date*</label>
                     <input type="date" name="date_birth" class="form-control input-student" required>
                   </div>
                   <div class="col-md-3 mt-5">
                     <label for="">Email*</label>
                     <input type="email" name="email" class="form-control input-student" required>
                   </div>
                   <div class="col-md-3 mt-5">
                     <label for="">Phone number*</label>
                     <input type="text" name="phone_number" class="form-control input-student" required>
                   </div>
                 </div>
             
                   <h4 class="navbar-brand mt-5 fw-light">Present Address</h4>
                   <div class="row mt-5">
                   <div class="col-md-3">
                     <label for="">House Number</label>
                     <input type="text" class="form-control input-student" name="house_number">
                   </div>
                   <div class="col-md-3">
                     <label for="">Street</label>
                     <input type="text" class="form-control input-student" name="street" >
                   </div>
                   <div class="col-md-3">
                     <label for="">Barangay</label>
                     <input type="text" class="form-control input-student" name="brgy" >
                   </div>
                   <div class="col-md-3">
                     <label for="">City</label>
                     <input type="text" class="form-control input-student" name="city">
                   </div>
                   <div class="row mt-5">
                     <div class="col-md-3">
                       <label for="">State</label>
                       <input type="text" class="form-control input-student" name="state">
                     </div>
                     <div class="col-md-3">
                       <label for="">Zip code </label>
                       <input type="text" class="form-control input-student" name="zip_code">
                     </div>
                     </div>
             
                   
                 </div>
                 
                 </div>
                
                
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Add</button>
           
        </div>
        </form>
      </div>
    </div>
  </div>