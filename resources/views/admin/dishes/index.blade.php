@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="my-5 d-flex justify-content-center">
            <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary text-white w-25">Add New Dish</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
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
                                <td>{{ $dish->name }}</td>
                                <td>
                                    @if (Str::startsWith($dish->cover_image, 'https://'))
                                        <img src="{{ $dish->cover_image }}" alt="{{ $dish->name }}" width="100">
                                    @else
                                        <img src="{{ asset('storage/' . $dish->cover_image) }}" alt="{{ $dish->name }}"
                                            width="100">
                                    @endif
                                </td>
                                <td>{{ $dish->price }}€</td>
                                <td>{{ $dish->visible ? 'Visible' : 'Hidden' }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a class="btn btn-primary" href="{{ route('admin.dishes.show', $dish) }}"><i
                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a class="btn btn-success" href="{{ route('admin.dishes.edit', $dish) }}"><i
                                                class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <!-- Modal trigger button -->
                                        <button type="button" class="btn btn-danger btn-m" data-bs-toggle="modal"
                                            data-bs-target="#modal-{{ $dish->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </div>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modal-{{ $dish->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalTitle-{{ $dish->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitle-{{ $dish->id }}">
                                                        Delete dish
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this dish:
                                                    {{ $dish->name }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <form action="{{ route('admin.dishes.destroy', $dish) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            Confirm
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Optional: Place to the bottom of scripts -->

                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr class="">
                            <td scope="row" class="text-center" colspan="5">Nothing found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{ $dishes->links('pagination::bootstrap-5') }}

    </div>
@endsection
