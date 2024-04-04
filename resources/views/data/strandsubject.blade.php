<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $strand->strands }} {{ $strand->description }}</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      
<h3 class="fw-bold">{{$strand->strands}}</h3><p>
    {{ $strand->description }}
</p>

@include('partials.message')
     
<div class="card mt-5">
  <div class="card-header bg-primary text-white">
    <span>Grade 11 1st semester subjects</span>
  </div>
  <div class="card-body table-responsive">

    @if ($elevenFirst->count() > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Subjects</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($elevenFirst as $subject)
                <tr>
                    <td>{{ $subject->subject }}</td>
                    <td>

                        <form action="{{ route('strand.subject.delete', ['strand_id' => $strand->id, 'subject_id'=>$subject->subid]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                    <button class="btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete {{$subject->subject}}">
          <i class="link-danger fa-solid fa-trash"></i>
        </button>
                    </td>

                </form>
                  
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No subjects found for {{$strand->strands}} in the 1st Semester for Grade 11.</p>
@endif

    
   
  </div>



    
    </div>


    <div class="card mt-5">
        <div class="card-header bg-primary text-white">
          <span>Grade 11 2nd semester subjects</span>
        </div>
      
        <div class="card-body">
      
         @if ($elevenSecond->count() > 0)
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>Subjects</th>
                      
                  </tr>
              </thead>
              <tbody>
                  @foreach ($elevenSecond as $subject)
                      <tr>
                          <td>{{ $subject->subject }}</td>
                        
                      </tr>
                  @endforeach
              </tbody>
          </table>
      @else
          <p>No subjects found for {{$strand->strands}} in the 2nd Semester for Grade 11.</p>
      @endif
      </div>




      
          

      
      
      
      
        
      </div>

      <div class="card mt-5">
        <div class="card-header bg-primary text-white">
          <span>Grade 12 1st Semester subjects</span>
        </div>
      
        <div class="card-body">
      
         @if ($twelveFirst->count() > 0)
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>Subjects</th>
                      
                  </tr>
              </thead>
              <tbody>
                  @foreach ($twelveFirst as $subject)
                      <tr>
                          <td>{{ $subject->subject }}</td>
                        
                      </tr>
                  @endforeach
              </tbody>
          </table>
      @else
          <p>No subjects found for {{$strand->strands}} in the 1st Semester for Grade 12.</p>
      @endif
      </div>

      
    
  </div>





   <div class="card mt-5">
        <div class="card-header bg-primary text-white">
          <span>Grade 12 2nd Semester subjects</span>
        </div>
      
        <div class="card-body">
      
         @if ($twelveSecond->count() > 0)
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>Subjects</th>
                      
                  </tr>
              </thead>
              <tbody>
                  @foreach ($twelveSecond as $subject)
                      <tr>
                          <td>{{ $subject->subject }}</td>
                        
                      </tr>
                  @endforeach
              </tbody>
          </table>
      @else
          <p>No subjects found for {{$strand->strands}} in the 2nd Semester for Grade 12.</p>
      @endif
      </div>

      
    
  </div>
    
    
 @include('partials.script')


</script>
</body>
</html>
