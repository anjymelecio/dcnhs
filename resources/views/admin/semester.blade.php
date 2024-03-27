<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semester</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      
<div class="card">
  <div class="card-header">
    <span>Create Semester</span>
  </div>
  <div class="card-body">
    <form>
    <div class="row">
    <div class="col-md-4">
    <label for="semester mt-3">Semester</label>
    <input type="text" name="semester" id="semester" class="form-control mt-3" placeholder="Add Semester">

    <label for="school_year_id"  class="mt-3">School Year</label>
    <select name="school_year_id" id="school_year_id" class="form-control mt-3">
    @foreach ($years as $year )
      <option value="{{ $year->id }}">{{ $year->date_start }} - {{ $year->date_end }}</option>
    @endforeach
    </select>

    <button type="submit" class="btn btn-primary mt-3">Create</button>
    </div>
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
