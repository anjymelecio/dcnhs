s<!DOCTYPE html>
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
            <span style="color: #2780C2"> <img src="{{ asset('icons/Vector.png') }}" alt=""> Data
            </span>
        </div>


        <div class="card mt-4">
          <div class="card-header bg-primary text-white">
           <span>Student List</span>
          </div>
          <div class="card-body shadow-sm table-responsive">

            @include('partials.message')



               
         @if ($datas->count() > 0)

          <table class="table table-bordered">

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
         <td>{{$data->street == null ? 'N/A' : $data->street }}</td>
         <td>{{$data->brgy == null ? 'N/A' : $data->brgy }}</td>
         <td>{{$data->city == null ? 'N/A' : $data->city }}</td>
         <td>
         <div class="d-flex">

         <form action="{{ route('students.data.restore', ['id' => $data->id]) }}" method="POST">
    @csrf
    @method('PATCH')
    <button class="btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Restore">
        <i class="fa-solid link-warning fa-arrow-rotate-left"></i>
    </button>
</form>


         </div>
         
         
         </td>
 
          
           

  </tr>
      
  @endforeach
  </tbody>

  </table>

   @else 

   <p>No student found</p>
             
         @endif
          
          
           
        </div>



    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
