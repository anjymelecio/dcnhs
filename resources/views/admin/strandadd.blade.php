<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dash.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
    <link rel="stylesheet" href="{{asset('css/addstrand.css')}}">
  
</head>
<body>


  @include('partials.navbar')



  

<div class="toggle-sidebar" id="toggle-bar">
  <span>
    <i class="fa-solid fa-bars"></i>
  </span>
</div>
     









<div class="wrapper">

  @include('partials.sidebar')


@include('partials.maincontent')
   

   <div class="mt-4 address-menu">
   <span class="fw-light ">Home <img src="{{asset('icons/Vector.png')}}" alt=""> <span style="color: #2780C2">Add Strand</span></span>
   </div>

  

   <div class="card mt-5 form-container">
    <h5 class="card-header">Add Strand</h5>
    <div class="card-body">

      @if(session('success'))
                <div class="alert alert-success mt-3">
               <p>{{ session('success') }}</p> 
                </div>
            @endif

             @if($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
      <form action="{{route('strand.post')}} method="POST">
        @csrf
         <div class="row mt-5">
         <div class="col-md-3">
           <label for="">Strand Name*</label>
           <input type="text" class="form-control input-student" name="strand_name" required>
         </div>
         <div class="col-md-3">
           <label for="">Section Name*</label>
           <select name="section_id" class="form-control" style="width: 250px">

           <option>Select Section</option>
          @foreach ( $sections as $section )
             <option value="{{$section->id}}">{{$section->section_name}}</option>
          @endforeach   
                
                  
          
           
           </select>
         </div>
         <div class="col-md-3">
           <label for="">Adviser*</label>
           <input type="text" name="teacher_id" class="form-control input-student" required>
         </div>
       </div>
   
      
       <button class="btn btn-add btn-primary mt-5">Add</button>
       </div>

         
          

         
       
      </form>
    </div>
  </div>
    


    </div>
  </div>
</div>
 @include('partials.script')


</script>
</body>
</html>
