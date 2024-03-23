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
            <form action="{{ route('subjects.update', ['strand_id' => $strands->id, 'subject_id' => $subject->id]) }}" method="POST">
              
                @csrf
                  @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="subject_name" class="form-control" value="{{ $subject->subject_name }}" placeholder="Add Subject" required>
                        <input type="hidden" name="strand_id" value="{{ $strands->id }}">
                        <select name="semester" class="form-control mt-3">
                            <option value="1st Semester" {{ $subject->semester == '1st Semester' ? 'selected' : '' }}>1st Semester</option>
                            <option value="2nd Semester" {{ $subject->semester == '2nd Semester' ? 'selected' : '' }}>2nd Semester</option>
                        </select>
                        <select name="grade_level" class="form-control mt-3">
                            <option value="11" {{ $subject->grade_level == '11' ? 'selected' : '' }}>11</option>
                            <option value="12" {{ $subject->grade_level  == '12' ? 'selected' : '' }}>12</option>
                        </select>
                        <button class="btn btn-primary mt-4">Update</button>
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
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ElevenFirstSemesters as $subject)
                        <tr>
                            <td>{{ $subject->subject_name }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('subjects.edit', ['strand_id'=> $strands->id , 'subject_id' => $subject->id]) }}" class="btn btn-warning btn-sm">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                                </div>
                            </td>
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
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ElevenSecondSemester as $subject)
                        <tr>
                            <td>{{ $subject->subject_name }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                <a href="" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                                </div>
                            </td>
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
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($TwelveFirstSemester as $subject)
                        <tr>
                            <td>{{ $subject->subject_name }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                <a href="" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                                </div>
                            </td>
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
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($TwelveSecondSemester as $subject)
                        <tr>
                            <td>{{ $subject->subject_name }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                <a href="" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                                </div>
                            </td>
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
