@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="">Modifica Piatto:</h1>
        <div class="row">
            <div class="col py-3">
                <form action="{{ route('admin.dishes.update', $dish) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- nome --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $dish->name }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- descrizione --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description" rows="3"
                            placeholder="Opzionale..">{{ $dish->description }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- immagine --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image" name='image' value="{{ $dish->image }}">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- ingredienti --}}
                    <div class="mb-3">
                        <label for="ingredients" class="form-label">Ingredients</label>
                        <textarea type="text" class="form-control" id="ingredients" name="ingredients" rows="3"
                            placeholder="Opzionale..">{{ $dish->ingredients }}</textarea>
                        @error('ingredients')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- prezzo  --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $dish->price }}">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- portata --}}
                    <div class="mb-3">
                        <h2>Scegli Portata:</h2>
                        <select class="form-select" name="course">
                            @foreach ($courses as $course)
                                <option @if (old('course', $dish->course) == $course) selected @endif value="{{ $course }}">
                                    {{ $course }}</option>
                            @endforeach
                            @error('course')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </select>
                    </div>

                    {{-- disponibilità --}}
                    <div class="mb-3">
                        <h2>Disponibilità:</h2>
                        <select class="form-select" name="availability">
                            <option value="0" @if ($dish->availability == 0) selected @endif>Non Disponibile</option>
                            <option value="1" @if ($dish->availability == 1) selected @endif>Disponibile</option>
                            @error('availability')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </select>
                    </div>

                    <button type="submit" class="btn btn-danger">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
