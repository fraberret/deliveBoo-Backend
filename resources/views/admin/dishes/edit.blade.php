@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <form action="{{ route('admin.dishes.update', $dish) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    value="{{ old('name', $dish->name) }}" />
                @error('name')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 d-flex align-items-center">
                <div class="me-3">
                    @if (Str::startsWith($dish->cover_image, 'https://'))
                        <img width="140" src="{{ $dish->cover_image }}" alt="{{ $dish->name }}"
                            class="img-fluid rounded">
                    @else
                        <img width="140" src="{{ asset('storage/' . $dish->cover_image) }}" alt="{{ $dish->name }}"
                            class="img-fluid rounded">
                    @endif
                </div>
                <div class="flex-grow-1">
                    <label for="cover_image" class="form-label">Cover Image</label>
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
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                    name="price" id="price" value="{{ old('price', $dish->price) }}" />
                @error('price')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="visible" class="form-label">Visible</label>
                <select class="form-select form-select-sm" name="visible" id="visible">
                    <option disabled>Select one</option>
                    <option {{ '1' == old('visible') ? 'selected' : '' }} value="1">True</option>
                    <option {{ $dish->visible == old('visible') ? 'selected' : '' }} value="0">False</option>
                </select>
                @error('visible')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    rows="5">{{ old('description', $dish->description) }}</textarea>
                @error('description')
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
                    <i class="fa fa-check" aria-hidden="true"></i> Save
                </button>
            </div>

        </form>
    </div>
@endsection
