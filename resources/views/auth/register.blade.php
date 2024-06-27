@extends('layouts.app')

@section('title', 'Sign Up')

@section('content')
    <div class="container">

        <form method="POST" class="register_form" id="registrationForm" action="{{ route('register') }}"
            enctype="multipart/form-data" style="max-width: 1140px">
            @csrf

            <div class="top">
                <div class="title">
                    <h5>{{ __('User Info') }}</h5>
                    <hr>
                    <img src="{{ asset('img/logo-emblem.png') }}" alt="">
                </div>

                <div class="inputs">

                    <div class="row row-cols-md-2">
                        <div class="form_input">
                            <label for="name" class="col-form-label text-md-right">{{ __('Name*') }}</label>

                            <div>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required pattern="^[A-Za-z0-9 ]+$"
                                    title="Only alphanumeric characters and spaces are allowed" minlength="2"
                                    minlength="255" autocomplete="name" autofocus>

                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form_input">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                            <div>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required minlength="5" minlength="255"
                                    autocomplete="email">

                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form_input">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password*') }}</label>

                            <div>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    minlength="6" maxlength="25" autocomplete="new-password">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form_input">
                            <label for="password-confirm"
                                class="col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                            <div>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>
                    </div>


                    <div class="title">
                        <h5>{{ __('Restaurant Info') }}</h5>
                        <hr>
                        <img src="{{ asset('img/logo-emblem.png') }}" alt="">
                    </div>

                    <div class="row row-cols-md-2">
                        <div class="d-flex flex-column">
                            {{-- Restaurant Name --}}
                            <div class="form_input">
                                <label for="restaurant_name"
                                    class="col-form-label text-md-right">{{ __('Name*') }}</label>

                                <div>
                                    <input id="restaurant_name" type="text"
                                        class="form-control @error('restaurant_name') is-invalid @enderror"
                                        name="restaurant_name" value="{{ old('restaurant_name') }}" required minlength="2"
                                        maxlength="50" autocomplete="restaurant_name" autofocus>

                                    @error('restaurant_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Restaurant Address --}}
                            <div class="form_input">
                                <label for="address" class="col-form-label text-md-right">{{ __('Address*') }}</label>

                                <div>
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required minlength="5" maxlength="255"
                                        autocomplete="address" autofocus>

                                    @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Restaurant Telephone number --}}
                            <div class="form_input">
                                <label for="telephone_number"
                                    class="col-form-label text-md-right">{{ __('Telephone Number') }}</label>

                                <div>
                                    <input id="telephone_number" type="tel"
                                        class="form-control @error('telephone_number') is-invalid @enderror"
                                        name="telephone_number" value="{{ old('telephone_number') }}" autofocus
                                        pattern="^\+[0-9]{12}$"
                                        title="Telephone number must begin with a + followed by 12 digits.">

                                    @error('telephone_number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Restaurant P.iva --}}
                            <div class="form_input">
                                <label for="piva" class="col-form-label text-md-right">{{ __('VAT*') }}</label>

                                <div>
                                    <input id="piva" type="text"
                                        class="form-control @error('piva') is-invalid @enderror" name="piva"
                                        value="{{ old('piva') }}" required autocomplete="piva" autofocus
                                        pattern="[0-9]{11}" title="Please enter exactly 11 digits for P.Iva">

                                    @error('piva')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column">
                            {{-- Restaurant Logo --}}
                            <div class="form_input_file">
                                <label for="logo" class="col-form-label text-md-right">{{ __('Logo') }}</label>

                                <div>
                                    <input id="logo" type="file"
                                        class="form-control @error('logo') is-invalid @enderror" name="logo"
                                        value="{{ old('logo') }}" autocomplete="logo" autofocus>

                                    @error('logo')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Cousines --}}
                            <label for="cousines" class="form-label custom_label">{{ __('Cousines Type*') }}</label>
                            <div class="form_input_checkGroup h-100">
                                <div class="d-flex flex-wrap " role="group" aria-label="cousines" id="myCheckBox">
                                    @foreach ($cousines as $cousine)
                                        <input name="cousines[]" type="checkbox" class="btn-check" required
                                            id="cousine-{{ $cousine->id }}" value="{{ $cousine->id }}">
                                        <label class="btn btn-outline-light rounded-5 "
                                            for="cousine-{{ $cousine->id }}">
                                            {{ $cousine->name }}
                                        </label>
                                    @endforeach

                                </div>
                                <div id="validation-error" class="text-danger"></div>
                                <div id="cousines-error" class="alert alert-danger" style="display: none;"></div>
                                @error('cousines')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                    </div>

                </div>

                <div class="bottom">
                    <div class="already">
                        <a href="{{ route('login') }}">
                            {{ __('Already have an account?') }}</a>

                        <div class="required_fields d-flex align-items-start">
                            <span>* </span>
                            <h5> required fields</h5>
                        </div>
                    </div>

                    <button type="submit" class="border-0 btn_primary">
                        <img class="me-2" src="{{ asset('img/icons/login.png') }}"
                            alt="user icon">{{ __('Register') }}
                    </button>
                </div>
        </form>




    </div>

    <script>
        var password = document.getElementById("password")
        let confirm_password = document.getElementById("password-confirm");
        let email = document.getElementById("email")
        const checkboxes = document.querySelectorAll('input[name="cousines[]"]');

        let checkedBoxes = 0

        function updateRequiredAttribute() {
            checkboxes.forEach(checkbox => {
                if (checkedBoxes > 0) {
                    checkbox.removeAttribute('required');
                    checkbox.setCustomValidity('');

                } else {
                    checkbox.setAttribute('required', 'required');
                    checkbox.setCustomValidity('Please select at least one option.');
                }
            });
        };

        checkboxes.forEach(check => {
            check.setCustomValidity('Please select at least one option.');

            check.addEventListener('change', () => {
                if (check.checked) {
                    checkedBoxes++;
                } else {
                    checkedBoxes--;
                }
                updateRequiredAttribute();
            });
        });


        function validatePassword() {

            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        function validateEmail() {
            let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (emailPattern.test(email.value)) {
                email.setCustomValidity("");
            } else {
                email.setCustomValidity("Please enter a valid email address");
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

        email.onchange = validateEmail;
        email.onkeyup = validateEmail;
    </script>

@endsection
