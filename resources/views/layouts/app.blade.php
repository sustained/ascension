<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ascension') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" :class="themeClass">
        <nav class="nav-main">
            <h1 class="nav-brand">
                <a href="{{ url('/') }}">
                    {{ config('app.name', 'Ascension') }}
                </a>
            </h1>

            {{-- <button class="btn blue" @click="toggleTheme()">Toggle Theme</button> --}}

            <ul>
                <li>
                    <a href="/home">Home</a>
                </li>

                <li>
                    <a href="/learn/courses">Courses</a>
                </li>

                <li>
                    <a href="/forums">Forums</a>
                </li>
            </ul>

            @guest
            <ul>
                <li>
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>

                @if (Route::has('register'))
                <li>
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
            </ul>
            @else
            <ul>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </li>
            </ul>
            @endguest
        </nav>

        <main class="bg-container">
            @yield('content')
        </main>
    </div>
</body>
</html>
