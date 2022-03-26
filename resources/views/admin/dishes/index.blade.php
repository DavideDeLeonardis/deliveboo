@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row mt-3 mb-2">
            <div class="col d-flex justify-content-center">
                <a class="btn btn-primary" href="{{ route('admin.dishes.create') }}">Aggiungi Nuovo Piatto</a>
            </div>
        </div>

        <table class="table table-dark table-bordered border-white table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Portata</th>
                    <th scope="col">Disponibilità</th>
                    <th scope="col" colspan="3">Azioni</th>
                    {{-- <th scope="col">Image</th> --}}
                </tr>
            </thead>

            <tbody>
                @foreach ($dishes as $dish)
                    {{-- @if (Auth::user()->id == $dish->user_id) --}}
                    <tr>
                        <td>{{ $dish->name }}</td>
                        <td>{{ $dish->description }}</td>
                        <td>{{ $dish->price }} &euro;</td>
                        <td>{{ $dish->course }}</td>
                        <td>{{ $dish->availability }}</td>
                        <td><a class="btn btn-success" href="{{ route('admin.dishes.show', $dish) }}">Show</a></td>
                        <td><a class="btn btn-info" href="{{ route('admin.dishes.edit', $dish) }}">Edit</a></td>
                        <td>
                            {{-- @if (Auth::user()->id == $dish->user_id) --}}
                            <form action="{{ route('admin.dishes.destroy', $dish) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                            {{-- @endif --}}
                        </td>
                    </tr>
                    {{-- @endif --}}
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
