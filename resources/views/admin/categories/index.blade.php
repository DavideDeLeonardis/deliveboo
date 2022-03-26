@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row d-flex flex-wrap justify-content-around py-3">
            <h2>Tutte le categorie:</h2>
            @foreach ($categories as $category)
                <div class="col mb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $category->image }}" style="height: 190px" class="card-img-top w-100"
                            alt="{{ $category->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
