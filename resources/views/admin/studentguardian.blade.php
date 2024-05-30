<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add student</title>
    @include('partials.css')
</head>
<body>

@include('partials.navbar')

<div class="wrapper">
    @include('partials.maincontent')

    <div class="card">
        <div class="card-header bg-primary text-white">
            Add student {{ $guardian->firstname }} {{ $guardian->lastname }}
          
          

        </div>
        <div class="card-body">
            <a href="{{ route('student.guardian.list', ['id' => $guardian->id]) }}" class="btn btn-sm btn-warning mt-4">
                <i class="fa-regular fa-eye"></i>  View students {{ $guardian->firstname }} {{ $guardian->lastname }}
            </a>
              <form class="mb-5 " action="{{ route('student.guardian.index', ['id' => $guardian->id]) }}" method="get">
            <input class="mt-4 form-control" name="lrn" type="number" placeholder="search student by lrn" style="width: 200px">
            <button class="btn btn-success btn-sm mt-3"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
            </form>
          
            @include('partials.message')

<form action="{{ route('student.guardian.create', ['id' => $guardian->id]) }}" method="POST">

                @csrf
                <div class="row">
                  @if($students->count() > 0)


                    @foreach ($students as $student)
                    <div class="col-md-4">
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input"
                                   id="student_{{ $student->id }}" name="student_id[]" value="{{ $student->id }}"
                                       {{ in_array($student->id, $guardianStuds->pluck('student_id')->toArray()) ? 'disabled' : '' }}>
                            <label class="form-check-label" for="student_{{ $student->id }}">
                                {{ $student->lastname }}, {{ $student->firstname }} {{ $student->middle_initial }} ({{ $student->lrn }})
                            </label>
                        </div>
                    </div>
                    @endforeach
                    @else

                    <p>No student found</p>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
           
        </div>
    </div>

    <div class="card mt-5">
 
  

    @include('partials.script')

</body>
</html>
