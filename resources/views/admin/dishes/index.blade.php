@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="banner">
            <div class="text">
                <h6>all dishes</h6>
                <h2>Manage your dishes here!</h2>
            </div>
            <div class="actions">
                <a href="{{ route('admin.dishes.create') }}" class="btn">Add New Dish</a>
            </div>
        </div>
        <div class="dishes">
            <div class="cols_heading">
                <div class="image"></div>
                <div class="name">Name</div>
                <div class="price">Price</div>
                <div class="visible">Visibility</div>
                <div class="actions"></div>
            </div>
            <div class="rows">
                @forelse ($dishes as $dish)
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
                                @endif
                            </div>
                        </div>
                        <div class="name">{{ $dish->name }}</div>
                        <div class="price">
                            @if ($dish->price)
                                {{ $dish->price }} &#8364;
                            @else
                                <span>add a price...</span>
                            @endif
                        </div>
                        <div class="visible">
                            @if ($dish->visible)
                                <div class="visible_circle"></div>
                            @else
                                <div class="non_visible_circle"></div>
                            @endif
                        </div>
                        <div class="actions">
                            <a href="{{ route('admin.dishes.show', $dish) }}"><img width="23"
                                    src="{{ asset('img/icons/eye.png') }}" alt="eye icon"></a>
                            <a href="{{ route('admin.dishes.edit', $dish) }}"><img width="22"
                                    src="{{ asset('img/icons/edit.png') }}" alt="edit icon"></a>
                            <!-- Modal Trigger -->
                            <a type="button" data-bs-toggle="modal" data-bs-target="#modal-{{ $dish->id }}">
                                <img width="21" src="{{ asset('img/icons/trash.png') }}" alt="trash icon">
                            </a>
                            {{-- Modal --}}
                            @include('admin.partials.delete-modal')
                        </div>
                    </div>
                @empty
                    <div class="no_dishes">
                        No Dishes To Show...
                    </div>
                @endforelse
            </div>
            <div class="bottom">
                <div class="pagination">
                    {{ $dishes->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
