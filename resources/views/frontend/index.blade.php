@extends('frontend.layouts.layout')

@section('content')
    <div class="appointment-wrapper">
        <div class="appointment-image">
            <img src="{{ asset('assets/images/Booking-System2.png') }}" alt="">
        </div>
        <div class="appointment-form">

            @if (Auth::check())
            <div class="form-wrapper">
                <h2> Make An Appointment</h2>
                <p class="signup-info">Streamline your schedule. Sign up now!</p>
                @include('frontend.common.form_validation_message_global')

                <form method="POST" action="{{ route('login') }}" class="form" id="loginForm">
                    @csrf
                    <div>
                        <label for="email">Email </label>
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @include('frontend.common.form_validation_message_single', ['for' => 'email'])
                    </div>

                    <div>
                        <label for="password">password </label>
                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @include('frontend.common.form_validation_message_single', ['for' => 'password'])
                    </div>

                    <button type="submit" id="form__submit">
                        Submit<i class="icon-arrow-chevrolet"></i>
                    </button>

                </form>
            </div>
            @else
            <div class="form-wrapper">
                <h2>Login to Make Appointment</h2>
{{--                <p class="signup-info">Streamline your schedule. Sign up now!</p>--}}

                <form method="POST" action="{{ route('login') }}" class="form" id="loginForm">
                    @csrf
                    <div>
                        <label for="email">Email </label>
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @include('frontend.common.form_validation_message_single', ['for' => 'email'])
                    </div>

                    <div>
                        <label for="password">password </label>
                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @include('frontend.common.form_validation_message_single', ['for' => 'password'])
                    </div>

                    <button type="submit" id="form__submit">
                        Submit<i class="icon-arrow-chevrolet"></i>
                    </button>

                </form>
            </div>
            @endif
        </div>
    </div>
@endsection

@push('js')
<script>

</script>
@endpush
