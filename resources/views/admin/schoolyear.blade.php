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
      
   



    <div class="card mt-5">
        <div class="card-header bg-primary text-white">
          <span>School Year List</span>
        </div>
        <div class="card-body">
          @include('add.year')
          @include('partials.message')
          <div class="table-responsive">
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
                <td>
                 
                  
                  <div class="d-flex gap-3">
                  @if($schoolYear->status == 1)
               
                  
                   <form action="{{ route('school.year.active', ['id'=>$schoolYear->id]) }}" method="POST">
                        @csrf
                    @method('PUT')
                  <button class="btn btn-secondary btn-sm">Inactive</button>
                  </form>

                  @else

                  <form >
                  
                    <button type="submit" class="btn btn-success btn-sm">Active</i></button>
                </form>
                


                  @endif
                    <a href="#" class="btn link-warning  btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $schoolYear->id }}">
                  <button class="btn btn-warning btn-sm">Edit</button>
                </a>
              
                </div></td>
                </tr>
            @endforeach
        </tbody>
          </table>
          </div>
       


        </div>
      </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
