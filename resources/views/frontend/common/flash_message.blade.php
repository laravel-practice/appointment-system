@if (session()->has('alert-success'))
    <div class="alert alert-success" role="alert">
        <strong>Success!</strong> {!! session()->get('alert-success') !!}
    </div>
@elseif (session()->has('error'))
    <div class="alert alert-danger" role="alert">
        <strong>Error!</strong> {!! session()->get('error') !!}
    </div>
@endif

