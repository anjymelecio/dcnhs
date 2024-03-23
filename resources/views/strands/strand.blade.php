<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $strands->strands }} ({{ $strands->description }})</title>
    @include('partials.css')
</head>
<body>

@include('partials.navbar')

<div class="wrapper">
    @include('partials.maincontent')

    <div class="card">
        <div class="card-header">
            <span>{{ $strands->strands }} ({{ $strands->description }})</span>
        </div>
        <div class="card-body">
            @include('partials.message')
            <form action="{{ route('add.subject.post', $strands->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="subject_name" class="form-control" placeholder="Add Subject" required>
                        <input type="hidden" name="strand_id" value="{{ $strands->id }}">
                        <select name="semester" class="form-control mt-3">
                            <option value="1st Semester" {{ old('semester') == '1st Semester' ? 'selected' : '' }}>1st Semester</option>
                            <option value="2nd Semester" {{ old('semester') == '2nd Semester' ? 'selected' : '' }}>2nd Semester</option>
                        </select>
                        <select name="grade_level" class="form-control mt-3">
                            <option value="11" {{ old('grade_level') == '11' ? 'selected' : '' }}>11</option>
                            <option value="12" {{ old('grade_level') == '12' ? 'selected' : '' }}>12</option>
                        </select>
                        <button class="btn btn-primary mt-4">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

  <!-- 11 1st semester--> 
    <div class="card mt-5">
        <div class="card-header">
            <span>Grade 11 1st Semester</span>
        </div>
        <div class="card-body">
            @if ($ElevenFirstSemesters->count() > 0)
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Subjects</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ElevenFirstSemesters as $subject)
                        <tr>
                            <td>{{ $subject->subject_name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>No Subjects found</p>
            @endif
        </div>
    </div>



    <div class="card mt-5">
        <div class="card-header">
            <span>Grade 11 2nd Semester</span>
        </div>
        <div class="card-body">
            @if ($ElevenSecondSemester->count() > 0)
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Subjects</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ElevenSecondSemester as $subject)
                        <tr>
                            <td>{{ $subject->subject_name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>No Subjects found</p>
            @endif
        </div>
    </div>



     <div class="card mt-5">
        <div class="card-header">
            <span>Grade 12 1st Semester</span>
        </div>
        <div class="card-body">
            @if ($TwelveFirstSemester->count() > 0)
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Subjects</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($TwelveFirstSemester as $subject)
                        <tr>
                            <td>{{ $subject->subject_name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>No Subjects found</p>
            @endif
        </div>
    </div>


     <div class="card mt-5">
        <div class="card-header">
            <span>Grade 12 2nd Semester</span>
        </div>
        <div class="card-body">
            @if ($TwelveSecondSemester->count() > 0)
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Subjects</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($TwelveSecondSemester as $subject)
                        <tr>
                            <td>{{ $subject->subject_name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>No Subjects found</p>
            @endif
        </div>
    </div>





</div>

@include('partials.script')

</body>
</html>
