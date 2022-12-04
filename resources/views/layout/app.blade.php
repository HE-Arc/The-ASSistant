<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The ASSistant</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/css/app.css') }}">
    <script type="text/javascript" src="{{ url('/js/cookieManager.js') }}"></script>
    <script type="text/javascript" src="{{ url('/js/themeChanger.js') }}"></script>
    <script type="text/javascript" src="{{ url('/js/search.js') }}"></script>
</head>

<body>
    {{-- navbar-dark bg-dark --}}
    <nav class="navbar sticky-top navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">The ASSistant</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                {{-- <span class="navbar-toggler-icon"></span> --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-list navbar-toggler-icon" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        @if (Route::currentRouteName() == 'pokemon.index')
                            <a class="nav-link active" aria-current="page" href="{{ route('pokemon.index') }}">
                            @else
                                <a class="nav-link" href="{{ route('pokemon.index') }}">
                        @endif
                        Pokédex
                        </a>
                    </li>
                    <li class="nav-item">
                        @if (Route::currentRouteName() == 'attack')
                            <a class="nav-link active" aria-current="page" href="{{ route('attack') }}">
                            @else
                                <a class="nav-link" href="{{ route('attack') }}">
                        @endif
                        En attaque
                        </a>
                    </li>
                    <li class="nav-item">
                        @if (Route::currentRouteName() == 'defense')
                            <a class="nav-link active" aria-current="page" href="{{ route('defense') }}">
                            @else
                                <a class="nav-link" href="{{ route('defense') }}">
                        @endif
                        En défense
                        </a>
                    </li>
                    <li class="nav-item">
                        @if (Route::currentRouteName() == 'about')
                            <a class="nav-link active" aria-current="page" href="{{ route('about') }}">
                            @else
                                <a class="nav-link" href="{{ route('about') }}">
                        @endif
                        À propos
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                        @if (empty(session('username')))
                            <a class="nav-link active" href="{{ route('login') }}">Login</a>
                        @else
                            <a class="nav-link active" aria-current="page" href="{{ route('logout') }}">Log out</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <aside class="container-fluid right-aligned">
        <form action="" class="theme-selector">
            <fieldset>
                <legend class="sr-only">Selection de thème</legend>
                <label for="theme" class="sr-only">Thème clair</label>
                <input type="radio" name="theme" id="theme-light" checked>
                <label for="theme" class="sr-only">Thème gris</label>
                <input type="radio" name="theme" id="theme-grey">
                <label for="theme" class="sr-only">Thème sombre</label>
                <input type="radio" name="theme" id="theme-dark">
                <label for="theme" class="sr-only">Thème orange</label>
                <input type="radio" name="theme" id="theme-orange">
            </fieldset>
        </form>
    </aside>
    <div class="container mt-3">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif
        @yield('content')
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

</body>

</html>
