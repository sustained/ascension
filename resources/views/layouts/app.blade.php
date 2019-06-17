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
    <div id="app" :class="appClasses">
        <nav class="nav-main">
            <h1 class="nav-brand">
                <router-link to="/">
                    {{ config('app.name', 'Ascension') }}
                </router-link>
            </h1>

            {{-- <button class="btn blue" @click="toggleTheme()">Toggle Theme</button> --}}

            <ul>
                <li>
                    <router-link class="nav-link" to="/">Home</router-link>
                </li>

                <li>
                    <router-link class="nav-link" to="/courses">Courses</router-link>
                </li>

                <li>
                    <router-link class="nav-link" to="/forums">Forums</router-link>
                </li>
            </ul>

            <ul  v-if="loggedIn">
                <li>
                    <a href="#" class="nav-link" @click="logoutUser">
                        {{ __('Logout') }}
                    </a>
                </li>
            </ul>

            <ul v-else>
                <li>
                    <router-link class="nav-link" to="/user/login">{{ __('Login') }}</router-link>
                </li>

                <li>
                    <router-link class="nav-link" to="/user/register">{{ __('Register') }}</router-link>
                </li>
            </ul>
        </nav>

        @yield('content')
    </div>
</body>
</html>
