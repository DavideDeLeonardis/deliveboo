@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                    <li>{{ $dish->name }}</li>
                    <li>{{ $dish->description }}</li>
                    <li>{{ $dish->ingredients }}</li>
                    <li>
                        <img class="img-fluid"
                            src="{{ !empty($post->image) ? asset('storage/' . $dish->image) : asset('storage/uploads/default.png') }}"
                            alt="{{ $dish->name }}"
                            style="width: 300px">
                    </li>
                    <li>{{ $dish->price }} &euro;</li>
                    <li>{{ $dish->availability === 1 ? 'Disponibile' : 'Non Disponibile' }}</li>
                    <li>{{ $dish->course }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
