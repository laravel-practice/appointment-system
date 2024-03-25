@extends('admin.layouts.layout')

@section('content')
        <div class="breadcrumbs">
            <h2> User </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item actice">
                    <a href="{{ route('admin.user') }}">User</a>
                </li>
                <li class="breadcrumb-item">
                    <strong>Edit</strong>
                </li>
            </ol>
        </div>

        <div class="tableWrapper">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Edit Users</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="login-form">
                            @include('frontend.common.form_validation_message_global')
                            @include('frontend.common.flash_message')

                            <form method="POST" action="{{ route('admin.user.update',$user['id']) }}" class="form" id="editUser">
                                @csrf
                                <div>
                                    <label for="email">Email </label>
                                    <p for="email"><code>{{ $user['email'] }}</code></p>
                                </div>

                                <div>
                                    <label for="name">First Name </label>
                                    <input type="text" id="name" name="name" value="{{ $user['name'] }}">
                                    @include('frontend.common.form_validation_message_single', ['for' => 'name'])
                                </div>

                                <div>
                                    <label for="mobile">Mobile Number </label>
                                    <input type="text" id="mobile" name="mobile" value="{{ $user['mobile'] }}">
                                    @include('frontend.common.form_validation_message_single', ['for' => 'mobile'])
                                </div>

                                <div>
                                    <label for="address">Address </label>
                                    <input type="text" id="address" name="address" value="{{ $user['address'] }}">
                                    @include('frontend.common.form_validation_message_single', ['for' => 'address'])
                                </div>

                                <div>
                                    <label for="password">password</label>
                                    <input type="password" id="password" name="password">
                                    @include('frontend.common.form_validation_message_single', ['for' => 'password'])
                                </div>

                                <button type="submit" class="form-control btn-success btn" id="form__submit">
                                    Submit
                                </button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection

@push('js')
    <script>
        $('#editUser').validate({
            rules: {
                'name': {
                    required: true,
                },
                'mobile': {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                'address': {
                    required: true,
                },
                'password': {
                    required: true,
                },
            },
            messages: {
                'name': {
                    required: "This field is required.",
                },
                'mobile': {
                    required: "This field is required.",
                },

            },

            submitHandler: function(form) {
                $('#form__submit').prop('disabled', true).html('Submitting Data');
                form.submit();
            }
        });

    </script>
@endpush
