@extends('layouts.admin')

@section('content')
    {{-- @dd($data['user']) --}}
    <div class="container">
        <div class="row">
            <div class="col mt-5 mb-5">
                <div class="card card-myedit-user p-3">
                    <h1 class="title-myedit-user" style="color: #08a88a !important">
                        <lord-icon src="https://cdn.lordicon.com/dklbhvrt.json" trigger="loop" delay="3000"
                            colors="primary:#08a88a" scale="45" axis-y="45" state="hover" style="width:50px;height:50px">
                        </lord-icon>Modifica il tuo Profilo
                    </h1>
                    <form action="{{ route('admin.user.update', $user) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- nome --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <h5 class="h5-myedit-user">Nome:</h5>
                            </label>
                            <input type="text" class="form-control" style="background-color: rgb(56, 193, 114, 0.2)"
                                id="name" name="name" value="{{ $user->name }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <h5 class="h5-myedit-user">Email:</h5>
                            </label>
                            <input type="email" class="form-control" style="background-color: rgba(56, 193, 114, 0.2)"
                                id="email" name="email" value="{{ $user->email }}">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- immagine --}}
                        <div class="mb-3">
                            <label for="photo" class="form-label">
                                <h5 class="h5-myedit-user">Foto:</h5>
                            </label>
                            <input class="form-control" style="background-color: rgb(56, 193, 114, 0.2)" type="file"
                                id="photo" name='photo' value="{{ $user->photo }}">
                            @error('photo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- indirizzo --}}
                        <div class="mb-3">
                            <label for="address" class="form-label">
                                <h5 class="h5-myedit-user">Indirizzo:</h5>
                            </label>
                            <input type="text" class="form-control" style="background-color: rgb(56, 193, 114, 0.2)"
                                id="address" name="address" value="{{ $user->address }}">
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- telefono --}}
                        <div class="mb-3">
                            <label for="phone" class="form-label">
                                <h5 class="h5-myedit-user">Telefono:</h5>
                            </label>
                            <input type="text" class="form-control" style="background-color: rgb(56, 193, 114, 0.2)"
                                id="phone" name="phone" value="{{ $user->phone }}">
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- p. iva --}}
                        <div class="mb-3">
                            <label for="p_iva" class="form-label">
                                <h5 class="h5-myedit-user">P IVA</h5>
                            </label>
                            <input type="text" class="form-control" style="background-color: rgb(56, 193, 114, 0.2)"
                                id="p_iva" name="p_iva" value="{{ $user->p_iva }}">
                            @error('p_iva')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- categorie --}}
                        <fieldset class="mb-3">
                            <legend>
                                <h5 class="h5-myedit-user">Categorie</h5>
                            </legend>
                            @if ($errors->any())
                                @foreach ($categories as $category)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                            value="{{ $category->id }}" name="categories[]"
                                            {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}
                                            {{ $user->categories() == [] ? 'required' : '' }}>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @else
                                @foreach ($categories as $category)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                            value="{{ $category->id }}" name="categories[]"
                                            {{ $user->categories()->get()->contains($category->id)? 'checked': '' }}>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                @endforeach
                                <div id="error"></div>
                            @endif
                        </fieldset>

                        <button id="submit" type="submit" class="btn btn-success text-light p-2 mt-3 btn-myedit-user"
                            style="background-color: #38c172">Salva le Modifiche</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let checkboxes = document.querySelectorAll('input[type=checkbox]');
        let error = document.getElementById('error');
        let submit = document.getElementById('submit');

        // console.log(checkboxes)
        // console.log(error)
        // console.log(submit)
        // window.onload = (event) => {
        checkboxes.forEach(element => {
            element.addEventListener('click', function() {
                checkedBox = true
                error.innerHTML = ''
            })
        });

        submit.addEventListener('click', function() {
            let checkedBox = false;
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    checkedBox = true;
                }
            })
            if (!checkedBox) {
                event.preventDefault();
                return error.innerHTML =
                    `<div class="alert alert-warning mt-3" role="alert"> Selezionare almeno una categoria </div>`;
            }
        });
        // }
    </script>
@endsection
