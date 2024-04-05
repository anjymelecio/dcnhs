<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create admin</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      <div class="mt-4 address-menu">
            <span class="fw-light ">Home <span > <img src="{{ asset('icons/Vector.png') }}" alt=""> data</span> 
             <img src="{{ asset('icons/Vector.png') }}" alt=""> <span style="color: #2780C2"> Admin</span></span>
        </div>
<div class="card mt-3">
    <div class="card-header bg-primary text-white">
        <span>Admin List</span>
    </div>
    <div class="card-body">

        @include('partials.message')
      

        <table class="table table-bordered">

            <thead>
            <th>Admin names</th>
            <th>Email</th>
             <th>Role</th>
             <th>Action</th>
            </thead>

            <tbody>
            @foreach ( $admins as $admin )

            <tr>
            <td>{{$admin->name}}</td>
            <td>{{$admin->email}}</td>
             <td>{{$admin->is_admin == 1 ? 'Super admin' : 'Admin'}}</td>
             <td>
                <div class="d-flex">
             @include('edit.admin')

             <form action="{{ route('admin.delete', ['id'=> $admin->id]) }}" method="POST">

                @csrf
                @method('DELETE')
             <button class="btn"><i class=" link-danger fa-solid fa-trash"></i></button>
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


</script>
</body>
</html>
