<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      
<div class="card">
    <div class="card-header bg-primary text-white">
      Create classes
    </div>
    <div class="card-body">
      <form>
        <div class="row">

           <div class="col-md-4">
          <label for="strand_id">Strands</label>
          <select name="strand_id" id="strand_id" class="form-control">
          @foreach ($strands as $strand)

          <option value="{{$strand->id}}">{{$strand->strands}}</option>
            
          @endforeach
          </select>
        </div>


        <div class="col-md-4">
          <label for="subject_id">Subjects</label>
          <select name="subject_id" id="subject_id" class="form-control">
              @if($subjects->count() > 0)
                  @foreach ($subjects as $subject)
                      <option value="{{$subject->id}}">{{$subject->subjects}}</option>
                  @endforeach
              @else 
                  <option>No subjects found</option>
              @endif
          </select>
      </div>
      

         


        <div class="col-md-4">
          <label for="section_id">Section</label>
          <select name="section_id" id="section_id" class="form-control">
          @foreach ($sections as $section)

          <option value="{{$section->id}}">{{$section->sections}}</option>
            
          @endforeach
          </select>
        </div>


        
          

        



         


      </form>
      </div>

      </div>
  </div>





    
    </div>
  </div>
    
 @include('partials.script')

 <script>
 $(document).on('change', '#strand_id', function(){
    var strand_id = $(this).val();

    $.ajax({
        url: "{{ route('classes.fetchdata') }}",
        method: 'get',
        data: { strand_id: strand_id },
        dataType: 'json',
        success: function(response){
            var subjects = response.subjects;
            var options = '';

            if (subjects.length > 0) {
                $.each(subjects, function(index, subject){
                    options += '<option value="' + subject.id + '">' + subject.subject + '</option>';
                });
            } else {
                options += '<option>No subjects found</option>';
            }

            $('#subject_id').html(options);
        },
        error: function(xhr, status, error){
            console.error(error);
        }
    });
});


  </script>

  
 <script>
$(document).on('change', '#strand_id', function(){
    var strand_id = $(this).val();

    $.ajax({
        url: "{{ route('classes.fetchdata') }}",
        method: 'get',
        data: { strand_id: strand_id },
        dataType: 'json',
        success: function(response){
            var sections = response.sections;
            var options = '';

            if (sections.length > 0) {
                $.each(sections, function(index, section){
                    options += '<option value="' + section.id + '">' + section.sections + '</option>';
                });
            } else {
                options += '<option>No sections found</option>';
            }

            $('#section_id').html(options);
        },
        error: function(xhr, status, error){
            console.error(error);
        }
    });
});







  </script>
  
  



</body>
</html>
