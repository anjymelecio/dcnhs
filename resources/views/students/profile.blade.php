<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    @include('partials.css')
</head>
<body>

@include('studentpartials.navbar')

<div class="wrapper">
    @include('partials.maincontent')

    <div class="card">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('student.profile') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('student.password')}}">Change Password</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            @include('partials.message')
            <h5 class="fw-bold">Personal Information</h5>
            <form action="{{ route('student.change.profile') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 mt-3">
                        <label for="lastname">Lastname*</label>
                        <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" placeholder="Lastname" value="{{ $student->lastname }}" required>
                        @error('lastname')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="place_birth" class="mt-3">Birth place *</label>
                        <input type="text" class="form-control @error('place_birth') is-invalid @enderror" id="place_birth" name="place_birth" placeholder="Birth place" value="{{ $student->place_birth }}" required>
                        @error('place_birth')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4 mt-3">
                        <label for="firstname">Firstname*</label>
                        <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" placeholder="Firstname" value="{{ $student->firstname }}" required>
                        @error('firstname')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="email" class="mt-3">Email *</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ $student->email }}" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4 mt-3">
                        <label for="middlename">Middlename*</label>
                        <input type="text" class="form-control @error('middlename') is-invalid @enderror" id="middlename" name="middlename" placeholder="Middlename" value="{{ $student->middlename }}" required>
                        @error('middlename')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 mt-3">
                            <label for="sex">Sex*</label>
                            <select class="form-control @error('sex') is-invalid @enderror" id="sex" name="sex">
                                <option value="Male" {{ $student->sex == 'Male' ? 'selected': '' }}>Male</option>
                                <option value="Female" {{ $student->sex == 'Female' ? 'selected': '' }}>Female</option>
                            </select>
                            @error('sex')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 mt-3">
                            <label for="date_birth">Birth Date*</label>
                            <input type="date" class="form-control @error('date_birth') is-invalid @enderror" id="date_birth" name="date_birth" value="{{ $student->date_birth }}" required>
                            @error('date_birth')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <h5 class="fw-bold mb-3 mt-5">Address</h5>

                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 mt-3">
                            <label for="street">Street*</label>
                            <input type="text" name="street" class="form-control @error('street') is-invalid @enderror" value="{{ $student->street }}">
                            @error('street')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4 mt-3">
                            <label for="brgy">Brgy*</label>
                            <input type="text" class="form-control @error('brgy') is-invalid @enderror" id="brgy" name="brgy" value="{{ $student->brgy }}" >
                            @error('brgy')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4 mt-3">
                            <label for="state">State*</label>
                            <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" name="state" value="{{ $student->state }}">
                            @error('state')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Save</button>
            </form>
        </div>
    </div>
</div>

@include('partials.script')

</body>
</html>
