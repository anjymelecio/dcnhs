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
            <span class="fw-light ">Home <span style="color: #2780C2"> <img src="{{ asset('icons/Vector.png') }}" alt=""> Student</span>
            <span style="color: #2780C2"> <img src="{{ asset('icons/Vector.png') }}" alt=""> Data
            </span>
        </div>


        <div class="card mt-4">
          <div class="card-header bg-primary text-white d-flex gap-5 justify-content-between align-items-center">
           <span>Student List</span>

         
          </div>
          <div class="card-body shadow-sm ">

            
            

            

            
            <div class="container mb-3">
                <div class="row">
                  <div class="col-sm-4">
                    <form action="{{ route('students.data') }}" method="GET" class="d-flex">
                      <input type="text" class="form-control me-2" name="query" placeholder="Search by name..." value="{{ request()->input('query') }}">
  
             
                      <button class="btn btn-primary btn-sm d-flex align-items-center gap-2" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Search</button>
                    </form>
                  </div>
                </div>
                
   
                
              </div>
         

            @include('partials.message')

         <a href="{{ route('students.create') }}" class="mb-3 btn btn-primary btn-sm mt-3"> <i class="fa-solid fa-user-plus"></i> Add new tudents</a>

               
         @if ($datas->count() > 0)
         <div class="table-responsive" >
  @include('partials.student')
         
 </div>

<div class="mt-3">
  {{ $datas->appends(request()->query())->links('pagination::bootstrap-5') }}

</div>
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


<script>
$(document).ready(function() {
    $('#strand_id').on('change keyup', function() {
        liveSearch();
    });

    function liveSearch() {
        $.ajax({
            type: "GET",
            url: "{{ route('students.data') }}",
            data: {
                strand_id: $('#strand_id').val()
            },
            success: function(response) {
                $('#studentData').html(response); 
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                $('#errorMessage').text("An error occurred: " + xhr.responseText);
            }
        });
    }
});
</script>

