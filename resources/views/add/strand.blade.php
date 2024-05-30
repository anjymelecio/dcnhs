<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fa-solid fa-plus"></i> Add Strand
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Strand</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           

             
            
                <form action="{{route('strand.post')}}" method="POST">
                          @csrf
                          
                            <label for="strand" class="col-form-label">Strand Name*</label>
                            <input type="text" class="form-control mb-3  {{ $errors->has('strands') ? 'is-invalid' : '' }}" name="strands" required>
                            @if ($errors->has('strands'))
                                <div class="invalid-feedback">{{ $errors->first('strands') }}</div>
                            @endif
                 
                    
                      
                            <label for="description" class="col-form-label">Description*</label>
                            <input type="text" id="description" class="form-control  {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" required>
                            @if ($errors->has('description'))
                                <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                            @endif
                   
                      
                    
                     
            
            
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>

           </form>
        </div>
      </div>
    </div>
  </div>