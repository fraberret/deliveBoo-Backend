@extends('layouts.admin')

@section('title', 'Create New Dish')

@section('content')
    <div class="container my-5">
        <form action="{{ route('admin.dishes.store') }}" method="post" enctype="multipart/form-data" class="large_form"
            style="max-width: 1140px">
            @csrf
            <div class="top">
                <div class="title">
                    <h5>{{ __('Create New Dish') }}</h5>
                    <hr style="width: 60%">
                    <img src="{{ asset('img/logo-emblem.png') }}" alt="">
                </div>
                <div class="inputs">
                    <div class="form_input">
                        <label for="name" class="form-label">{{ __('Name*') }}</label>
                        <input type="text" class="form-control form-control @error('name') is-invalid @enderror"
                            name="name" id="name" value="{{ old('name') }}" minlength="2" maxlength="100"
                            required />

                        @error('name')
                            <div class="text-danger py-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="custom_error name_error"></div>
                    </div>

                    <div class="form_input">
                        <label for="cover_image" class="form-label">{{ __('Cover Image') }}</label>
                        <div class="custom-file-input-wrapper d-flex align-items-center gap-3">
                            <input type="file" class="form-control @error('cover_image') is-invalid @enderror"
                                name="cover_image" id="cover_image" />
                            <label for="cover_image" class="btn btn-primary custom-file-label">
                                Choose file
                            </label>
                            <span id="file-name" class="file-name">No file chosen</span>
                        </div>
                        @error('cover_image')
                            <div class="text-danger py-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <script>
                        document.getElementById('cover_image').addEventListener('change', function() {
                            var fileName = this.files[0].name;
                            document.getElementById('file-name').textContent = fileName;
                        });
                    </script>

                    <div class="form_input">
                        <label for="price" class="form-label">{{ __('Price*') }}</label>
                        <input type="number" step="1.00"
                            class="form-control form-control @error('price') is-invalid @enderror" name="price"
                            id="price" value="{{ old('price') }}" min="0" required />
                        @error('price')
                            <div class="text-danger py-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="custom_error price_error"></div>
                    </div>

                    <div class="form_input mb-5 d-flex align-items-center gap-3">
                        <label for="visible" style="padding-bottom: 0;"
                            class="d-flex align-items-center">{{ __('Visible') }}</label>
                        <div class="form-check form-switch">
                            <input style="height: 29px;" class="form-check-input" type="checkbox" name="visible"
                                id="visible" value="1" {{ old('visible') ? 'checked' : '' }}>
                        </div>
                        @error('visible')
                            <div class="text-danger py-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form_input">
                        <label for="description" class="form-label">{{ __('Description') }}</label>
                        <textarea class="form-control form-control @error('description') is-invalid @enderror" minlength="5" maxlength="1000"
                            name="description" id="description" rows="5">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger py-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form_input">
                        <label for="ingredients" class="form-label">{{ __('Ingredients') }}</label>
                        <textarea class="form-control form-control @error('ingredients') is-invalid @enderror" minlength="5" maxlength="1000"
                            name="ingredients" id="ingredients" rows="5">{{ old('ingredients') }}</textarea>
                        @error('ingredients')
                            <div class="text-danger py-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="check_flex">
                        <div></div>
                        <div class="d-flex align-items-end">
                            <span>* </span>
                            <h5> required fields</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <a href="{{ route('admin.dishes.index') }}" class="border-0 btn_dark gap-2 text-decoration-none">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                </a>
                <button type="submit" class="border-0 btn_primary gap-2">
                    <i class="fa fa-floppy-disk" aria-hidden="true"></i> Save
                </button>
            </div>
        </form>
    </div>


    <script>
        const name = document.getElementById('name');
        const price = document.getElementById('price')

        document.querySelector('button[type="submit"]').addEventListener('click', (event) => {

            if (validateName()) {
                if (validatePrice()) {
                    updateRequiredAttribute();
                }
            }

        });
        const nameError = document.querySelector('.custom_error.name_error');
        const priceError = document.querySelector('.custom_error.price_error');


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

        function validatePrice() {
            if (price.validity.valueMissing) {
                priceError.textContent = 'Price is required.';
                price.style.borderColor = '#fb4848'
                priceError.style.display = 'block';
                return false;
            } else if (price.validity.rangeUnderflow) {
                priceError.textContent = 'Only positive numbers are allowed.';
                price.style.borderColor = '#fb4848'
                priceError.style.display = 'block';
                return false;
            } else {
                price.style.borderColor = ''
                priceError.style.display = 'none';
                return true;
            }
        }
    </script>
@endsection
