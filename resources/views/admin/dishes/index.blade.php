@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Course</th>
                    <th scope="col">Availability</th>
                    <th scope="col" colspan="3">Actions</th>
                    {{-- <th scope="col">Image</th> --}}
                </tr>
            </thead>

            <tbody>
                @foreach ($dishes as $dish)
                    <tr>
                        <td>{{ $dish->name }}</td>
                        <td>{{ $dish->description }}</td>
                        <td>{{ $dish->price }} &euro;</td>
                        <td>{{ $dish->course }}</td>
                        <td>{{ $dish->availability }}</td>
                        {{-- <td><a class="btn btn-success" href="{{ route('admin.dishes.show', $dish) }}">Show</a></td> --}}
                        {{-- <td><a class="btn btn-info" href="{{ route('admin.dishes.edit', $dish) }}">Edit</a></td> --}}
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col">
                {{ $dishes->links() }}
            </div>
        </div>
    </div>
@endsection
