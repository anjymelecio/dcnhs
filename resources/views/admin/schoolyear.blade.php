<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Year</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      
   
<div class="card">
    <div class="card-header">
      <span>Create School Year</span>
    </div>
    <div class="card-body">
        @include('partials.message')
      <form action="{{ route('school.year.post') }}" method="POST">
        @csrf
        <div class="row">

        <div class="col-md-4">
            <label for="year_start">School Date Start</label>
        <input type="date" id="year_start"class="form-control mt-3 @error('date_start') is-invalid @enderror" name="date_start">
        <label for="year_end" class="mt-3">School Date End</label>
        <input type="date" id="year_end"  class="form-control mt-3 @error('date_end') is-invalid @enderror" value="{{ old('date_end') }}" name="date_end">
          

          <label for="year_start" class="mt-3">School Year Name</label>
          <input type="text" id="school_year_name" name="school_year_name" placeholder="School Year name" class="form-control mt-3 @error('school_year_name') is-invalid @enderror" value="{{ old('school_year_name') }}" required>

        <button class="btn btn-primary mt-3">Create</button>
        </div>
        </div>
      </form>
  </div>



    
    </div>


    <div class="card mt-5">
        <div class="card-header">
          <span>School Year List</span>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
                <tr>
            <th>School Year Name</th>
            <th>Date Start</th>
            <th> Date End</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ( $schoolYears as $schoolYear )
            @include('edit.schoolyear')
                <tr>
                <td>{{$schoolYear->school_year_name}}</td>
                <td>{{ $schoolYear->date_start }}</td>
                <td>{{$schoolYear->date_end}}</td>
                <td><div class="d-flex gap-3">
                    <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $schoolYear->id }}">
                <i class="fa-solid fa-pencil"></i>
                </a>
                <form action="{{ route('school.year.delete', ['id' => $schoolYear->id]) }}" method="POST">

                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn btn-danger btn-small btn-sm">
                <i class="fa-solid fa-trash"></i>
                </button>
                </form>
                </div></td>
                </tr>
            @endforeach
        </tbody>
          </table>
       


        </div>
      </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
