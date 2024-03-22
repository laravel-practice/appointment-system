@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="error">
           {{ $error }}</li>
        </div>
    @endforeach
@endif

