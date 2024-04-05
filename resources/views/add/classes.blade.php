<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes</title>
    @include('partials.css')
</head>
<body>

@include('partials.navbar')

<div class="wrapper">
    @include('partials.maincontent')

    @include('partials.message')

    <div class="card">
        <div class="card-header bg-primary text-white">
            Create class
        </div>
        <div class="card-body">
          
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="mySelect">Select Strand *</label>
                        <select id="mySelect" onchange="window.location.href = this.value;" class="form-control @error('strand_id') is-invalid @enderror">
                            @foreach ($strands as $strand)
                                <option value="{{ route('classes.create', ['id' => $strand->id])}}" 
                                    {{ Request::url() == route('classes.create', ['id' => $strand->id]) ? 'selected' : '' }}>
                                    {{ $strand->strands }}
                                </option>
                            @endforeach
                        </select>
                        @error('strand_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                      <form action="{{ route('classes.create.post', ['id'=> $strand->id]) }}" method="POST">
                        @csrf
                      <div class="row">

                    <div class="col-md-4">
                        <label for="subject_id">Select Subject *</label>
                        <select id="subject_id" name="subject_id" class="form-control @error('subject_id') is-invalid @enderror">
                            @if ($subjects->count() > 0)
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->subjects }}</option>
                                @endforeach
                            @else
                                <option>No subject found</option>
                            @endif
                        </select>
                        @error('subject_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="teacher_id">Select Teacher *</label>
                        <select id="teacher_id" name="teacher_id" class="form-control @error('teacher_id') is-invalid @enderror">
                            @if ($teachers->count() > 0)
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{$teacher->lastname}}, {{ $teacher->firstname}}</option>
                                @endforeach
                            @else
                                <option>No teacher found</option>
                            @endif
                        </select>
                        @error('teacher_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="grade_level_id">Select Grade Level *</label>
                        <select id="grade_level_id" name="grade_level_id" class="form-control @error('grade_level_id') is-invalid @enderror">
                            @if ($gradeLevels->count() > 0)
                                @foreach ($gradeLevels as $gradeLevel)
                                    <option value="{{ $gradeLevel->id }}">Grade {{ $gradeLevel->level }}</option>
                                @endforeach
                            @else
                                <option>No grade levels found</option>
                            @endif
                        </select>
                        @error('grade_level_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="section_id">Select Section *</label>
                        <select id="section_id" name="section_id" class="form-control @error('section_id') is-invalid @enderror">
                            @if ($sections->count() > 0)
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                @endforeach
                            @else
                                <option>No section found</option>
                            @endif
                        </select>
                        @error('section_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="semester_id">Select Semester *</label>
                        <select id="semester_id" name="semester_id" class="form-control @error('semester_id') is-invalid @enderror">
                            @if ($semesters->count() > 0)
                                @foreach ($semesters as $semester)
                                    <option value="{{ $semester->id }}">{{ $semester->semester }} ({{$semester->start_year}} -{{$semester->end_year}})</option>
                                @endforeach
                            @else
                                <option>No semester found</option>
                            @endif
                        </select>
                        @error('semester_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="day">Select Day *</label>
                        <select name="day" id="day" class="form-control @error('day') is-invalid @enderror">
                            @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] as $day)
                                <option value="{{ $day }}">{{ $day }}</option>
                            @endforeach
                        </select>
                        @error('day')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="time_start">Time start *</label>
                        <input type="time" class="form-control @error('time_start') is-invalid @enderror" id="time_start" name="time_start" required>
                        @error('time_start')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-4">
                        <label for="time_end">Time end *</label>
                        <input type="time" class="form-control @error('time_end') is-invalid @enderror" id="time_end" name="time_end" required>
                        @error('time_end')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror 
                    </div>
                </div>

                <button class="btn btn-primary mt-3">Create</button>
            </form>
        </div>
    </div>
</div>

@include('partials.script')

</body>
</html>
