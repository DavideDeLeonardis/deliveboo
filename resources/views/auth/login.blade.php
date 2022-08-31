@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 mt-5 mb-5">
                <div class="card p-5 mb-4">
                    <h1>
                        <lord-icon src="https://cdn.lordicon.com/dxjqoygy.json" trigger="loop"
                            colors="primary:#ffc245,secondary:#38c172" style="width:50px;height:50px" delay="2000">
                        </lord-icon> Login
                    </h1>

                    <div class="row">
                        <div class="col py-3">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('E-Mail') }}</label>

                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        style="background-color: rgb(255, 194, 69, 0.2)" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>

                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        style="background-color: rgb(255, 194, 69, 0.2)" required
                                        autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary"
                                        style="background-color: #ffc245; border: none">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="ms-3 me-4">
                    <span>CREDENTIALS</span>
                    <div class="d-flex">
                        <div class="mx-3">
                            <div><u>Email:</u> &nbsp; pasticceriafloro@gmail.com</div>
                            <div><u>Password:</u> &nbsp; 12345678</div>
                        </div>
                        <div class="me-3">
                            <div><u>Email:</u> &nbsp; botta@gmail.com</div>
                            <div><u>Password:</u> &nbsp; 12345678</div>
                        </div>
                        <div>
                            <div><u>Email:</u> &nbsp; 44gattibistrot@gmail.com</div>
                            <div><u>Password:</u> &nbsp; 12345678</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
