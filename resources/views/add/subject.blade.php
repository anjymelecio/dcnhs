<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $strand->strands }}</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      

   <div class="card">
    <div class="card-header bg-primary text-white">
        <span>Add subject to {{ $strand->strands }} </span>
    </div>
    <div class="card-body">
        @include('partials.message')
        <form action="" class="mt-3" method="POST">
            @csrf

            <div class="row">

                <input type="hidden" value="{{$strand->id}}">

    <div class="col-xs-4 col-sm-4 col-md-4 mt-5">
        <label for="subject">Subject*</label>
        <input type="text" class="form-control mt-3 @error('subject') is-invalid @enderror" id="subject" name="subject" placeholder="Add Subject" value="{{ old('subject') }}">
        @error('subject')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <button class="btn btn-primary mt-3">Submit</button>
    </div>


</div>

          
            </div>
        </form>
    </div>
</div>







    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
