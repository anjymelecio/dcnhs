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
            <a href="{{ route('student.grades.compute', ['student_id'=> $student->id, 'subject_id' => $subject->id]) }}" class="btn btn-primary btn-sm mb-3">Back</a>
            <form action="{{ route('student.assessment.post', ['student_id'=>$student->id, 'subject_id'=>$subject->id]) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <select name="quarter" id="quarter" class="form-control mb-3">
                            <option value="1" {{ old('quarter') == 1 ? 'selected': '' }}>Quarter 1</option>
                            <option value="2" {{ old('quarter') == 2 ? 'selected': '' }}>Quarter 2</option>
                            <option value="3" {{ old('quarter') == 3 ? 'selected': '' }}>Quarter 3</option>
                            <option value="4" {{ old('quarter') == 4 ? 'selected': '' }}>Quarter 4</option>
                        </select>
                        <label for="h_score">Highest Possible Score</label>a
                        <input type="number" id="h_score" name="h_score" value="{{ $grades->h_score ?? '' }}" class="form-control mb-3"> <!-- Changed from $grades->h_score -->
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
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Quarter</th>
                        <th>Total Score</th> 
                        <th>Highest Score</th>
                        <th>Percentage Score</th> 
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quarters as $quarter)
                        <tr>
                            <td>Quarter {{ $quarter->quarter }}</td>
                            <td>{{ $quarter->total_score }}</td> 
                            <td>{{ $quarter->highest_score }}</td> 
                            <td>{{ $quarter->ps }}</td>
                            <td>
                                <div class="d-flex">
                                    @include('edit.assesments') 
                                    <form action="{{ route('assesment.delete', ['id' => $quarter->id]) }}" method="POST"> 
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm mt-2">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('partials.script')
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    
$(document).ready(function() {
    $('#quarter').change(function() {
        var quarter = $(this).val();
        if (quarter != '') {
            $.ajax({
                url: "{{ route('student.assessment', ['student_id' => $student->id, 'subject_id' => $subject->id]) }}",
                type: "GET",
                data: { quarter: quarter },
                success: function(response) {
                    $('#h_score').val(response.h_score || ''); 
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });

   
    $('#quarter').change();
});

</script>
