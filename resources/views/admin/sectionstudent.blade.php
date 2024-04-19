<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $strand->strands }} {{ $level->level }}</title>
    @include('partials.css')
</head>
<body>

@include('partials.navbar')

<div class="wrapper">
    @include('partials.maincontent')

    <div class="card">
        <div class="card-header bg-primary text-white">
            Students enrolled in {{ $strand->strands }} {{ $level->level }}
        </div>
        <div class="card-body">
          @include('partials.message');
            <form action="{{ route('section.student.add', ['section_id' => $section->id]) }}" method="post">
                @csrf

                <ul>
                    @foreach ($students as $student)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="student_{{ $student->id }}" name="student_id[]" value="{{ $student->id }}"
                              {{in_array($student->id,  $pluckSection->pluck('student_id')->toArray()) ? 'disabled' : ''}}>
                           
                            <label class="form-check-label" for="student_{{ $student->id }}">
                                {{ $student->lastname }}, {{ $student->firstname }} {{ $student->middlename }} ({{ $student->lrn }})
                            </label>
                        </div>
                    @endforeach

                  
                </ul>

                <button type="submit" class="btn btn-primary mt-3">Add to <span class="text-lowercase">{{ $section->section_name }}</span> section</button>
            </form>
        </div>
    </div>


     <div class="card mt-5">
        <div class="card-header bg-primary text-white">
          Student list of {{ $section->section_name }} {{ $section->id }} section
        </div>
        <div class="card-body">

          @if($sectionStud->count() > 0)

          <table class="table table-bordered">
          <thead>
          <tr>
          <th>Students</th>
          <th>Action</th>
          </tr>
          </thead>
          
          </table>

        

          @else

          <p>No student found</p>


          @endif



    
           
        </div>
    </div>
</div>

@include('partials.script')

</body>
</html>
