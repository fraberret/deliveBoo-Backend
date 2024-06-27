@extends('layouts.admin')

@section('title', "Edit $dish->name")

@section('content')
    <div class="container">
        <form action="{{ route('admin.dishes.update', $dish) }}" method="post" enctype="multipart/form-data" class="large_form"
            style="max-width: 1140px">
            @csrf
            @method('PUT')

            <div class="top">
                <div class="title">
                    <h5>{{ __('Edit Dish') }}</h5>
                    <hr style="width: 70%">
                    <img src="{{ asset('img/logo-emblem.png') }}" alt="">
                </div>
                <div class="inputs">
                    <div class="form_input">
                        <label for="name" class="form-label">{{ __('Name*') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" value="{{ old('name', $dish->name) }}" minlength="5" maxlength="100" />
                        @error('name')
                            <div class="text-danger py-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form_input d-flex align-items-center mb-3 mt-5">
                        <div class="me-3" style="width: 140px; aspect-ratio: 1;">
                            @if (Str::startsWith($dish->cover_image, 'https://'))
                                <img class="rounded-circle" style="max-width: 100%; object-fit: cover; height: 100%;"
                                    src="{{ $dish->cover_image }}" alt="{{ $dish->name }} image">
                            @elseif (Str::startsWith($dish->cover_image, '/img'))
                                <img class="rounded-circle" style="max-width: 100%; object-fit: cover; height: 100%;"
                                    src="{{ asset($dish->cover_image) }}" alt="{{ $dish->name }} image">
                            @else
                                <img class="rounded-circle" style="max-width: 100%; object-fit: cover; height: 100%;"
                                    src="{{ asset('storage/' . $dish->cover_image) }}" alt="{{ $dish->name }} image">
                            @endif
                        </div>

                        <div style="margin-top: 0;" class="form_input">
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
                    </div>
                    <script>
                        document.getElementById('cover_image').addEventListener('change', function() {
                            var fileName = this.files[0].name;
                            document.getElementById('file-name').textContent = fileName;
                        });
                    </script>

                    <div class="form_input">
                        <label for="price" class="form-label">{{ __('Price*') }}</label>
                        <input type="number" step="1.00" class="form-control @error('price') is-invalid @enderror"
                            name="price" id="price" min='0' value="{{ old('price', $dish->price) }}" />
                        @error('price')
                            <div class="text-danger py-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form_input mb-5 d-flex align-items-center gap-3">
                        <label style="padding-bottom: 0;" for="visible"
                            class="d-flex align-items-center">{{ __('Visible') }}</label>
                        <div class="form-check form-switch">
                            <input type="hidden" name="visible" value="0">
                            <input style="height: 29px;" class="form-check-input" type="checkbox" name="visible"
                                id="visible" value="1" {{ old('visible', $dish->visible) ? 'checked' : '' }}>
                            @error('visible')
                                <div class="text-danger py-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form_input">
                        <label for="description" class="form-label">{{ __('Description') }}</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                            rows="5" minlength="5" maxlength="1000">{{ old('description', $dish->description) }}</textarea>
                        @error('description')
                            <div class="text-danger py-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form_input">
                        <label for="ingredients" class="form-label">{{ __('Ingredients') }}</label>

                        <textarea class="form-control @error('ingredients') is-invalid @enderror" minlength="5" maxlength="1000"
                            name="ingredients" id="ingredients" rows="5" minlength="5" maxlength="1000">{{ old('ingredients', $dish->ingredients) }}</textarea>

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
                    <i class="fa fa-check" aria-hidden="true"></i> Save
                </button>
            </div>

        </form>
    </div>
@endsection
