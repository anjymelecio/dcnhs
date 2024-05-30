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



<div class="card mt-5">
    <div class="card-header bg-primary text-white">
        <span>Active Grade Level List</span>
    </div>
    <div class="card-body">
        @include('add.level')
        @include('partials.message')
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
                    <button class="btn btn-danger btn-sm mt-2" type="submit">
                       Delete
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
