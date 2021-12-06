@extends('pages.InsidePages')

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

<div id="app">
    <nav class="content">
        <div class="container">


            <!-- Authentication Links -->

            @guest
                @if (Route::has('login'))


                    <a class="link" href="{{ route('login') }}">{{ __('Login') }}</a>

                @endif

                @if (Route::has('register'))

                    <a class="link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    <br>
                @endif
            @else

                <a class="link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                    @csrf
                </form>


            @endguest


        </div>

    </nav>

    <main class="py-4">

    </main>
</div>

</body>
</html>

