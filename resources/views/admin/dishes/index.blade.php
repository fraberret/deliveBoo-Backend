@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-secondary">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Cover Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Visibility</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($dishes)
                        @foreach ($dishes as $dish)
                            <tr class="">
                                <td scope="row">{{ $dish->name }}</td>
                                <td>
                                    @if (Str::startsWith($dish->cover_image, 'https://'))
                                        <img src="{{ $dish->cover_image }}" alt="" width="100">
                                    @else
                                        <img src="{{ asset('storage/' . $dish->cover_image) }}" alt=""
                                            width="100">
                                    @endif
                                </td>
                                <td>{{ $dish->price }}</td>
                                <td>{{ $dish->visible }}</td>
                                <td>Edit/View/Delete</td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="">
                            <td scope="row" colspan="5">Nothing found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{ $dishes->links('pagination::bootstrap-5') }}

    </div>
@endsection
