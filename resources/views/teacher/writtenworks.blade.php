<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $student->lrn }} Written Works </title>
    @include('partials.css')
</head>
<body>

@include('teacherpartials.navbar')

<div class="wrapper">
    @include('partials.maincontent')

    <div class="card">
        <div class="card-header bg-primary text-white">
            {{ $subject->subjects }} (Written Works {{ $subject->written_works }} %) 
        </div>
        <div class="card-body">

        @include('partials.message')
            <form action="{{ route('student.written.post', ['student_id'=>$student->id, 'subject_id'=>$subject->id]) }}" method="POST">
                @csrf
                <select name="quarter" class="form-control mb-3">
                 <option value="1">Quarter 1</option>
                  <option value="2">Quarter 2</option>
                    <option value="3">Quarter 3</option>
                      <option value="4">Quarter 4</option>
                </select>
                <label>Highest possible score</label>
                <div class="row mt-3 gap-3">
                    <input type="number" name="h1" style="width: 60px;" value="{{ old('h1') }}" class="form-control">
                    <input type="number" name="h2" style="width: 60px;" value="{{ old('h2') }}" class="form-control">
                    <input type="number" name="h3" style="width: 60px;" value="{{ old('h3') }}" class="form-control">
                    <input type="number" name="h4" style="width: 60px;" value="{{ old('h4') }}" class="form-control">
                    <input type="number" name="h5" style="width: 60px;" value="{{ old('h5') }}" class="form-control">
                    <input type="number" name="h6" style="width: 60px;" value="{{ old('h6') }}" class="form-control">
                    <input type="number" name="h7" style="width: 60px;" value="{{ old('h7') }}" class="form-control">
                    <input type="number" name="h8" style="width: 60px;" value="{{ old('h8') }}" class="form-control">
                    <input type="number" name="h9" style="width: 60px;" value="{{ old('h9') }}" class="form-control">
                    <input type="number" name="h10" style="width: 60px;" value="{{ old('h10') }}" class="form-control">
                </div>

                <div class="row mt-3 gap-3">
                    <label>Score</label>
                    <input type="number" name="s1" style="width: 60px;" value="{{ old('s1') }}" class="form-control">
                    <input type="number" name="s2" style="width: 60px;" value="{{ old('s2') }}" class="form-control">
                    <input type="number" name="s3" style="width: 60px;" value="{{ old('s3') }}" class="form-control">
                    <input type="number" name="s4" style="width: 60px;" value="{{ old('s4') }}" class="form-control">
                    <input type="number" name="s5" style="width: 60px;" value="{{ old('s5') }}" class="form-control">
                    <input type="number" name="s6" style="width: 60px;" value="{{ old('s6') }}" class="form-control">
                    <input type="number" name="s7" style="width: 60px;" value="{{ old('s7') }}" class="form-control">
                    <input type="number" name="s8" style="width: 60px;" value="{{ old('s8') }}" class="form-control">
                    <input type="number" name="s9" style="width: 60px;" value="{{ old('s9') }}" class="form-control">
                    <input type="number" name="s10" style="width: 60px;" value="{{ old('s10') }}" class="form-control">
                </div>
                <button class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
@include('partials.script')
</body>
</html>
