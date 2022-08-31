<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- scrollbar --}}
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #ffc108;
            border-radius: 5px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #ffc108;
        }

    </style>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DeliveBoo') }}</title>

    <!-- Scripts -->
    @yield('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
    <!-- includes the Braintree JS client SDK -->
    <script src="https://js.braintreegateway.com/web/dropin/1.33.0/js/dropin.min.js"></script>

    <!-- includes jQuery -->
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm sticky-top">
        <div class="container">
            <div class="w-25">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="rounded" src="../../images/logo.jpeg" alt="DeliveBoo" style="width: 4rem;">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto col-4 p-2 d-flex align-items-center flex-row-reverse">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item px-2">
                            <a class="nav-link btn btn-success text-white"
                                href="{{ route('login') }}">{{ 'Accedi' }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link btn btn-warning text-white"
                                    href="{{ route('register') }}">{{ 'Registrati' }}</a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a class="btn my_bg-green m-2 text-white" href=" {{ url('/admin/user') }}">
                                Profilo
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('POST')
                                <input type="submit" value="Logout" class="btn btn-warning text-white">
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>

<style>
    /* Backgrounds */
    .my_bg-dark {
        background-color: #121212;
    }

    .my_bg-orange {
        background-color: #d6833a;
    }

    .my_bg-green {
        background-color: #198754;
    }

</style>
