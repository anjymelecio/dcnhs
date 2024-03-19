<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Data</title>
    @include('partials.css')
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addstudent.css') }}">
</head>
<body>
    @include('partials.navbar')

    <div class="wrapper">


        

        @include('partials.maincontent')
        <div class="mt-4 address-menu">
            <span class="fw-light ">Home <span style="color: #2780C2"> <img src="{{ asset('icons/Vector.png') }}" alt=""> Student</span></span>
        </div>
        
        @include('partials.addmenu')

        <div class="card-body table-responsive">
            <h3 class="fw-light">Students</h3> 
            @include('partials.message')

            <!-- Button trigger modal -->
            @include('add.students')
        
                     @include('edit.students')
          
        
      
             
       @if($students->count() >0)
            <div class="table-responsive-md mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">LRN</th>
                            <th scope="col">Last name</th>
                            <th scope="col">First name</th>
                            <th scope="col">Middle name</th>
                            <th scope="col">Age</th>
                            <th scope="col">Strand</th>
                            <th scope="col">Section</th>
                            <th scope="col">Grade Level</th>
                            <th scope="col">Guardian</th>
                            <th scope="col">School year</th>
                            <th scope="col">House Address</th>
                            <th scope="col">Street</th>
                            <th scope="col">Brgy</th>
                            <th scope="col">City</th>
                            <th scope="col">State</th>
                            <th scope="col">Zip</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @endif
 @forelse ( $students as $student )

          <tr>
            <td>{{$student->lrn}}</td>
            <td>{{$student->lastname}}</td>
             <td>{{$student->firstname}}</td>
             <td>{{$student->middlename}}</td>
             <td><?php
        $birthdate = new DateTime($student->birth_date);
        $today = new DateTime();
        $age = $today->diff($birthdate)->y;
        echo $age;
    ?></td>
             <td>{{$student->strands}}</td>
             <td>{{$student->section_name  }}</td>
             <td>{{$student->grade_level}}</td>
             <td>{{$student->guardians_firstname}} {{$student->guardians_lastname}}</td>
            <td>{{ $student->year_start}} - {{ $student->year_end }}</td>
             <td>
              @if ($student->house_address !== null)
                {{$student->house_address}}
                @else
                N/A
              @endif
             </td>
              <td>
              @if ($student->street !== null)
                {{$student->street}}
                @else
                N/A
              @endif
             </td>
              <td>
              @if ($student->brgy !== null)
                {{$student->brgy}}
                @else
                N/A
              @endif
             </td>
              <td>
              @if ($student->city !== null)
                {{$student->city}}
                @else
                N/A
              @endif
             </td>
              <td>
              @if ($student->state !== null)
                {{$student->house_address}}
                @else
                N/A
              @endif
             </td>
              <td>
              @if ($student->zip !== null)
                {{$student->zip}}
                @else
                N/A
              @endif
             </td>
               <td><a href="#editStudent{{ $student->id }}" data-bs-toggle="modal"
                data-bs-target="#editStudent{{ $student->id }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Edit"
                 class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
               <form action="{{route('student.delete', ['id'=>$student->id])}}" method="POST">
               @csrf
               @method('DELETE')
               <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="Delete"><i class="fa-solid fa-trash"></i></button>
               </form>
               </td>
          </tr>
          @empty
          <p class="mt-5">No student found</p>
        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('partials.script')
</body>
</html>

