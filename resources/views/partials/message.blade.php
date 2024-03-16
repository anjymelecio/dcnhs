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