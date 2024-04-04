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

        <div class="card-body">
           
            <form action="{{ route('classes.post') }}" method="POST">
                @csrf
                <div class="row">
                    <label for="strand_id">Select Strand</label>
                    <div class="col-md-4">
                        <select name="strand_id" id="strand_id" class="form-control @error('strand_id') is-invalid @enderror">
                            @foreach ($strands as $strand)
                            <option value="{{ $strand->id }}">{{ $strand->strands }}</option>
                            @endforeach
                        </select>
                        @error('strand_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <button class="btn btn-primary mt-3">Select</button>
                    </div>
                </div>
            </form>
        </div>



      <div class="card mt-5">
    <div class="card-header bg-primary text-white">
        <span>Create Class</span>
    </div>
    <div class="card-body">
        <form action="">
            <div class="row">
                <div class="col-md-4">
                    <label for="strand_sub_id">Subjects</label>
                    <select name="strand_sub_id" id="strand_sub_id" class="form-control mt-3 @error('strand_sub_id') is-invalid @enderror">
                        @if ($strandSub->count() > 0)
                        @foreach ($strandSub as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                        @endforeach
                        @else
                        <option>No subject found</option>
                        @endif
                    </select>
                    @error('strand_sub_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="strand_sub_id">Section</label>
                    <select name="strand_sub_id" id="strand_sub_id" class="form-control mt-3 @error('section_id') is-invalid @enderror">
                        @if ($sections->count() > 0)
                        @foreach ($sections as $data)
                        <option value="{{ $data->id }}">{{ $data->section }}</option>
                        @endforeach
                        @else
                        <option>No section found</option>
                        @endif
                    </select>
                    @error('section_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="teacher_id">Teacher</label>
                    <select name="teacher_id" id="teacher_id" class="form-control mt-3 @error('teacher_id') is-invalid @enderror">
                        @if ($teachers->count() > 0)
                        @foreach ($teachers as $data)
                        <option value="{{ $data->id }}">{{ $data->firstname }}</option>
                        @endforeach
                        @else
                        <option>No section found</option>
                        @endif
                    </select>
                    @error('teacher_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="semester_id">Select Semester</label>
                        <select name="semester_id" id="semester_id" class="form-control mt-3 @error('semester_id') is-invalid @enderror">
                            @foreach ($semesters as $semester)
                            <option value="{{ $semester->id }}">{{ $semester->semester }}</option>
                            @endforeach
                        </select>
                        @error('semester_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                     <div class="col-md-4">
                        <label for="semester_id">Select Semester</label>
                        <select name="semester_id" id="semester_id" class="form-control mt-3 @error('semester_id') is-invalid @enderror">
                            @foreach ($semesters as $semester)
                            <option value="{{ $semester->id }}">{{ $semester->semester }}</option>
                            @endforeach
                        </select>
                        @error('semester_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                
                
                
                </div>
            </div>
        </form>
    </div>
</div>
    </div>

    @include('partials.script')
</body>
</html>
