@extends('layouts.admin')

@section('content')
    <div class="container bg-dark">
        <h1 class="text-light" style="color: #08a88a !important">
            <lord-icon src="https://cdn.lordicon.com/jpdtnwas.json" trigger="loop"
                colors="primary:#e8b730,secondary:#08a88a" style="width:80px;height:50px">
            </lord-icon>Aggiungi un nuovo Piatto:
        </h1>
        <div class="row">
            <div class="col py-3">
                <form action="{{ route('admin.dishes.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    {{-- nome --}}
                    <div class="mb-3">
                        <label for="name" class="form-label text-light">
                            <h4>Nome del Piatto:</h4>
                        </label>
                        <input type="text" class="form-control" style="background-color: #e8b730" id="name" name="name"
                            required value="{{ old('name') }}" data-bs-toggle="tooltip" data-bs-placement="right"
                            title="Tooltip on right">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- descrizione --}}
                    <div class="mb-3">
                        <label for="description" class="form-label text-light">Descrizione:</label>
                        <textarea type="text" class="form-control" style="background-color: #e8b730" id="description" name="description"
                            rows="3" placeholder="Opzionale..">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- immagine --}}
                    <div class="mb-3">
                        <label for="image" class="form-label text-light">Immagine:</label>
                        <input class="form-control" style="background-color: #e8b730" type="file" id="image" name='image'>
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- ingredienti --}}
                    <div class="mb-3">
                        <label for="ingredients" class="form-label text-light">Ingredienti:</label>
                        <textarea type="text" class="form-control" style="background-color: #e8b730" id="ingredients" name="ingredients"
                            rows="3" placeholder="Opzionale..">{{ old('ingredients') }}</textarea>
                        @error('ingredients')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- prezzo --}}
                    <div class="mb-3">
                        <label for="price" class="form-label text-light">Prezzo:</label>
                        <input type="text" class="form-control" style="background-color: #e8b730" id="price" name="price"
                            required value="{{ old('price') }}">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- portata --}}
                    <div class="mb-3">
                        <h4 class="text-light">Scegli Portata:</h4>
                        <select class="form-select" style="background-color: #e8b730" name="course">
                            @foreach ($courses as $course)
                                <option value="{{ $course }}" @if (old('course')) selected @endif>
                                    {{ $course }}</option>
                            @endforeach
                            @error('course')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </select>
                    </div>

                    {{-- disponibilità --}}
                    <div class="mb-3">
                        <h4 class="text-light">Disponibilità:</h4>
                        <select class="form-select" style="background-color: #e8b730" name="availability">
                            <option value="0" @if (old('availability')) selected @endif>Non Disponibile</option>
                            <option value="1" @if (old('availability')) selected @endif>Disponibile</option>
                            @error('availability')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success" style="background-color: #08a88a">Salva il Piatto</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
@endsection
