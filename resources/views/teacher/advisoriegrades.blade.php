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
                <a class="nav-link" aria-current="true" href="{{ route('teacher.advisory') }}">Student List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('teacher.advisory.grades') }}">Student Grades</a>
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
                    <th>Grades</th>
                    <th>Quarter</th>
                    <th>Subjects</th>
                    <th>Teacher</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{$student->lastname}}, {{$student->firstname}} ({{$student->lrn}})</td> 
                  
                    <td>
                       {{ $student->final_grade }}
                    </td>
                    <td>{{$student->quarter}}</td>
                    <td>{{$student->subjects}}</td>
                    <td>{{ $student->t_firstname}} {{$student->t_lastname}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
       
        @else 
        <p>No students found</p>
        @endif
        
    </div>
</div>

</div>

@include('partials.script')

</body>
</html>
