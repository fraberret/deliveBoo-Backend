@extends('layouts.admin')

@section('title', 'Create New Dish')

@section('content')
    <div class="container my-5">
        <form action="{{ route('admin.dishes.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Name*') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    value="{{ old('name') }}" />
                @error('name')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label">{{ __('Cover Image') }}</label>
                <input type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image"
                    id="cover_image" />
                @error('cover_image')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">{{ __('Price') }}</label>
                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                    name="price" id="price" value="{{ old('price') }}" />
                @error('price')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 d-flex gap-3">
                <label for="visible" class="form-label">{{ __('Visible') }}</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="visible" id="visible" value="1"
                        {{ old('visible') ? 'checked' : '' }}>
                </div>
                @error('visible')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="description" class="form-label">{{ __('Description') }}</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ingredients" class="form-label">{{ __('Ingredients') }}</label>
                <input type="text" class="form-control @error('ingredients') is-invalid @enderror" name="ingredients"
                    id="ingredients" value="{{ old('ingredients') }}" />
                @error('ingredients')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.dishes.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check" aria-hidden="true"></i> Create
                </button>
            </div>

        </form>
    </div>
@endsection
