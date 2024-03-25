@extends('frontend.layouts.layout')

@section('content')
    <div class="appointment-wrapper">
        <div class="appointment-image">
            <img src="{{ asset('assets/images/Booking-System2.png') }}" alt="">
        </div>
        <div class="appointment-form">

            <div class="form-wrapper" style="display: none;">
                <form action="">
                    hello
                </form>
            </div>
            <div class="form-wrapper">
                <h4>Create Account to Make Appointment</h4>
                <p class="signup-info">Streamline your Appointment. Sign up now!</p>
                @include('frontend.common.form_validation_message_global')

                <form method="POST" action="{{ route('register') }}" class="form" id="signupForm">
                    @csrf
                    <div>
                        <label for="name">First Name <span class="ast">*</span></label>
                        <input type="text" id="name" name="name">
                        @include('frontend.common.form_validation_message_single', ['for' => 'name'])
                    </div>

                    <div>
                        <label for="mobile">Mobile Number <span class="ast">*</span></label>
                        <input type="text" id="mobile" name="mobile">
                        @include('frontend.common.form_validation_message_single', ['for' => 'mobile'])
                    </div>

                    <div>
                        <label for="address">Address <span class="ast">*</span></label>
                        <input type="text" id="address" name="address">
                        @include('frontend.common.form_validation_message_single', ['for' => 'address'])
                    </div>

                    <div>
                        <label for="email">Email <span class="ast">*</span></label>
                        <input type="email" id="email" pattern="([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$)" name="email">
                        @include('frontend.common.form_validation_message_single', ['for' => 'email'])
                    </div>

                    <div>
                        <label for="password">password <span class="ast">*</span></label>
                        <input type="password" id="password" name="password">
                        <div>
                            <code id="password-info" class="info">
                                Password must be at least 8 characters long and contain only letters and numbers.
                            </code>
                        </div>
                        @include('frontend.common.form_validation_message_single', ['for' => 'password'])
                    </div>

                    <div>
                        <label for="password-confirm">confirm password <span class="ast">*</span></label>
                        <input type="password" id="password-confirm" name="password_confirmation">
                    </div>

                    <button type="submit" class="form-control btn-success btn" id="form__submit">
                        Submit<i class="icon-arrow-chevrolet"></i>
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    $('#signupForm').validate({
        rules: {
            'name': {
                required: true,
                maxlength: 50,
                minlength: 3
            },
            'mobile': {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            'email':{
                required: true,
                email: true,
            },
            'address': {
                required: true,
            },
            'password': {
                required: true,
                minlength: 8,
                alphanumeric: true
            },
            'password-confirm': {
                required: true,
                equalTo: '#password'
            }
        },
        messages: {
            'name': {
                required: "This field is required.",
                maxlength:"Please enter no more than 50 characters.",
                minlength:"Please enter at least 3 characters.",
            },
            'mobile': {
                required: "This field is required.",
            },
            'email': {
                required: "This field is required.",
                email: "Please enter a valid email address"
            },
            'password': {
                minlength: "Password must be at least 10 characters long",
                alphanumeric: "Password must contain only letters and numbers"
            },
            'password-confirm': {
                equalTo: "Passwords do not match"
            }

        },

        submitHandler: function(form) {
            $('#form__submit').prop('disabled', true).html('Submitting Data');
            form.submit();
        }
    });

</script>
@endpush
