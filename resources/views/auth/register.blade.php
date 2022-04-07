@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 mt-5 mb-5">
                <div class="card card-create-dishes p-5">
                    <h1>
                        <lord-icon src="https://cdn.lordicon.com/poblyvkl.json" trigger="loop"
                            colors="primary:#ffc245,secondary:#38c172" style="width:50px;height:50px">
                        </lord-icon> Diventa subito partner di Deliveboo
                    </h1>
                    <div class="row">
                        <div class="col py-3">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('Nome') }}</label>

                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        style="background-color: rgb(255, 194, 69, 0.2)" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('E-Mail') }}</label>


                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" style="background-color: rgb(255, 194, 69, 0.2)"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">{{ __('Indirizzo') }}</label>

                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        style="background-color: rgb(255, 194, 69, 0.2)" value="{{ old('address') }}"
                                        required autocomplete="address">

                                    @error('address')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">{{ __('Telefono') }}</label>

                                    <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" style="background-color: rgb(255, 194, 69, 0.2)"
                                        value="{{ old('phone') }}" required autocomplete="phone" min="10" max="11">

                                    @error('phone')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="p_iva" class="form-label">{{ __('P_iva') }}</label>

                                    <input id="p_iva" type="text" class="form-control @error('p_iva') is-invalid @enderror"
                                        name="p_iva" style="background-color: rgb(255, 194, 69, 0.2)"
                                        value="{{ old('p_iva') }}" required autocomplete="p_iva" min="11" min="11">

                                    @error('p_iva')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <fieldset class="form-group mb-3">
                                    <legend>Scegli una o più categorie</legend>
                                    @foreach ($categories as $category)
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                                value="{{ $category->id }}" name="categories[]"
                                                @if (in_array($category->id, old('categories', []))) checked @endif>
                                            <label class="form-check-label" for="flexSwitchCheckDefault">
                                                {{ $category->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <div id="error"></div>
                                </fieldset>

                                <div class="form-group row">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>

                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        style="background-color: rgb(255, 194, 69, 0.2)" required
                                        autocomplete="new-password">

                                    @error('password')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="password-confirm"
                                        class="form-label">{{ __('Conferma Password') }}</label>

                                    <input id="password-confirm" type="password" class="form-control"
                                        style="background-color: rgb(255, 194, 69, 0.2)" name="password_confirmation"
                                        required autocomplete="new-password">
                                </div>

                                <div class="mt-4">
                                    <button type="submit" id="btn-register" class="btn btn-success text-light pr-2 mt-3"
                                        style="background-color: #ffc245; border: none">
                                        <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop"
                                            colors="primary:#000000,secondary:#38c172" style="width:40px;height:40px"
                                            delay="2000">
                                        </lord-icon>
                                        {{ __('Registrati') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let checkboxes = document.querySelectorAll('input[type=checkbox]');
        let error = document.getElementById('error');
        let btn_register = document.getElementById('btn-register');

        window.onload = (event) => {
            btn_register.addEventListener('click', function() {
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
        }
    </script>
@endsection
