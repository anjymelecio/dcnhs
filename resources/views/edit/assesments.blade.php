<!-- Button trigger modal -->
<a href="#edit{{ $quarter->id }}" class="btn" data-bs-toggle="modal" data-bs-target="#edit{{ $quarter->id }}">
    <button class="btn btn-sm btn-warning">Edit</button>
</a>
   
<!-- Modal -->
<div class="modal fade" id="edit{{ $quarter->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit {{ $student->firstname }} Assesment Score</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
            
                <form action="{{ route('student.assessment.update', ['student_id' => $student->id, 'subject_id' => $subject->id, 'as_id' => $quarter->id]) }}" method="POST">

                  
                    @csrf
                    @method('PUT')
                    <label for="">Quarter</label>
                    <select name="quarter" id="quarter" class="form-control mb-3">
                        <option value="1" {{ $quarter->quarter == 1 ? 'selected' : '' }}>Quarter 1</option>
                        <option value="2" {{ $quarter->quarter == 2 ? 'selected' : '' }}>Quarter 2</option>
                        <option value="3" {{ $quarter->quarter == 3 ? 'selected' : '' }}>Quarter 3</option>
                        <option value="4" {{ $quarter->quarter == 4 ? 'selected' : '' }}>Quarter 4</option>
                    </select>
                   
                   
                        <label for="highest_score">Highest Possible Score</label>
                        <input type="number" id="total_highest_score" name="total_highest_score" value="{{ $quarter->highest_score}}" class="form-control mb-3">
                        <label for="actual_score">Score</label>
                        <input type="number" id="total_score" name="total_score" value="{{ $quarter->total_score }}" class="form-control">
                         
               
    
                   
                    
                    
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>

            </form>
           
        </div>
    </div>
</div>
