@extends('layouts.admin')

@section('title', "$dish->name")

@section('content')
    <div class="container">
        <div class="banner">
            <div class="text">
                <h6>dish</h6>
                <h2>
                    {{ $dish->name }}
                </h2>
            </div>
            <div class="actions single_dish">
                <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn edit">
                    <img class="white_icon" width="22" src="{{ asset('img/icons/edit.png') }}" alt="edit icon">
                    <img class="purple_icon" width="22" src="{{ asset('img/icons/edit-purple.png') }}" alt="edit icon">
                    <span>Edit</span>
                </a>
                {{-- modal trigger --}}
                <a type="button" class="btn delete" data-bs-toggle="modal" data-bs-target="#modal-{{ $dish->id }}">
                    <img width="21" src="{{ asset('img/icons/trash.png') }}" alt="trash icon">
                    <span>Delete</span>
                </a>
            </div>
        </div>
        {{-- modal --}}
        @include('admin.partials.delete-modal')

        <div class="dish_card">
            <div class="dish">
                <div class="image">
                    <div class="image_circle">
                        @if ($dish->cover_image)
                            @if (Str::startsWith($dish->cover_image, 'https://'))
                                <img src="{{ $dish->cover_image }}" alt="cover image">
                            @elseif (Str::startsWith($dish->cover_image, '/img'))
                                <img src="{{ asset($dish->cover_image) }}" alt="cover image">
                            @else
                                <img src="{{ asset('storage/' . $dish->cover_image) }}" alt="cover image">
                            @endif
                        @else
                            <img src="{{ asset('img/default.png') }}" alt="cover image">
                        @endif
                    </div>
                    @if ($dish->price)
                        <div class="price_circle">
                            <div class="price">
                                <h7> {{ $dish->price }}</h7>
                                <span> &#8364;</span>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="text">
                    <div class="description">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>description:</h6>

                            <a class="btn btn-light goback_btn" href="{{ route('admin.dishes.index') }}">
                                <img src="{{ asset('img/icons/go-back.png') }}" alt="">
                            </a>

                        </div>
                        <p>
                            {{ $dish->description }}
                        </p>
                    </div>
                    <div class="visible">
                        @if ($dish->visible)
                            <div class="visible_circle"></div>
                            <small>Visible Online</small>
                        @else
                            <div class="non_visible_circle"></div>
                            <small>Not Visible Online...</small>
                        @endif
                    </div>
                    <div class="info_box">
                        <div class="restaurant">
                            <div class="restaurant_image">
                                @if (Str::startsWith($restaurant->logo, 'https://'))
                                    <img src="{{ $restaurant->logo }}" alt="">
                                @elseif (Str::startsWith($restaurant->logo, '/img/'))
                                    <img src="{{ asset($restaurant->logo) }}" alt="">
                                @else
                                    <img src="{{ asset('storage/' . $restaurant->logo) }}" alt="">
                                @endif
                            </div>
                            <div class="restaurant_text">
                                <small>Restaurant</small>
                                <h6>{{ $restaurant->name }}</h6>
                            </div>
                        </div>
                        <div class="ratings">
                            {{-- <div class="stars">
                                <img src="{{ asset('img/star-full.png') }}" alt="">
                                <img src="{{ asset('img/star-full.png') }}" alt="">
                                <img src="{{ asset('img/star-full.png') }}" alt="">
                                <img src="{{ asset('img/star-full.png') }}" alt="">
                                <img src="{{ asset('img/star-empty.png') }}" alt="">
                            </div>
                            <small>4.8</small> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="ingredients">
                    <h6>ingredients:</h6>
                    <p>{{ $dish->ingredients }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
