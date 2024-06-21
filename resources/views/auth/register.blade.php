@extends('layouts.app')

@section('title', 'Sign Up')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" id="registrationForm" action="{{ route('register') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="user">
                                <h4 class="my-4">{{ __('Profile Info') }}</h4>

                                <div class="mb-4 row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>

                                    <div class="col-md-6">
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

                                <div class="mb-4 row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required minlength="5" minlength="255"
                                            autocomplete="email">

                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required minlength="6" maxlength="25" autocomplete="new-password">
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" autocomplete="new-password">
                                    </div>
                                </div>
                            </div>

                            <div class="restaurant">
                                <h4 class="my-4">{{ __('Restaurant Info') }}</h4>

                                {{-- Restaurant Name --}}
                                <div class="mb-4 row">
                                    <label for="restaurant_name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>

                                    <div class="col-md-6">
                                        <input id="restaurant_name" type="text"
                                            class="form-control @error('restaurant_name') is-invalid @enderror"
                                            name="restaurant_name" value="{{ old('restaurant_name') }}" required
                                            minlength="2" maxlength="50" autocomplete="restaurant_name" autofocus>

                                        @error('restaurant_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Cousines --}}
                                <div class="mb-3">
                                    <label for="cousines" class="form-label">{{ __('Cousines Type*') }}</label>
                                    <br>
                                    <div class="mb-3 btn-group cousine" role="group" aria-label="cousines"
                                        id="myCheckBox">
                                        @foreach ($cousines as $cousine)
                                            <input name="cousines[]" type="checkbox" class="btn-check"
                                                id="cousine-{{ $cousine->id }}" value="{{ $cousine->id }}">
                                            <label class="btn btn-outline-dark" for="cousine-{{ $cousine->id }}">
                                                {{ $cousine->name }}
                                            </label>
                                        @endforeach

                                    </div>
                                    <div id="cousines-error" class="alert alert-danger" style="display: none;"></div>
                                    @error('cousines')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                                {{-- Restaurant Address --}}
                                <div class="mb-4 row">
                                    <label for="address"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Address*') }}</label>

                                    <div class="col-md-6">
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
                                <div class="mb-4 row">
                                    <label for="telephone_number"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Telephone Number') }}</label>

                                    <div class="col-md-6">
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

                                {{-- Restaurant Logo --}}
                                <div class="mb-4 row">
                                    <label for="logo"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>

                                    <div class="col-md-6">
                                        <input id="logo" type="file"
                                            class="form-control @error('logo') is-invalid @enderror" name="logo"
                                            value="{{ old('logo') }}" autocomplete="logo" autofocus>

                                        @error('logo')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Restaurant P.iva --}}
                                <div class="mb-4 row">
                                    <label for="piva"
                                        class="col-md-4 col-form-label text-md-right">{{ __('VAT*') }}</label>

                                    <div class="col-md-6">
                                        <input id="piva" type="text"
                                            class="form-control @error('piva') is-invalid @enderror" name="piva"
                                            value="{{ old('piva') }}" required autocomplete="piva" autofocus
                                            pattern="[0-9]{11}" title="Please enter exactly 11 digits for P.Iva">

                                        @error('piva')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <p class="text-secondary text-end">* = required fields </p>

                                <div class="mb-4 row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("password-confirm");
        let email = document.getElementById("email")

        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("registrationForm");
            if (form) {
                /* console.log("Form trovato: ", form); */
                form.addEventListener("submit", function(event) {
                    const checkboxes = document.querySelectorAll('input[name="cousines[]"]:checked');
                    const errorDiv = document.getElementById("cousines-error");
                    if (checkboxes.length === 0) {
                        errorDiv.textContent = "Select at least one cousine type.";
                        errorDiv.style.display = "block";
                        event.preventDefault();
                    } else {
                        errorDiv.style.display = "none";
                    }
                });
            }
        });

        // function handleData() {
        //     var form_data = new FormData(document.querySelector("form"));

        //     if (!form_data.has("cousines[]")) {
        //         document.getElementById("chk_option_error").style.visibility = "visible";
        //     } else {
        //         document.getElementById("chk_option_error").style.visibility = "hidden";
        //     }
        //     return false;
        // }


        // const checkboxes = document.querySelectorAll('input[type="checkbox"]');

        // let checkedCount = 0

        // checkboxes.forEach(checkbox => {
        //     checkbox.addEventListener('click', function() {
        //         if (checkbox.checked) {
        //             checkedCount += 1
        //         } else {
        //             checkedCount -= 1
        //         }
        //         console.log(checkedCount);
        //         if (checkedCount === 0) {
        //             checkbox.setCustomValidity("Select one cousine")
        //         }
        //     });
        // });



        // checkboxes.forEach(checkbox => {
        //     checkbox.addEventListener('change', function() {
        //         if (this.checked) {
        //             checkboxes.forEach(cb => {
        //                 if (cb !== this) {
        //                     cb.checked = false;
        //                 }
        //             });
        //         }
        //     });
        // });



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
