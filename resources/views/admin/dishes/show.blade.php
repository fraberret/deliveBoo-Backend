@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="my-5 d-flex justify-content-center">
            <a href="{{ route('admin.dishes.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
            </a>
        </div>
        <div class="row">
            <div class="col-md-6">
                @if (Str::startsWith($dish->cover_image, 'https://'))
                    <img src="{{ $dish->cover_image }}" alt="{{ $dish->name }}" class="img-fluid rounded">
                @else
                    <img src="{{ asset('storage/' . $dish->cover_image) }}" alt="{{ $dish->name }}"
                        class="img-fluid rounded">
                @endif
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Name:</strong> {{ $dish->name }}</h5>
                        <p class="card-text">{{ $dish->description }}</p>
                        <p class="card-text"><strong>Price:</strong> {{ $dish->price }}€</p>
                        <p class="card-text"><strong>Visible:</strong> {{ $dish->visible ? '✔' : '❌' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
