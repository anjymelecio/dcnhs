<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="strandForm" tabindex="-1" aria-labelledby="strandFormlabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="strandFormlabel">Add Strand</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('strand.post')}} method="POST">
                <label for="strand_name" class="col-form-label">Strand Name*</label>
                <input type="text" class="form-control input-student mb-3" name="strand_name" required>

                <label for="section_id" class="col-form-label">Section Name*</label>
                <select name="section_id" class="form-control mb-3">
     
                <option >Select Section</option>
               @foreach ( $sections as $section )
                  <option value="{{$section->id}}">{{$section->section_name}}</option>
               @endforeach   
                     
                       
               
                
                </select>
       
                <label for="teacher_id" class="col-form-label">Adviser*</label>
                <select name="teacher_id" class="form-control">

                  <option disabled selected>Select Adviser</option>

                  @foreach ($teachers as $teacher )
                    <option value="{{teacher->id}}">{{$teacher->firstname}} {{$teacher->lastname}}</option>
                  @endforeach
                </select>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
      </div>
    </div>
  </div>