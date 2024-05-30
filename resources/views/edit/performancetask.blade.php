<!-- Button trigger modal -->
<a href="#edit{{ $quarter->id }}" class="btn" data-bs-toggle="modal" data-bs-target="#edit{{ $quarter->id }}">
  <button class="btn btn-warning btn-sm">Edit</button>
</a>
   
<!-- Modal -->
<div class="modal fade" id="edit{{ $quarter->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit {{ $student->firstname }} Performance task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
            
                <form action="{{ route('student.perform.update', ['student_id'=>$student->id, 'subject_id'=>$subject->id, 'pt_id' => $quarter->id]) }}" method="POST">

                    @csrf
                    @method('PUT')
                    <select name="quarter" class="form-control mb-3">
                        
                            <option value="1" {{ $quarter->quarter == 1 ? 'selected': '' }}>Quarter 1</option>
                            <option value="2" {{ $quarter->quarter == 2 ? 'selected': '' }}>Quarter 2</option>
                            <option value="3" {{ $quarter->quarter == 3 ? 'selected': '' }}>Quarter 3</option>
                            <option value="4" {{ $quarter->quarter == 4 ? 'selected': '' }}>Quarter 4</option>
                       
                    </select>
                   
                    <div class="row mt-3 gap-3" style="margin-left: 100px; ">
                         <label>Highest possible score</label>
                     
                         @for ($i = 1; $i <= 10; $i++)
                             <input type="number" name="h{{ $i }}" style="width: 60px;" value="{{ $quarter->{'h'.$i} }}" class="form-control">
                         @endfor
                         
                    </div>
    
                    <div class="row mt-3 gap-3" style="margin-left: 100px; ">
                        <label>Score</label>
                     
                        @for ($i = 1; $i <= 10; $i++)
                            <input type="number" name="s{{ $i }}" style="width: 60px;" value="{{ $quarter->{'s'.$i} }}" class="form-control">
                        @endfor
                        
                    </div>
                    
                    
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>

            </form>
           
        </div>
    </div>
</div>
