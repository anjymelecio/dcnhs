<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Semester</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      
<div class="card">
  <div class="card-header bg-primary text-white">
    <span>Create Semester</span>
  </div>
  <div class="card-body">
    @include('partials.message')
    <form action="{{ route('semester.add.post') }}" method="POST">
      @csrf
    <div class="row">
    <div class="col-md-4">
    <label for="semester mt-3">Semester</label>
    <select name="semester" class="form-control mt-3  @error('semester') is-invalid @enderror">
    <option value="1st Semester">1st Semester</option>
    <option value="2nd Semester">2nd Semester</option>
    </select>

    <label for="school_year_id"  class="mt-3">School Year</label>
    <select name="school_year_id"  id="school_year_id" class="form-control  @error('school_year_id') is-invalid @enderror mt-3">
    @foreach ($years as $year )
      <option value="{{ $year->id }}" {{ old('school_year_id') == $year->id ? 'selected' : '' }} value="{{ $year->id }}">{{ $year->start_year }} - {{ $year->end_year }}
        {{$year->school_year_name  }} </option>
    @endforeach
    </select>

    <button type="submit" class="btn btn-primary mt-3">Create</button>
    </div>
    </div>
    </form>
  </div>
</div>


<div class="card mt-5">
  <div class="card-header bg-primary text-white">
    Semester Status
  </div>
  <div class="card-body table-responsive">
   @if ($semesters->count() > 0)

   <table class="table table-bordered">

    <thead>
      <tr>
        <th>Semester</th>
        <th>School Year</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($semesters as $semester )
      <tr>
        <td >{{ $semester->semester }}</td>
        <td>{{ $semester->year_start }} - {{ $semester->year_end }}</td>
        <td> <div class="{{ $semester->status == 'active' ? '' : '' }} bg-gradient  text-center">
                      <p style="font-size: px; ">{{ $semester->status }}</p> 
        </div> </td>
        <td style="width: 200px;">
        
          <div class="d-flex">
            @if ($semester->status == 'active')
            <form action="{{ route('semester.deactive.status', ['id' => $semester->id]) }}" method="POST">
              @csrf
              @method('PUT')
            <button type="submit" class="btn  btn-sm"><i class=" link-success fa-solid fa-toggle-on"></i></button>
          </form>
           
            @else
            <form action="{{ route('semester.active.status', ['id' => $semester->id]) }}" method="POST">
              @csrf
              @method('PUT')
            <button class="btn  btn-sm"><i class=" link-secondary fa-solid fa-toggle-off"></i></button>
          </form>
            @endif

            @if ($semester->status == 'active')
          
             @include('edit.semester')
            
          
            @endif
            
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
     @else 
     <p>No semesters found</p>
   @endif
</div>
  



    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
