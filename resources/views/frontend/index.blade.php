@extends('frontend.layouts.layout')

@section('content')
    <div class="appointment-wrapper">
        <div class="appointment-image">
            <img src="{{ asset('assets/images/Booking-System2.png') }}" alt="">
        </div>

        <div class="appointment-form">
            @if (Auth::check())
            <div class="form-wrapper">
                <h4> Make An Appointment!</h4>
                <p class="signup-info">Streamline your Appointment. Sign up now!</p>
                @include('frontend.common.form_validation_message_global')
                @include('frontend.common.flash_message')

                <form method="POST" action="{{ route('appointment') }}" class="form" id="appointmentForm">
                    @csrf
                    <div>
                        <label for="title">Appointment Title <span class="ast">*</span></label>
                        <input id="title" type="text" name="title" value="{{ old('title') }}" >
                        @include('frontend.common.form_validation_message_single', ['for' => 'title'])
                    </div>

                    <div>
                        <label for="appointment_date">Select Date <span class="ast">*</span> </label>
                        <input id="appointment_date" type="date" name="appointment_date">
                        @include('frontend.common.form_validation_message_single', ['for' => 'appointment_date'])
                    </div>

                    <div>
                        <label for="appointment_time">Select Time <span class="ast">*</span></label>
                        <input id="appointment_time" type="time" name="appointment_time">
                        @include('frontend.common.form_validation_message_single', ['for' => 'appointment_time'])
                    </div>

                    <div>
                        <label for="description"> Appointment Description <span class="ast">*</span></label>
                        <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                        @include('frontend.common.form_validation_message_single', ['for' => 'description'])
                    </div>

                    <button type="submit" class="form-control btn btn-success" id="form__submit">
                        Submit<i class="icon-arrow-chevrolet"></i>
                    </button>

                </form>
            </div>
            @else
            <div class="form-wrapper">
                <h4>Login to Make Appointment</h4>
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

                    <button type="submit" class="form-control btn btn-success" id="form__submit">
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
        $('#appointmentForm').validate({
            rules: {
                'title': {
                    required: true,
                },
                'appointment_date': {
                    required: true,
                },
                'appointment_time':{
                    required: true,
                },
                'description': {
                    required: true,
                },

            },

            submitHandler: function(form) {
                $('#form__submit').prop('disabled', true).html('Submitting Data');
                form.submit();
            }
        });

    </script>

@endpush
