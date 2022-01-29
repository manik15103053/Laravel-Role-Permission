@if(Session::get('msg'))
    <div class="alert alert-success">
        {{session::get('msg')}}
    </div>
@endif
@if(Session::get('error'))
    <div class="alert alert-success">
        {{session::get('error')}}
    </div>
@endif
@if(Session::get('success'))
    <div class="alert alert-success">
        {{session::get('success')}}
    </div>
@endif