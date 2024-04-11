<!-- Button trigger modal -->
<a href="#edit{{ $quarter->id }}" class="btn" data-bs-toggle="modal" data-bs-target="#edit{{ $quarter->id }}">
    <i class="fa-solid link-warning fa-pencil"></i>
</a>
   
<!-- Modal -->
<div class="modal fade" id="edit{{ $quarter->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit {{ $student->firstname }} Written Works</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
            
                <form action="{{ route('student.written.update', ['student_id'=>$student->id, 'subject_id'=>$subject->id, 'ws_id' => $quarter->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="quarter" class="form-control mb-3">
                     <option value="1">Quarter 1</option>
                      <option value="2">Quarter 2</option>
                        <option value="3">Quarter 3</option>
                          <option value="4">Quarter 4</option>
                    </select>
                   
                    <div class="row mt-3 gap-3" style="margin-left: 100px; ">
                         <label>Highest possible score</label>
                        <input type="number" name="h1" style="width: 60px;" value="{{ $quarter->h1 }}" class="form-control">
                        <input type="number" name="h2" style="width: 60px;" value="{{ $quarter->h2 }}" class="form-control">
                        <input type="number" name="h3" style="width: 60px;" value="{{ $quarter->h3 }}" class="form-control">
                        <input type="number" name="h4" style="width: 60px;" value="{{ $quarter->h4  }}" class="form-control">
                        <input type="number" name="h5" style="width: 60px;" value="{{ $quarter->h5  }}" class="form-control">
                        <input type="number" name="h6" style="width: 60px;" value="{{ $quarter->h6 }}" class="form-control">
                        <input type="number" name="h7" style="width: 60px;" value="{{ $quarter->h7 }}" class="form-control">
                        <input type="number" name="h8" style="width: 60px;" value="{{ $quarter->h8  }}" class="form-control">
                        <input type="number" name="h9" style="width: 60px;" value="{{ $quarter->h9  }}" class="form-control">
                        <input type="number" name="h10" style="width: 60px;" value="{{ $quarter->h10  }}" class="form-control">
                    </div>
    
                    <div class="row mt-3 gap-3" style="margin-left: 100px; ">
                        <label>Score</label>
                        <input type="number" name="s1" style="width: 60px;" value="{{ $quarter->s1 }}" class="form-control">
                        <input type="number" name="s2" style="width: 60px;" value="{{ $quarter->s2  }}" class="form-control">
                        <input type="number" name="s3" style="width: 60px;" value="{{ $quarter->s3  }}" class="form-control">
                        <input type="number" name="s4" style="width: 60px;" value="{{ $quarter->s4  }}" class="form-control">
                        <input type="number" name="s5" style="width: 60px;" value="{{ $quarter->s5  }}" class="form-control">
                        <input type="number" name="s6" style="width: 60px;" value="{{ $quarter->s6  }}" class="form-control">
                        <input type="number" name="s7" style="width: 60px;" value="{{ $quarter->s7  }}" class="form-control">
                        <input type="number" name="s8" style="width: 60px;" value="{{ $quarter->s8  }}" class="form-control">
                        <input type="number" name="s9" style="width: 60px;" value="{{ $quarter->s9 }}" class="form-control">
                        <input type="number" name="s10" style="width: 60px;" value="{{ $quarter->s10  }}" class="form-control">
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
