@if(session('success'))
    <div class="alert alert-success" role="alert">
       <div class="container"> {{ session('success') }} </div>
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning" role="alert">
        <div class="container"> {{ session('warning') }} </div>
    </div>
@endif

@if(session('error'))
    <div id="error" class="alert alert-danger" role="alert">
        <div class="container"> {{ session('error') }} </div>
    </div>
@endif
