<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $strand->strands }}</title>
    @include('partials.css')
</head>
<body>

@include('partials.navbar')

<div class="wrapper">
    @include('partials.maincontent')

    <div class="card">
        <div class="card-header bg-primary text-white">
            <span>Add subject to {{ $strand->strands }} </span>
        </div>
        <div class="card-body">
            @include('partials.message')
            <form action="{{ route('subject.create') }}" method="POST">
                @csrf
                <div class="row">
                    <input name="strand_id" type="hidden" value="{{ $strand->id }}">
                    <div class="col-xs-4 col-sm-4 col-md-4 mt-5">
                        <label for="subjects">Subject*</label>
                        <input type="text" class="form-control mt-3 @error('subjects') is-invalid @enderror" id="subjects" name="subjects" placeholder="Add Subject" value="{{ old('subjects') }}">
                        @error('subjects')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4 mt-5">
                        <label for="grade_level_id">Grade Level*</label>
                        <select name="grade_level_id" id="grade_level_id" class="form-control mt-3 @error('grade_level_id') is-invalid @enderror">
                            @foreach ($gradeLevels as $level)
                                <option value="{{ $level->id }}" {{ old('grade_level_id') == $level->id ? 'selected' : '' }}>{{ $level->level }}</option>
                            @endforeach
                        </select>
                        @error('grade_level_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4 mt-5">
                        <label for="semester_id">Semester*</label>
                        <select name="semester_id" id="semester_id" class="form-control mt-3 @error('semester_id') is-invalid @enderror">
                            @foreach ($semesters as $semester)
                                <option value="{{ $semester->id }}" {{ old('semester_id') == $semester->id ? 'selected' : '' }}>{{ $semester->semester }}</option>
                            @endforeach
                        </select>
                        @error('semester_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>

    @foreach ($gradeLevels as $level)
        @foreach ($semesters as $semester)
            <div class="card mt-5">
                <div class="card-header bg-primary text-white">
                    <span>Subject list for grade {{ $level->level }} {{ $semester->semester }}</span>
                </div>
                <div class="card-body table-responsive">
                    @php $subjectsFound = false; @endphp
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Subject Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subjects as $subject)
                                @if ($subject->grade_level_id == $level->id && $subject->semester == $semester->semester)
                                    @php $subjectsFound = true; @endphp
                                    <tr>
                                        <td>{{ $subject->subject }}</td>
                                        <td>
                                        <div class="d-flex">
                                        @include('edit.subject')

                                        <form action="{{route('subject.delete', ['id' => $subject->id])}}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn"><i class="link-danger fa-solid fa-trash"></i></button>
                                        </form>
                                        
                                        </div></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    @if (!$subjectsFound)
                        <p>No subjects found for this grade level and semester.</p>
                    @endif
                </div>
            </div>
        @endforeach
    @endforeach
</div>

@include('partials.script')

</body>
</html>
