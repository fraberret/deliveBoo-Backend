<section>
    <header>
        <h2 class="text-secondary">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-muted">
            {{ __('Update your profile information and email address.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="mb-2">
            <label for="name">{{ __('Name*') }}</label>
            <input class="form-control" type="text" name="name" id="name" autocomplete="name"
                value="{{ old('name', $user->name) }}" required autofocus>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label for="email">
                {{ __('Email*') }}
            </label>

            <input id="email" name="email" type="email" class="form-control"
                value="{{ old('email', $user->email) }}" required autocomplete="username" />

            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-muted">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="btn btn-outline-dark">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-success">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="mt-5">
            <h2 class="text-secondary">
                {{ __('Restaurant Information') }}
            </h2>

            <p class="mt-1 text-muted">
                {{ __('Update your restaurant information and email address.') }}
            </p>
        </div>

        <div class="mb-2">
            <label for="restaurant_name">{{ __('Restaurant Name*') }}</label>
            <input class="form-control" type="text" name="restaurant_name" id="restaurant_name"
                autocomplete="restaurant_name" value="{{ old('restaurant_name', $user->restaurant->name) }}" required
                minlength="2" maxlength="25" autofocus>
            @error('restaurant_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 overflow-auto">
            <label for="cousines" class="form-label">{{ __('Cousines Type*') }}</label>
            <br>
            <div class="mb-3 btn-group " role="group" aria-label="cousines">
                @foreach ($cousines as $cousine)
                    <input type="checkbox" class="btn-check" name="cousines[]" id="cousine-{{ $cousine->id }}"
                        value="{{ $cousine->id }}" autocomplete="off"
                        @if ($errors->any()) {{ in_array($cousine->id, old('cousines', [])) ? 'checked' : '' }}

                        @else {{ $user->restaurant->cousines->contains($cousine->id) ? 'checked' : '' }} @endif>
                    <label class="btn btn-outline-dark" for="cousine-{{ $cousine->id }}">
                        {{ $cousine->name }}
                    </label>
                @endforeach
            </div>
            @error('cousines')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-2">
            <label for="address">{{ __('Address*') }}</label>
            <input class="form-control" type="text" name="address" id="address" autocomplete="address"
                minlength="5" maxlength="255" value="{{ old('address', $user->restaurant->address) }}" required
                autofocus>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label for="telephone_number">{{ __('Telephone Number') }}</label>
            <input class="form-control" type="text" name="telephone_number" id="telephone_number"
                autocomplete="telephone_number"
                value="{{ old('telephone_number', $user->restaurant->telephone_number) }}" autofocus
                pattern="^\+[0-9]{12}$" title="Telephone number must begin with a + followed by 12 digits.">
            @error('telephone_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2 d-flex mt-3">
            @if (Str::startsWith($user->restaurant->logo, 'https://'))
                <img width="140" src="{{ $user->restaurant->logo }}" alt="">
            @elseif (Str::startsWith($user->restaurant->logo, '/img/'))
                <img width="140" src="{{ asset($user->restaurant->logo) }}" alt="">
            @else
                <img width="140" src="{{ asset('storage/' . $user->restaurant->logo) }}" alt="immagine-di-profilo">
            @endif

            <div class="input_file ms-4">
                <label for="logo">{{ __('Logo') }}</label>
                <input class="form-control" type="file" name="logo" id="logo" autocomplete="logo">
                @error('logo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-2">
            <label for="piva">{{ __('VAT*') }}</label>
            <input class="form-control" type="text" name="piva" id="piva" autocomplete="piva"
                value="{{ old('piva', $user->restaurant->piva) }}" required autofocus pattern="[0-9]{11}"
                title="Please enter exactly 11 digits for P.Iva">
            @error('piva')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <p class="text-secondary text-end">* = required fields </p>

        <div class="d-flex align-items-center gap-4">
            <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <script>
                    const show = true;
                    setTimeout(() => show = false, 2000)
                    const el = document.getElementById('profile-status')
                    if (show) {
                        el.style.display = 'block';
                    }
                </script>
                <p id='profile-status' class="fs-5 text-muted">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
