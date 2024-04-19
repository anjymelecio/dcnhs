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
      
<div class="card">
    <div class="card-header bg-primary text-white">
        Create section
    </div>
    <div class="card-body">

    @include('partials.message')
      
        <form action="{{route('section.post.create')}}" method="POST">
        @csrf
            <div class="row">
                <div class="col-md-4">
                    <label for="section">Section</label>
                    <input type="text" name="section_name" id="section" class="form-control @error('section_name') is-invalid @enderror" required>
                    @error('section_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="strand_id">Strands</label>
                    <select name="strand_id" id="strand_id" class="form-control @error('strand_id') is-invalid @enderror" required>
                        @foreach ($strands as $strand)
                            <option value="{{ $strand->id }}">{{ $strand->strands }}</option>
                        @endforeach
                    </select>
                    @error('strand_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
    <label for="teacher_id">Adviser</label>
    <select name="teacher_id" id="teacher_id" class="form-control @error('teacher_id') is-invalid @enderror" required>
     
        @foreach ($teachers as $teacher)
            <option value="{{ $teacher->id }}">{{ $teacher->firstname }} {{ $teacher->lastname }} ({{ $teacher->teacher_id }})</option>
        @endforeach
    </select>
    @error('teacher_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="row mt-3">
<div class="col-md-4">
    <label for="grade_level_id">Grade Level</label>
    <select name="grade_level_id" id="grade_level_id" class="form-control @error('grade_level_id') is-invalid @enderror" required>
     
        @foreach ($gradeLevel as $level)
            <option value="{{ $level->id }}">{{ $level->level}}</option>
        @endforeach
    </select>
    @error('teacher_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>




</div>

                
                
            </div>

            


            <button type="submit" class="btn btn-primary mt-3">
                Create
                </button>
            


        </form>
    </div>



   





    
    </div>


    <div class="card mt-5">
        <div class="card-header bg-primary text-white">
            Section List
        </div>
        <div class="card-body table-responsive">

            <table class="table bordered">

                <thead>
                    <tr>
                        <th>Sections</th>
                        <th>Strand</th>
                        <th>Grade Level</th>
                        <th>Adviser</th>
                        <th>School Year</th>
                         <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($sections as $section )

                <tr>

                <td>{{$section->section}}</td>
                <td>{{$section->strand}}</td>
                <td>{{$section->level}}</td>
                <td>{{$section->firstname}} {{ $teacher->lastname }}
                   ( {{$section->teacher_id}})
                </td>
               
                <td>
                    
                    <div class="d-flex">
                     <a href="{{ route('section.student.index', ['strand_id'=> $section->strand_id, 'grade_level_id'=> $section->grade_level_id, 'section_id' => $section->id]) }}" class="btn link-primary" ><i class="link-primary fa-solid fa-user-plus"></i> Add students</a>
                    @include('edit.section')
                    <form action="{{ route('section.post.delete', ['id'=> $section->id]) }}" method="POST">
            @csrf
            @method('DELETE')
         <button class="btn">
         <i class="link-danger fa-solid fa-trash"></i>
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
