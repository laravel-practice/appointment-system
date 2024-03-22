@if ($errors->has($for))
    <span class="validation-notification error">{{ $errors->first($for) }}</span>
@endif