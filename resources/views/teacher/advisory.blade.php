<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students section</title>
    @include('partials.css')
</head>
<body>

@include('teacherpartials.navbar')

<div class="wrapper">

@include('partials.maincontent')
      
<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="true" href="{{ route('teacher.advisory') }}">Student List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('teacher.advisory.grades') }}">Student Grades</a>
            </li>
            
        </ul>
    </div>
    <div class="card-body table-responsive">

        @include('partials.message')
        
        @if ($students->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Students</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{$student->lastname}}, {{$student->firstname}} ({{$student->lrn}})</td> 
                  
                    <td>
                        <form action="{{ route('student.promote', ['id' => $student->id, 'section_id' => $student->section_id]) }}" method="POST">
                            @csrf 
                            {{-- Use the hidden input field to override method --}}
                            <input type="hidden" name="_method" value="PUT">
                            <button type="submit" class="btn btn-primary btn-sm">Promote</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        {{-- Use the same method but different route --}}
        <form action="{{route('students.promote.all')}}" method="POST">
            @csrf
            {{-- Use the hidden input field to override method --}}
            <input type="hidden" name="_method" value="PUT">
            <button type="submit" class="btn btn-primary btn-sm mt-3">Promote all students</button>
        </form>

        @else 
        <p>No students found</p>
        @endif
        
    </div>
</div>

</div>

@include('partials.script')

</body>
</html>
