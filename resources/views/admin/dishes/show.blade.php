@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-start">
                <div class="card m-3">
                    <div class="card-body">
                        <p class="card-text"><strong>Nome Piatto:</strong> {{ $dish->name }}</p>
                        @if ($dish->description)
                            <p class="card-text"><strong>Descrizione:</strong> {{ $dish->description }}</p>
                        @endif
                        @if ($dish->ingredients)
                            <p class="card-text"><strong>Ingredienti:</strong> {{ $dish->ingredients }}</p>
                        @endif
                        @if ($dish->image)
                            <img class="img-fluid" style="max-width: 20rem"
                                src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
                        @endif
                        <p class="card-text"><strong>Prezzo:</strong> {{ $dish->price }} &euro;</p>
                        <p class="card-text"><strong>Disponibilità:</strong>
                            {{ $dish->availability === 1 ? 'Disponibile' : 'Non Disponibile' }}</p>
                        <p class="card-text"><strong>Tipo di portata:</strong> {{ $dish->course }}</p>
                        <a class="btn btn-light text-light m-3" style="background-color: #38c172 !important"
                            href="{{ route('admin.dishes.edit', $dish->slug) }}">Modifica
                            piatto</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
