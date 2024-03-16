<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#teacherForm">
    <i class="fa-solid fa-circle-plus"></i> Add Students
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
            <form action="{{ route('students.add.post') }}" method="POST">
                @csrf
                 
                 <div class="row mt-5">
                   <div class="col-md-3">
                     <label for="">LRN*</label>
                     <input type="text" class="form-control input-student" name="lrn" required>
                   </div>
                   <div class="col-md-3">
                     <label for="">Last name*</label>
                     <input type="text" class="form-control input-student" name="lasttname"  required>
                   </div>
                   <div class="col-md-3">
                     <label for="">First Name*</label>
                     <input type="text" class="form-control input-student" name="firstename" required>
                   </div>
                   <div class="col-md-3">
                     <label for="">MiddleName*</label>
                     <input type="text" class="form-control input-student" name="middlename"  required>
                   </div>
                 </div>
                 
                 <div class="row mt-5">
                   <div class="col-md-3">
                     <label for="">Sex*</label>
                     <select name="sex" id="sex" class="form-control" name="sex">
             
                       <option value="" disabled selected>Select sex</option>
                 <option value="male">Male</option>
                 <option value="female">Female</option>
                     </select>
                   </div>
                   <div class="col-md-3">
                     <label for="">Strand*</label>
                     <select name="strand_id" class="form-control input-student">
                        @if($strandName->isEmpty())
                            <option value="" disabled>No strands available</option>
                        @else
                            @foreach ($strands as $strand)
                                <option value="{{ $strand->id }}">{{ $strand->strand_name }}</option>
                            @endforeach
                        @endif
                    </select>
                    
                   </div>
                   <div class="col-md-3">
                     <label for="">Section*</label>
                     <input type="text" class="form-control input-student" required>
                   </div>
                   <div class="col-md-3">
                     <label for="">Grade Level*</label>
                     <input type="text" class="form-control input-student" required>
                   </div>
                   <div class="row mt-5">
                   <div class="col-md-3">
                     <label for="">Year start*</label>
                     <input type="text" class="form-control input-student" name="school_year" required>
                   </div>
                   <div class="col-md-3">
                     <label for="">Year end*</label>
                     <input type="text" class="form-control input-student" name="school_year" required>
                   </div>
                   <div class="col-md-3">
                     <label for="">Place of Birth*</label>
                     <input type="text" class="form-control input-student" required>
                   </div>
                   <div class="col-md-3">
                     <label for="">Date Of Birth*</label>
                     <input type="date" class="form-control input-student" required>
                   </div>
                   <div class="col-md-3 mt-5">
                     <label for="">Email*</label>
                     <input type="email" class="form-control input-student" required>
                   </div>
                 </div>
             
                   <h4 class="navbar-brand mt-5 fw-light">Present Address</h4>
                   <div class="row mt-5">
                   <div class="col-md-3">
                     <label for="">House Number</label>
                     <input type="text" class="form-control input-student">
                   </div>
                   <div class="col-md-3">
                     <label for="">Street</label>
                     <input type="text" class="form-control input-student" >
                   </div>
                   <div class="col-md-3">
                     <label for="">Barangay</label>
                     <input type="text" class="form-control input-student" >
                   </div>
                   <div class="col-md-3">
                     <label for="">City</label>
                     <input type="text" class="form-control input-student">
                   </div>
                   <div class="row mt-5">
                     <div class="col-md-3">
                       <label for="">State</label>
                       <input type="text" class="form-control input-student">
                     </div>
                     <div class="col-md-3">
                       <label for="">Zip code </label>
                       <input type="text" class="form-control input-student" >
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