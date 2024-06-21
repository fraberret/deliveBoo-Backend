@extends('layouts.admin')

@section('title', "Edit $dish->name")

@section('content')
    <div class="container my-5">
        <form action="{{ route('admin.dishes.update', $dish) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Name*') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    value="{{ old('name', $dish->name) }}" minlength="5" maxlength="100" />
                @error('name')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 d-flex align-items-center">
                <div class="me-3 ">
                    @if (Str::startsWith($dish->cover_image, 'https://'))
                        <img class="rounded-circle" width="140" src="{{ $dish->cover_image }}"
                            alt="{{ $dish->name }} image">
                    @elseif (Str::startsWith($dish->cover_image, '/img'))
                        <img class="rounded-circle" width="140" src="{{ asset($dish->cover_image) }}"
                            alt="{{ $dish->name }} image">
                    @else
                        <img class="rounded-circle" width="140" src="{{ asset('storage/' . $dish->cover_image) }}"
                            alt="{{ $dish->name }} image">
                    @endif
                </div>

                <div class="flex-grow-1">
                    <label for="cover_image" class="form-label">{{ __('Cover Image') }}</label>
                    <input type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image"
                        id="cover_image" />
                    @error('cover_image')
                        <div class="text-danger py-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">{{ __('Price*') }}</label>
                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                    name="price" id="price" min='0' value="{{ old('price', $dish->price) }}" />
                @error('price')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 d-flex gap-3">
                <label for="visible" class="form-label">{{ __('Visible') }}</label>
                <div class="form-check form-switch">
                    <input type="hidden" name="visible" value="0">
                    <input class="form-check-input" type="checkbox" name="visible" id="visible" value="1"
                        {{ old('visible', $dish->visible) ? 'checked' : '' }}>
                    @error('visible')
                        <div class="text-danger py-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">{{ __('Description') }}</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    rows="5" minlength="5" maxlength="1000">{{ old('description', $dish->description) }}</textarea>
                @error('description')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ingredients" class="form-label">{{ __('Ingredients') }}</label>

                <textarea class="form-control @error('ingredients') is-invalid @enderror" minlength="5" maxlength="1000"
                    name="ingredients" id="ingredients" rows="5" minlength="5" maxlength="1000">{{ old('ingredients', $dish->ingredients) }}</textarea>

                @error('ingredients')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <p class="text-secondary text-end">* = required fields </p>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.dishes.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check" aria-hidden="true"></i> Save
                </button>
            </div>

        </form>
    </div>
@endsection
