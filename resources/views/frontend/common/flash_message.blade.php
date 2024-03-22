@if (session()->has('alert-success'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {!! session()->get('alert-success') !!}
    </div>

@elseif (session()->has('alert-danger'))
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {!! session()->get('alert-danger') !!}
    </div>
@endif