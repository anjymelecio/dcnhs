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
      Select Strand
    </div>
    <div class="card-body">
      <form>
        <div class="row">

        <div class="col-md-4">

        <select id="mySelect" onchange="window.location.href = this.value;" class="form-control">
            @foreach ( $strands as $strand )
                <option value="{{ route('classes.create',['id' => $strand->id])}}">{{ $strand->strands}}</option>
            @endforeach
          </select>
         



         


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
