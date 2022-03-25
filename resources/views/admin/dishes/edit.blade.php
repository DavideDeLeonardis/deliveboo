@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <a class="btn btn-danger my-3" href="{{ route('admin.posts.index')}}">Home</a> --}}
        <h1 class="">Aggiungi nuovo Piatto:</h1>
        <div class="row">
            <div class="col py-3">
                <form action="{{ route('admin.dishes.update', $dish) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $dish->name }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description"
                            rows="3">{{ $dish->description }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image" name='image' value="{{ $dish->image }}">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="ingredients" class="form-label">Ingredients</label>
                        <textarea type="text" class="form-control" id="ingredients" name="ingredients"
                            rows="3">{{ $dish->ingredients }}</textarea>
                        @error('ingredients')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $dish->price }}">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <h2>Scegli Portata:</h2>
                        <select class="form-select" name="course">
                            {{-- <option selected>Scegli poratta</option> --}}
                            @foreach ($courses as $course)
                                <option @if (old('course', $dish->course) == $course) selected @endif value="{{ $course }}">
                                    {{ $course }}</option>
                            @endforeach
                            @error('course')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </select>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="availability" id="availability"
                            {{ $dish->availability == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="availability">
                            Disponibile
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="availability" id="availability"
                            {{ $dish->availability == 0 ? 'checked' : '' }}>
                        <label class="form-check-label" for="availability">
                            Non Disponibile
                        </label>
                    </div>
                    {{-- <a href="{{ url()->previous()}}" type="submit" class="btn btn-primary">Previous</a> --}}
                    <button type="submit" class="btn btn-danger">Save</button>

                </form>
            </div>
        </div>
    </div>
@endsection
