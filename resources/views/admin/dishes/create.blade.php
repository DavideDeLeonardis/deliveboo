@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col mt-5 mb-5">
                <div class="card card-create-dishes p-3">
                    <h1 class="title-create-dishes" style="color: #08a88a !important">
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
                                    <label for="name" class="form-label">
                                        <h5 class="h5-create-dishes">Nome del Piatto:</h5>
                                    </label>
                                    <input type="text" class="form-control"
                                        style="background-color: rgb(56, 193, 114, 0.2)" id="name" name="name" required
                                        value="{{ old('name') }}" data-bs-toggle="tooltip" data-bs-placement="right"
                                        title="Tooltip on right">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- descrizione --}}
                                <div class="mb-3">
                                    <label for="description" class="form-label ">
                                        <h5 class="h5-create-dishes">Descrizione:</h5>
                                    </label>
                                    <textarea type="text" class="form-control" style="background-color: rgb(56, 193, 114, 0.2)" id="description"
                                        name="description" rows="3"
                                        placeholder="Opzionale..">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- immagine --}}
                                <div class="mb-3">
                                    <label for="image" class="form-label ">
                                        <h5 class="h5-create-dishes">Immagine:</h5>
                                    </label>
                                    <input class="form-control" style="background-color: rgb(56, 193, 114, 0.2)"
                                        type="file" id="image" name='image'>
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- ingredienti --}}
                                <div class="mb-3">
                                    <label for="ingredients" class="form-label ">
                                        <h5 class="h5-create-dishes">Ingredienti:</h5>
                                    </label>
                                    <textarea type="text" class="form-control" style="background-color: rgb(56, 193, 114, 0.2)" id="ingredients"
                                        name="ingredients" rows="3"
                                        placeholder="Opzionale..">{{ old('ingredients') }}</textarea>
                                    @error('ingredients')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- prezzo --}}
                                <div class="mb-3">
                                    <label for="price" class="form-label ">
                                        <h5 class="h5-create-dishes">Prezzo:</h5>
                                    </label>
                                    <input type="text" class="form-control"
                                        style="background-color: rgb(56, 193, 114, 0.2)" id="price" name="price" required
                                        value="{{ old('price') }}">
                                    @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- portata --}}
                                <div class="mb-3">
                                    <h5 class="h5-create-dishes">Scegli Portata:</h5>
                                    <select class="form-select" style="background-color: rgb(56, 193, 114, 0.2)"
                                        name="course">
                                        @foreach ($courses as $course)
                                            <option value="{{ $course }}"
                                                @if (old('course')) selected @endif>
                                                {{ $course }}</option>
                                        @endforeach
                                        @error('course')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </select>
                                </div>

                                {{-- disponibilità --}}
                                <div class="mb-3">
                                    <h5 class="h5-create-dishes">Disponibilità:</h5>
                                    <select class="form-select" style="background-color: rgb(56, 193, 114, 0.2)"
                                        name="availability">
                                        <option value="0" @if (old('availability')) selected @endif>Non Disponibile
                                        </option>
                                        <option value="1" @if (old('availability')) selected @endif>Disponibile
                                        </option>
                                        @error('availability')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </select>
                                </div>
                                <lord-icon class="heart" src="https://cdn.lordicon.com/rjzlnunf.json"
                                    trigger="loop" delay="5000" colors="primary:#121331,secondary:#08a88a" axis-y="60"
                                    style="width:50px;height:50px">
                                </lord-icon>
                                <button type="submit" class="btn btn-success text-light p-2 mt-3 btn-create-dishes"
                                    style="background-color: #38c172">Salva il
                                    Piatto</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
@endsection
