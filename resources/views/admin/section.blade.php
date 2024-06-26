<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create section</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      


    <div class="card mt-5">
        <div class="card-header bg-primary text-white">
            Section List
        </div>
        <div class="card-body">
            @include('add.section')
            @include('partials.message')

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>Sections</th>
                        <th>Strand</th>
                        <th>Grade Level</th>
                        <th>Adviser</th>
                         <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($sections as $section )

                <tr>

                <td>{{$section->section}}</td>
                <td>{{$section->strand}}</td>
                <td>{{$section->level}}</td>
                <td>{{$section->firstname}} {{ $section->lastname }}
                   ( {{$section->teacher_id}})
                </td>
               
                <td>
                    
                    <div class="d-flex">
                    <a href="{{ route('section.student.index', ['strand_id'=> $section->strand_id, 'grade_level_id'=> $section->grade_level_id, 'section_id' => $section->id]) }}" class=" d-flex justify-content-center align-items-center">
    <button class="btn btn-primary btn-sm">Students</button
</a>

                    @include('edit.section')
                    <form action="{{ route('section.post.delete', ['id'=> $section->id]) }}" method="POST" class="mt-2">
            @csrf
            @method('DELETE')
         <button class="btn btn-danger btn-sm">
         Delete
         </button>
         </form>
        
         </div>

       
                </td>

                </tr>
                    
                @endforeach
                </tbody>
            </table>
    
        </div>
    
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
