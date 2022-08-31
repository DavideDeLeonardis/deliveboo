<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DeliveBoo') }}</title>

    <!-- Scripts -->
    <script src="https://cdn.lordicon.com/lusqsztk.js" defer></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="{{ secure_asset('js/front.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <style scoped>
        .nav-pills .nav-link.active {
            background-color: #38c172;
        }

        .my-btn-warning {
            background-color: #ffc107;
        }

    </style>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-md navbar-light bg-dark text-white shadow-sm">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ url('/') }}">
                DeliveBoo
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav ml-auto w-100 justify-content-between">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ 'Login' }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ 'Register' }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown mx-4 fw-bold" style="margin-top: 7px;">{{ Auth::user()->name }}</li>
                        <li class="nav-item dropdown">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('POST')
                                <input type="submit" value="Logout" class="btn my-btn-warning text-white">
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container-fluid" style="margin-top: 3rem">
            <div class="row" style="width: ">
                <div class="col-3 p-0 border-end border-light border-4 position-fixed bar-left" id="sticky-sidebar">
                    <div style="min-height: 100vh;"
                        class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark w-100">
                        <a href="{{ route('admin.home') }}"
                            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none justify-content-around">
                            <img class="bi me-2 w-50" src="{{ secure_asset('images/logo.jpeg') }}" alt="Logo"
                                class="rounded-circle me-2">
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="{{ route('admin.dishes.index') }}"
                                    class="{{ 'admin.dishes.index' === Route::currentRouteName() ? 'active' : '' }} nav-link text-white"
                                    aria-current="page">
                                    <lord-icon class="icon" src="https://cdn.lordicon.com/coqbeapw.json"
                                        trigger="loop" colors="primary:#e8b730,secondary:#08a88a" stroke="60"
                                        style="width:50px;height:50px" delay="5000">
                                    </lord-icon>
                                    <span class="text-side text-side-admin">Visualizza tutti i piatti</span>
                                </a>
                            </li>
                            {{-- @dd(Route::currentRouteName()) --}}
                            <li>
                                <a href="{{ route('admin.dishes.create') }}"
                                    class="{{ 'admin.dishes.create' === Route::currentRouteName() ? 'active' : '' }} nav-link text-white">
                                    <lord-icon class="icon" src="https://cdn.lordicon.com/mecwbjnp.json"
                                        trigger="loop" colors="primary:#e8b730,secondary:#08a88a" stroke="60"
                                        style="width:50px;height:50px" delay="7000">
                                    </lord-icon>
                                    <span class="text-side text-side-admin">Aggiungi piatto</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.orders.index') }}"
                                    class="{{ 'admin.orders.index' === Route::currentRouteName() ? 'active' : '' }} nav-link text-white">
                                    <lord-icon class="icon" src="https://cdn.lordicon.com/cjieiyzp.json"
                                        trigger="loop" colors="primary:#e8b730,secondary:#08a88a" stroke="60"
                                        style="width:50px;height:50px" delay="9000">
                                    </lord-icon>
                                    <span class="text-side text-side-admin">Vedi i tuoi ordini</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.user.index') }}"
                                    class="{{ 'admin.user.index' === Route::currentRouteName() ? 'active' : '' }} nav-link text-white">
                                    <lord-icon class="icon" src="https://cdn.lordicon.com/dxjqoygy.json"
                                        trigger="loop" colors="primary:#e8b730,secondary:#08a88a" stroke="60"
                                        style="width:50px;height:50px" delay="11000">
                                    </lord-icon>
                                    <span class="text-side text-side-admin">Vedi il tuo profilo</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.stats') }}"
                                    class="{{ 'admin.stats' === Route::currentRouteName() ? 'active' : '' }} nav-link text-white">
                                    <lord-icon class="icon" src="https://cdn.lordicon.com/gqdnbnwt.json"
                                        trigger="loop" delay="13000" stroke="60"
                                        colors="primary:#e8b730,secondary:#08a88a" style="width:50px;height:50px">
                                    </lord-icon>
                                    <span class="text-side text-side-admin">Visualizza statistiche</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col main">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
</body>

</html>
