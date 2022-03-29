@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="">Modifica il tuo profilo</h1>
        <div class="row">
            <div class="col py-3">
                <form action="{{ route('admin.users.update', $user) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- nome --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- immagine --}}
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input class="form-control" type="file" id="photo" name='photo' value="{{ $user->photo }}">
                        @error('photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- indirizzo --}}
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ $user->address }}">
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- telefono --}}
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- p. iva --}}
                    <div class="mb-3">
                        <label for="p_iva" class="form-label">Partita Iva</label>
                        <input type="text" class="form-control" id="p_iva" name="p_iva" value="{{ $user->p_iva }}">
                        @error('p_iva')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- categorie --}}
                    <fieldset class="mb-3">
                        <legend>Categories</legend>
                        @if ($errors->any())
                            @foreach ($categories as $category)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $category->id }}" name="categories[]"
                                        {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }} {{ $user->categories() == [] ? 'required' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
                        @else
                            @foreach ($categories as $category)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $category->id }}" name="categories[]"
                                        {{ $user->categories()->get()->contains($category->id) ? 'checked': '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
                        @endif
                        @error('categories.*')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </fieldset>

                    <button type="submit" class="btn btn-danger">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
