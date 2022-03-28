@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="">Aggiungi nuovo Piatto:</h1>
        <div class="row">
            <div class="col py-3">
                <form action="{{ route('admin.dishes.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}"
                            data-bs-toggle="tooltip" data-bs-placement="right" title="Tooltip on right">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description"
                            rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image" name='image'>
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="ingredients" class="form-label">Ingredients</label>
                        <textarea type="text" class="form-control" id="ingredients" name="ingredients"
                            rows="3">{{ old('ingredients') }}</textarea>
                        @error('ingredients')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" required
                            value="{{ old('price') }}">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <h2>Scegli Portata:</h2>
                        <select class="form-select" name="course">
                            @foreach ($courses as $course)
                                <option value="{{ $course }}" @if (old('course')) selected @endif>
                                    {{ $course }}</option>
                            @endforeach
                            @error('course')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </select>
                    </div>
                    <div class="mb-3">
                        <h2>Disponibilità:</h2>
                        <select class="form-select" name="availability">
                            <option value="0" @if (old('availability')) selected @endif>Non Disponibile</option>
                            <option value="1" @if (old('availability')) selected @endif>Disponibile</option>
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
