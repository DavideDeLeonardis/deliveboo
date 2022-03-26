@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                    <li>{{ $dish->name }}</li>
                    <li>{{ $dish->description }}</li>
                    <li>{{ $dish->ingredients }}</li>
                    <li><img class="img-fluid" src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
                    </li>
                    <li>{{ $dish->price }} &euro;</li>
                    <li>{{ $dish->availability === 1 ? 'Disponibile' : 'Non Disponibile' }}</li>
                    <li>{{ $dish->course }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
