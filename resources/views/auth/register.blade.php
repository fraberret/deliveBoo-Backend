@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="user">
                                <h4 class="my-4">{{ __('Profile Info') }}</h4>

                                <div class="mb-4 row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required min="2" max="255"
                                            autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required min="5" max="255"
                                            autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
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
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation"
                                            autocomplete="new-password">
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
                                            min="2" max="255" autocomplete="restaurant_name" autofocus>

                                        @error('restaurant_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Restaurant Address --}}
                                <div class="mb-4 row">
                                    <label for="address"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Address*') }}</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            value="{{ old('address') }}" required minlength="5" autocomplete="address" autofocus>

                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
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
                                            name="telephone_number" value="{{ old('telephone_number') }}" autofocus>
                                            {{-- autocomplete="telephone_number" minlength="13" pattern="^+?[0-9]{13}$" title="Please enter a valid telephone number, starting with + and including prefix and 10 more numbers." --}}
                                           

                                        @error('telephone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
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
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Restaurant P.iva --}}
                                <div class="mb-4 row">
                                    <label for="piva"
                                        class="col-md-4 col-form-label text-md-right">{{ __('P.Iva*') }}</label>

                                    <div class="col-md-6">
                                        <input id="piva" type="text"
                                            class="form-control @error('piva') is-invalid @enderror" name="piva"
                                            value="{{ old('piva') }}" required autocomplete="piva" autofocus>

                                        @error('piva')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
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

            function validatePassword() {
            // let pattern = (?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}

            // if (!pattern.test(password.value)) {
            //     password.setCustomValidity("Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters")
            //     return false
            // }

            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
@endsection
