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
    @include('partials.sidebar')
        
    <div class="toggle-sidebar" id="toggle-bar">
        <span>
            <i class="fa-solid fa-bars"></i>
        </span>
    </div>

    @include('partials.maincontent')

    <div class="mt-4 address-menu">
        <span class="fw-light">Home <img src="{{asset('icons/Vector.png')}}" alt=""> <span style="color: #2780C2">Section</span></span>
    </div>

    <div class="card mt-5 shadow-lg">
        <div class="card-header">
          <h3 class="card-title">Add Section</h3>
        </div>
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
                
            <form action="{{ route('section.post') }}" method="POST">
                @csrf
            <div class="row">
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Add Section" name="section_name" required>
                    <button class="mt-3 btn btn-primary">Add</button>
                </div>
            </div>
          </form>
        </div>
      </div>

</div>
  </div>
    
  @include('partials.script')
</body>
</html>
