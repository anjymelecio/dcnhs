s<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers Data</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      
     
<div class="mt-4 address-menu">
            <span class="fw-light ">Home <span style="color: #2780C2"> <img src="{{ asset('icons/Vector.png') }}" alt="">Teachers</span>
            <span style="color: #2780C2"> <img src="{{ asset('icons/Vector.png') }}" alt=""> Data
            </span>
        </div>


        <div class="card mt-4">
          <div class="card-header bg-primary text-white">
           <span>Teacher List</span>
          </div>
          <div class="card-body shadow-sm table-responsive">

            @include('partials.message')



               
         

          @if ($datas->count() > 0)
          <table class="table table-bordered">

          <thead>
    <tr>
      <th scope="col">Teacher ID</th>
      <th scope="col">Last name</th>
      <th scope="col">First name</th>
      <th scope="col">Middle name</th>
      <th scope="col">Rank</th>
      <th scope="col">Email</th>
      <th scope="col">Phone number</th>
      <th scope="col">Sex</th>
      <th scope="col">Place Birth</th>
      <th scope="col">Age</th>
      <th scope="col">Street</th>
      <th scope="col">Barangay</th>
      <th scope="col">City</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>

    @foreach ($datas as  $data)

    <tr>
    <td>{{ $data->teacher_id }}</td>
    <td>{{ $data->lastname }}</td>
    <td>{{ $data->firstname }}</td>
    <td>{{ $data->middlename }}</td>
    <td>{{ $data->rank }}</td>
     <td>{{ $data->phone_number }}</td>
    <td>{{ $data->email }}</td>
    <td>{{ $data->sex }}</td>
    <td>{{ $data->birth_place }}</td>
    
     <?php

     $birthDate = new DateTime($data->date_birth);
      $currentDate = new DateTime();
      $age = $currentDate->diff($birthDate)->y;
           ?>
           <td>{{ $age }}</td>

           <td>{{ $data->street == null ? 'N/A' : $data->street  }}</td>
           <td>{{ $data->brgy == null ? 'N/A' : $data->brgy  }}</td>
           <td>{{ $data->city == null ? 'N/A' : $data->city  }}</td>
           <td>
           <div class="d-flex">
           @include('edit.teachers')
           <form action="{{ route('teachers.data.delete', ['id' => $data->id]) }}" method="POST">
            @csrf
            @method('DELETE')
           <button class="btn btn-danger btn-sm mt-2" type="submit">
           Delete
           </button></form>
           </div>
           </td>

    
    </tr>
        
    @endforeach



  <tr>

  
 
          
           

  </tr>
      

  </tbody>

  </table>

   @else
   <p>No teachers found</p>
              
          @endif




             
   
          
          
           
        </div>



    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
