@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col mt-5 mb-5">
                <div class="card card-edit-dishes p-3">
                    <h1 class="title-edit-dishes" style="color: #08a88a !important">
                        <lord-icon src="https://cdn.lordicon.com/xvkrsjya.json" trigger="loop" delay="3000" axis-y="40"
                            style="width:50px;height:50px">
                        </lord-icon>Modifica il tuo Piatto:
                    </h1>
                    <div class="row">
                        <div class="col py-3">
                            <form action="{{ route('admin.dishes.update', $dish) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- nome --}}
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        <h5 class="h5-edit-dishes">Nome del Piatto:</h5>
                                    </label>
                                    <input type="text" class="form-control"
                                        style="background-color: rgb(56, 193, 114, 0.2)" id="name" name="name"
                                        value="{{ $dish->name }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- descrizione --}}
                                <div class="mb-3">
                                    <label for="description" class="form-label">
                                        <h5 class="h5-edit-dishes">Descrizione:</h5>
                                    </label>
                                    <textarea type="text" class="form-control" style="background-color: rgb(56, 193, 114, 0.2)" id="description"
                                        name="description" rows="3"
                                        placeholder="Opzionale..">{{ $dish->description }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- immagine --}}
                                <div class="mb-3">
                                    <label for="image" class="form-label">
                                        <h5 class="h5-edit-dishes">Immagine:</h5>
                                    </label>
                                    <input class="form-control" style="background-color: rgb(56, 193, 114, 0.2)"
                                        type="file" id="image" name='image' value="{{ $dish->image }}">
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- ingredienti --}}
                                <div class="mb-3">
                                    <label for="ingredients" class="form-label">
                                        <h5>
                                            <h5 class="h5-edit-dishes">Ingredienti:</h5>
                                    </label>
                                    <textarea type="text" class="form-control" style="background-color: rgb(56, 193, 114, 0.2)" id="ingredients"
                                        name="ingredients" rows="3"
                                        placeholder="Opzionale..">{{ $dish->ingredients }}</textarea>
                                    @error('ingredients')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- prezzo --}}
                                <div class="mb-3">
                                    <label for="price" class="form-label">
                                        <h5 class="h5-edit-dishes">Prezzo:</h5>
                                    </label>
                                    <input type="text" class="form-control"
                                        style="background-color: rgb(56, 193, 114, 0.2)" id="price" name="price"
                                        value="{{ $dish->price }}">
                                    @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- portata --}}
                                <div class="mb-3">
                                    <h5 class="h5-edit-dishes">Scegli Portata:</h5>
                                    <select class="form-select" style="background-color: rgb(56, 193, 114, 0.2)"
                                        name="course">
                                        @foreach ($courses as $course)
                                            <option @if (old('course', $dish->course) == $course) selected @endif
                                                value="{{ $course }}">
                                                {{ $course }}</option>
                                        @endforeach
                                        @error('course')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </select>
                                </div>

                                {{-- disponibilità --}}
                                <div class="mb-3">
                                    <h5 class="h5-edit-dishes">Disponibilità:</h5>
                                    <select class="form-select" style="background-color: rgb(56, 193, 114, 0.2)"
                                        name="availability">
                                        <option value="0" @if ($dish->availability == 0) selected @endif>Non Disponibile
                                        </option>
                                        <option value="1" @if ($dish->availability == 1) selected @endif>Disponibile
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
                                <button type="submit" class="btn btn-success text-light p-2 mt-3 btn-edit-dishes"
                                    style="background-color: #38c172">Salva le Modifiche</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
@endsection
