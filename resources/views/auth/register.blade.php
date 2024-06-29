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

                        {{-- NAME  --}}
                        <div class="form_input">
                            <label for="name" class="col-form-label text-md-right">{{ __('Name*') }}</label>
                            <div>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required pattern="^[A-Za-z0-9 ]+$"
                                    title="Only alphanumeric characters and spaces are allowed" minlength="2"
                                    maxlength="255" autocomplete="name" autofocus>

                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="custom_error name_error"></div>
                            </div>
                        </div>
                        {{-- EMAIL --}}
                        <div class="form_input">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                            <div>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required minlength="5" maxlength="255"
                                    autocomplete="email">

                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="custom_error email_error"></div>
                            </div>
                        </div>

                        {{-- PASSWORD --}}
                        <div class="form_input">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password*') }}</label>
                            <div>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    minlength="8" maxlength="25" autocomplete="new-password">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="custom_error password_error"></div>
                            </div>
                        </div>
                        {{-- PASSWORD CONFIRM --}}
                        <div class="form_input">
                            <label for="password-confirm"
                                class="col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                            <div>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="custom_error confirm_password_error"></div>
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
                                    class="col-form-label text-md-right">{{ __('Restaurant Name*') }}</label>

                                <div>
                                    <input id="restaurant_name" type="text"
                                        class="form-control @error('restaurant_name') is-invalid @enderror"
                                        name="restaurant_name" value="{{ old('restaurant_name') }}" required minlength="2"
                                        maxlength="50" autocomplete="restaurant_name" autofocus>

                                    @error('restaurant_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="custom_error restaurant_name_error"></div>

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
                                    <div class="custom_error address_error"></div>

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
                                        pattern="[0-9]{11}" title="Please enter exactly 11 digits for VAT (P.Iva)">

                                    @error('piva')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="custom_error vat_error"></div>

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
                                <div class="custom_error cousines_error"></div>

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
        const name = document.getElementById('name')
        const email = document.getElementById("email")
        const password = document.getElementById("password")
        const confirm_password = document.getElementById("password-confirm");
        const restaurantName = document.getElementById("restaurant_name");
        const address = document.getElementById("address");
        const vat = document.getElementById("piva");
        const cousines = document.querySelector(".form_input_checkGroup ");


        document.querySelector('button[type="submit"]').addEventListener('click', (event) => {
            //     validateName()
            //     validateEmail()
            //     validatePassword()
            //     confirmPassword()
            //     validateRestaurantName()
            //     validateAddress()
            //     validateVat()
            //     updateRequiredAttribute();
            // }

            if (validateName()) {
                if (validateEmail()) {
                    if (validatePassword()) {
                        if (confirmPassword()) {
                            if (validateRestaurantName()) {
                                if (validateAddress()) {
                                    if (validateVat()) {
                                        updateRequiredAttribute();
                                    }
                                }
                            }
                        }
                    }
                }
            }
        });

        const nameError = document.querySelector('.custom_error.name_error');
        const emailError = document.querySelector('.custom_error.email_error');
        const passwordError = document.querySelector('.custom_error.password_error');
        const confirmPasswordError = document.querySelector('.custom_error.confirm_password_error');
        const restaurantNameError = document.querySelector('.custom_error.restaurant_name_error');
        const addressError = document.querySelector('.custom_error.address_error');
        const vatError = document.querySelector('.custom_error.vat_error');
        const cousinesError = document.querySelector('.custom_error.cousines_error');


        function validateName() {
            if (name.validity.valueMissing) {
                nameError.textContent = 'Name is required.';
                name.style.borderColor = '#fb4848'
                nameError.style.display = 'block';
                return false;
            } else if (name.validity.patternMismatch) {
                nameError.textContent = 'Only alphanumeric characters and spaces are allowed.';
                name.style.borderColor = '#fb4848'
                nameError.style.display = 'block';
                return false;
            } else if (name.validity.tooShort || name.validity.tooLong) {
                nameError.textContent = 'Name must be between 2 and 255 characters.';
                name.style.borderColor = '#fb4848'
                nameError.style.display = 'block';
                return false;
            } else {
                name.style.borderColor = ''
                nameError.style.display = 'none';
                return true;
            }
        }

        function validateEmail() {
            let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (email.validity.valueMissing) {
                emailError.textContent = 'Email is required.';
                email.style.borderColor = '#fb4848'
                emailError.style.display = 'block';
                return false;
            } else if (!emailPattern.test(email.value)) {
                emailError.textContent = 'Please enter a valid email address.';
                email.style.borderColor = '#fb4848'
                emailError.style.display = 'block';
                return false;
            } else if (email.validity.tooShort || email.validity.tooLong) {
                emailError.textContent = 'Email must be between 5 and 255 characters.';
                email.style.borderColor = '#fb4848'
                emailError.style.display = 'block';
                return false;
            } else {
                email.style.borderColor = ''
                emailError.style.display = 'none';
                return true;
            }
        }

        function validatePassword() {
            if (password.validity.valueMissing) {
                passwordError.textContent = 'Password is required.';
                password.style.borderColor = '#fb4848'
                passwordError.style.display = 'block';
                return false;
            } else if (password.validity.tooShort || password.validity.tooLong) {
                passwordError.textContent = 'Password must be between 8 and 25 characters.';
                password.style.borderColor = '#fb4848'
                passwordError.style.display = 'block';
                return false;
            } else {
                password.style.borderColor = ''
                passwordError.style.display = 'none';
                return true;
            }
        }

        function confirmPassword() {
            if (confirm_password.validity.valueMissing) {
                confirmPasswordError.textContent = 'This field is required.';
                confirm_password.style.borderColor = '#fb4848'
                confirmPasswordError.style.display = 'block';
                return false;
            } else if (password.value !== confirm_password.value) {
                confirmPasswordError.textContent = "Password doesn't match.";
                confirm_password.style.borderColor = '#fb4848'
                confirmPasswordError.style.display = 'block';
                return false;
            } else {
                confirm_password.style.borderColor = ''
                confirmPasswordError.style.display = 'none';
                return true;
            }
        }

        function validateRestaurantName() {
            if (restaurantName.validity.valueMissing) {
                restaurantNameError.textContent = 'A restaurant name is required.';
                restaurantName.style.borderColor = '#fb4848'
                restaurantNameError.style.display = 'block';
                return false;
            } else if (restaurantName.validity.tooShort || restaurantName.validity.tooLong) {
                restaurantNameError.textContent = 'Name must be between 2 and 50 characters.';
                restaurantName.style.borderColor = '#fb4848'
                restaurantNameError.style.display = 'block';
                return false;
            } else {
                restaurantName.style.borderColor = ''
                restaurantNameError.style.display = 'none';
                return true;
            }
        }

        function validateAddress() {
            if (address.validity.valueMissing) {
                addressError.textContent = 'The address is required.';
                address.style.borderColor = '#fb4848'
                addressError.style.display = 'block';
                return false;
            } else if (address.validity.tooShort || address.validity.tooLong) {
                addressError.textContent = 'address must be between 5 and 255 characters.';
                address.style.borderColor = '#fb4848'
                addressError.style.display = 'block';
                return false;
            } else {
                address.style.borderColor = ''
                addressError.style.display = 'none';
                return true;
            }
        }

        function validateVat() {
            if (vat.validity.valueMissing) {
                vatError.textContent = 'Vat required.';
                vat.style.borderColor = '#fb4848'
                vatError.style.display = 'block';
                return false;
            } else if (vat.validity.patternMismatch) {
                vatError.textContent = 'Please enter exactly 11 digits for VAT.';
                vat.style.borderColor = '#fb4848'
                vatError.style.display = 'block';
                return false;
            } else {
                vat.style.borderColor = ''
                vatError.style.display = 'none';
                return true;
            }
        }

        const checkboxes = document.querySelectorAll('input[name="cousines[]"]');

        let checkedBoxes = 0;

        function updateRequiredAttribute() {
            checkboxes.forEach(checkbox => {
                if (checkedBoxes > 0) {
                    checkbox.removeAttribute('required');
                    checkbox.setCustomValidity('');
                    cousines.style.borderColor = ''
                    cousinesError.style.display = 'none';
                } else {
                    checkbox.setAttribute('required', 'required');
                    checkbox.setCustomValidity('Please select at least one option.');
                    cousinesError.textContent = 'Please select at least one option.';
                    cousines.style.borderColor = '#fb4848'
                    cousinesError.style.display = 'block';
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
    </script>

@endsection
