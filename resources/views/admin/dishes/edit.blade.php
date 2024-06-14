@extends('layouts.admin')

@section('content')
    <div class="container">
        <form action="{{ route('admin.dishes.update', $dish) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    value="{{ old('name', $dish->name) }}" />
                @error('name')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 d-flex">
                @if (Str::startsWith($dish->cover_image, 'https://'))
                    <img width="140" src="{{ $dish->cover_image }}" alt="">
                @else
                    <img width="140" src="{{ asset('storage/' . $dish->cover_image) }}" alt="">
                @endif
                <div class="metaData">
                    <label for="cover_image" class="form-label">cover_image:</label>
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
                {{-- <input type="checkbox" class="form-check-input" id="visible" name="visible"
                {{ old('visible') ? 'checked' : '' }} value="true">
            <label class="form-check-label" for="visible">Visible</label>
            @error('visible')
                <div class="text-danger py-2">
                    {{ $message }}
                </div>
            @enderror --}}

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

            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    rows="5">{{ old('description', $dish->description) }}</textarea>
                @error('description')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Edit
            </button>

        </form>
    </div>
@endsection
