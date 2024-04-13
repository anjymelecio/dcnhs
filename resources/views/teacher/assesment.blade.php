<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $student->lrn }} Written Works</title>
    @include('partials.css')
</head>
<body>

@include('teacherpartials.navbar')

<div class="wrapper">
    @include('partials.maincontent')

    <div class="card">
        <div class="card-header bg-primary text-white">
            {{ $subject->subjects }} (Assessment {{ $subject->assessment }}%) 
        </div>
        <div class="card-body">

            @include('partials.message')
            <form action="{{ route('student.assessment.post', ['student_id'=>$student->id, 'subject_id'=>$subject->id]) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <select name="quarter" class="form-control mb-3">
                            <option value="1" {{ old('quarter') == 1 ? 'selected': '' }}>Quarter 1</option>
                            <option value="2" {{ old('quarter') == 2 ? 'selected': '' }}>Quarter 2</option>
                            <option value="3" {{ old('quarter') == 3 ? 'selected': '' }}>Quarter 3</option>
                            <option value="4" {{ old('quarter') == 4 ? 'selected': '' }}>Quarter 4</option>
                        </select>
                        <label for="h_score">Highest Possible Score</label>
            <input type="number" id="h_score" name="h_score" value="{{ old('h_score') }}" class="form-control mb-3">

            <label for="score">Score</label>
            <input type="number" id="score" name="score" value="{{ old('score') }}" class="form-control">
                    </div>
                </div>
                <button class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>


    <div class="card mt-5">
        <div class="card-header bg-primary text-white">
            {{ $subject->subjects }} (Assessment Score ) 
        </div>
        <div class="card-body">

            <table class="table bordered">
               @if ($quarters->count() > 0)
               <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Quarter</th>
                        <th>Score</th>
                        <th>Ps</th>
                        <th>Ws</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                
                    @foreach($quarters as $quarter)
                        <tr>
                            <td>Quarter {{ $quarter->quarter }}</td>
                            <td>{{ $quarter->total_score }} / {{ $quarter->highest_score }}</td> 
                            <td>{{ $quarter->ps }}</td>
                            <td>{{ $quarter->ws }}</td>
                            <td>
                                @include('edit.assesments')
                            </td>
                            <td>
                                <form action="{{ route('assesment.delete', ['id' =>$quarter->id]) }}" method="POST">

                                    @csrf
                                    @method('DELETE')
                                <button class="btn"><i class="link-danger fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </table>

        @else
        <p>No assesments found</p>
                   
               @endif
          
        </div>
    </div>

    @include('partials.script')
</body>
</html>
