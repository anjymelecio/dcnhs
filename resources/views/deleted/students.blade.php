<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Data</title>
    @include('partials.css')
</head>
<body>

@include('partials.navbar')

<div class="wrapper">

@include('partials.maincontent')
     
<div class="mt-4 address-menu">
    <span class="fw-light ">Home <span style="color: #2780C2"> <img src="{{ asset('icons/Vector.png') }}" alt=""> Archive</span>
    <span style="color: #2780C2"> <img src="{{ asset('icons/Vector.png') }}" alt=""> Data</span>
</div>

<div class="card mt-4">
    <div class="card-header bg-primary text-white">
        <span>Student List</span>
    </div>
    <div class="card-body shadow-sm table-responsive">

          <div class="container mb-3">
                <div class="row">
                  <div class="col-sm-4">
                    <form action="{{ route('students.data.archive') }}" method="GET" class="d-flex">
                      <input type="text" class="form-control me-2" name="query" placeholder="Search by name..." value="{{ request()->input('query') }}">
  
             
                      <button class="btn btn-primary btn-sm d-flex align-items-center gap-2" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Search</button>
                    </form>
                  </div>
                </div>
                
   
                
              </div>
         

        @include('partials.message')

        @if ($datas->count() > 0)
        <div class="table-responsive" >
            <table class="table table-bordered" style="font-size: 14px;">
                <thead>
                    <tr>
                        <th scope="col">LRN</th>
                        <th scope="col">Last name</th>
                        <th scope="col">First name</th>
                        <th scope="col">Middle name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Sex</th>
                        <th scope="col">Strand</th>
                        <th scope="col">Place Birth</th>
                        <th scope="col">Age</th>
                        <th scope="col">Street</th>
                        <th scope="col">Barangay</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($datas as $data )
                    <tr>
                        <td>{{$data->lrn}}</td>
                        <td>{{$data->lastname}}</td>
                        <td>{{$data->firstname}}</td>
                        <td>{{$data->middlename}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->sex}}</td>
                        <td>{{$data->strand}} - {{$data->level}}</td>
                        <td>{{$data->place_birth}}</td>
                        <?php
                            $birthDate = new DateTime($data->date_birth);
                            $currentDate = new DateTime();
                            $age = $currentDate->diff($birthDate)->y;
                        ?>
                        <td>{{$age}}</td>
                        <td>{{$data->street ?? 'N/A' }}</td>
                        <td>{{$data->brgy ?? 'N/A' }}</td>
                        <td>{{$data->city ?? 'N/A' }}</td>
                        <td>{{$data->state ?? 'N/A' }}</td>
                        <td>
                            <div class="d-flex">
                                <form action="{{ route('students.data.restore', ['id' => $data->id]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-warning btn-sm d-flex gap-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Restore">
                                        <i class="fa-solid fa-arrow-rotate-left mt-1"></i> Restore
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @else 
        <p>No student found</p>
        @endif
    </div>
</div>

@include('partials.script')

</body>
</html>
