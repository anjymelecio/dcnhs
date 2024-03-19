<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('partials.css')
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
</head>
<body>

  @include('partials.navbar')

  <div class="wrapper">

        
  

    @include('partials.maincontent')

    <div class="mt-4 address-menu">
        <span class="fw-light">Home <img src="{{asset('icons/Vector.png')}}" alt=""> <span style="color: #2780C2">Section</span></span>
    </div>

    <div class="card mt-5 shadow-lg">
        <div class="card-header">
          <h3 class="card-title">Sections</h3>
        </div>
        <div class="card-body">
              
         <button type="button" class="btn btn-primary border-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
          <i class="fa-solid fa-circle-plus"></i>  Add Section
         
         </button>
      


<!-- Modal add -->
@include('partials.sectionform')

@foreach ($sections as $section)
<div class="modal fade" id="editModal{{ $section->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Section</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('section.update', ['id' => $section->id]) }}" method="POST">
             @csrf
             @method('PUT')
       
   
        <input type="text" name="section_name" value="{{$section->section_name}}" class="form-control">

     
  
      </div>
      <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
            </form>
    </div>
  </div>
</div>
@endforeach



@include('partials.message')











      
          <table class="table table-bordered mt-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Sections</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
     @foreach ($sections as $section )
         <tr>
         <td>{{$section->id}}</td>
         <td>{{$section->section_name}}</td>
       <td style="width: 200px">  <a data-bs-toggle="modal" class="btn btn-warning border-dark " href="#editModal{{ $section->id }}">
        <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <button class="btn btn-danger border-dark"><i class="fa-solid fa-trash"></i></button>
    
    </td>
         </tr>
     @endforeach
  </tbody>
</table>
        </div>
      </div>

</div>
  </div>
    
  @include('partials.script')
</body>
</html>
