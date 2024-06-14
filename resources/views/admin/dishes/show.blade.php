@extends('layouts.admin')

@section('content')
    <div class="container d-flex mt-3">
        <div class="col-6">
            @if (Str::startsWith($dish->cover_image, 'https://'))
                <img src="{{ $dish->cover_image }}" alt="">
            @else
                <img src="{{ asset('storage/' . $dish->cover_image) }}" alt="">
            @endif
        </div>
        <div class="col-6">
            <div class="metaData">
                <div><strong>Name:</strong> {{ $dish->name }}</div>
                <p>{{ $dish->description }}</p>
                <div><strong>Price:</strong> {{ $dish->price }}</div>
                <div><strong>Visible:</strong> {{ $dish->visible ? '✔' : '❌' }}</div>

            </div>
        </div>
    </div>
@endsection
