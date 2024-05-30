<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    @include('partials.css')
</head>
<body>

@include('guardianpartial.navbar')

<div class="wrapper">
    @include('partials.maincontent')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('guardian.profile') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('guardian.change.password') }}">Change Password</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <form action="{{ route('guardian.update.profile') }}" method="POST">
                    @csrf

                    @include('partials.message')

                    <h5 class="fw-bold mb-3">Personal Information</h5>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 ">
                            <label for="lastname">Lastname*</label>
                            <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" placeholder="Lastname" value="{{ $guardian->lastname }}" required>
                            @error('lastname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 ">
                            <label for="place_of_birth">Birth place*</label>
                            <input type="text" class="form-control @error('place_of_birth') is-invalid @enderror" id="place_of_birth" name="place_of_birth" placeholder="Birth place" value="{{ $guardian->place_of_birth }}" required>
                            @error('place_of_birth')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 ">
                            <label for="firstname">Firstname*</label>
                            <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" placeholder="Firstname" value="{{ $guardian->firstname }}" required>
                            @error('firstname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 ">
                            <label for="email" class="mt-3">Email*</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ $guardian->email }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 mt-3">
                            <label for="middlename">Middlename*</label>
                            <input type="text" class="form-control @error('middlename') is-invalid @enderror" id="middlename" name="middlename" placeholder="Middlename" value="{{ $guardian->middlename }}" required>
                            @error('middlename')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 mt-3">
                          <label for="phone">Phone number*</label>
                          <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Phone number" value="{{ $guardian->phone }}" required>
                          @error('phone')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 mt-3">
                            <label for="sex">Sex*</label>
                            <select class="form-control @error('sex') is-invalid @enderror" id="sex" name="sex">
                                <option value="Male" {{ $guardian->sex == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $guardian->sex == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('sex')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 mt-3">
                          <label for="birth_date">Birth Date*</label>
                          <input type="date" class="form-control @error('birth_date') is-invalid @enderror" id="birth_date" name="birth_date" value="{{ $guardian->birth_date }}" required>
                          @error('birth_date')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                      

                        <div class="col-xs-12 col-sm-6 col-md-4 mt-3">
                            <label for="occupation">Occupation</label>
                            <input type="text" class="form-control @error('occupation') is-invalid @enderror" id="occupation" name="occupation" value="{{ $guardian->occupation }}">
                            @error('occupation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <h5 class="fw-bold mb-3 mt-5">Address</h5>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 mt-3">
                            <label for="street">Street</label>
                            <input type="text" name="street" class="form-control @error('street') is-invalid @enderror" value="{{ $guardian->street }}">
                            @error('street')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                       <div class="col-xs-12 col-sm-6 col-md-4 mt-3">
                        <label for="barangay">Brgy</label>
                   <input type="text" class="form-control @error('barangay') is-invalid @enderror" id="barangay" name="barangay" value="{{ $guardian->barangay }}">
                   @error('barangay')
                 <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          </div>


                        <div class="col-xs-12 col-sm-6 col-md-4 mt-3">
                            <label for="state">State</label>
                            <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" name="state" value="{{ $guardian->state }}" >
                            @error('state')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-primary mt-3">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('partials.script')

</body>
</html>
