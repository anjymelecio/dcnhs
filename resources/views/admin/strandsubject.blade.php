<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $strand->strands }}</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      
     
<div class="card mt-5">
  <div class="card-header bg-primary text-white">
    <span>Add subject to {{$strand->strands}}</span>
  </div>
  <div class="card-body">

    @include('partials.message')


    <form action="{{ route('strand.subject.post', ['id' => $strand->id]) }}" method="POST">

  @csrf

  <div class="row">
   @foreach ($subjects as $subject)
   <div class="col-md-3">
    <div class="form-check mb-4 border border-dark mt-5">
      <input class="form-check-input @error('subject_id.' . $loop->index) is-invalid @enderror" type="checkbox" name="subject_id[]"
      {{ in_array($subject->id, old('subject_id', [])) ? 'checked' : '' }}
      id="subject_{{ $subject->id }}" value="{{ $subject->id }}">
      <label class="form-check-label" for="subject_{{ $subject->id }}">{{ $subject->subject_name }}</label>
      @error('subject_id.' . $loop->index)
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>
  </div>



      @endforeach
  
  </div>
  <div class="row mt-5">
    <div class="col-md-4">
     


      <input type="hidden" value="{{$strand->id}}" name="strand_id">

      <label for="grade_level_id" class="mt-3">Grade level:</label>
<select name="grade_level_id" id="grade_level_id" class="form-control mt-3 @error('grade_level_id') is-invalid @enderror">
  
    @foreach ($gradeLevel as $level)
        <option value="{{ $level->id }}" {{ old('grade_level_id') == $level->id ? 'selected' : '' }}>Grade {{ $level->level }}</option>
    @endforeach
</select>
@error('grade_level_id')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror


     <label for="semester" class="mt-3">Semester:</label>
<select name="semester" id="semester" class="form-control mt-3 @error('semester') is-invalid @enderror">
    
    <option value="1st Semester" {{ old('semester') == '1st Semester' ? 'selected' : '' }}>1st Semester</option>
    <option value="2nd Semester" {{ old('semester') == '2nd Semester' ? 'selected' : '' }}>2nd Semester</option>
</select>
@error('semester')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror


      <button type="submit" class="btn btn-primary mt-3">Submit</button>
   
  </div>
</form>


   
  </div>
</div>










    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
