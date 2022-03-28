@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                    <li>{{ $dish->name }}</li>
                    @if ($dish->description)
                        <li>{{ $dish->description }}</li>
                    @endif
                    @if ($dish->ingredients)
                        <li>{{ $dish->ingredients }}</li>
                    @endif
                    @if ($dish->image)
                        <li><img class="img-fluid" src="{{ asset('storage/' . $dish->image) }}"
                                alt="{{ $dish->name }}">
                        </li>
                    @endif
                    <li>{{ $dish->price }} &euro;</li>
                    <li>{{ $dish->availability === 1 ? 'Disponibile' : 'Non Disponibile' }}</li>
                    <li>{{ $dish->course }}</li>
                </ul>
                <a class="btn btn-primary" href="{{ route('admin.dishes.edit', $dish->slug) }}">Modifica piatto</a>
            </div>
        </div>
    </div>
@endsection
