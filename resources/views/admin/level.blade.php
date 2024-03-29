<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Level</title>
    @include('partials.css')
</head>
<body>

@include('partials.navbar')

<div class="wrapper">

@include('partials.maincontent')

<div class="card">
    <div class="card-header bg-primary text-white">
        <span>Create Grade level</span>
    </div>
    <div class="card-body">
        @include('partials.message')
        <form action="{{ route('grade.level.post') }}" class="mt-3" method="POST">
            @csrf
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 mt-5">
                    <label for="level">Grade level*</label>
                    <input type="text" class="form-control mt-3 @error('level') is-invalid @enderror" id="level" name="level" placeholder="Add Grade Level" value="{{ old('level') }}">
                    @error('level')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <button class="btn btn-primary mt-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card mt-5">
    <div class="card-header bg-primary text-white">
        <span>Active Grade Level List</span>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($levels as $level)
                <tr>
                    <td>Grade {{ $level->level }}</td>
                    <td style="width: 200px;"> <div class="d-flex">
                        @include('edit.level') 
                        <form action="{{ route('grade.level.delete', ['id'=>$level->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                    <button class="btn" type="submit">
                        <i class="fa-solid link-danger fa-trash"></i>
                    </button>
                </form>
            </div> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</div>

@include('partials.script')

</body>
</html>
