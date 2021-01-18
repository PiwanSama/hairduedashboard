<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ 'BeautyGo' }}</title>
        <!-- Favicon -->
        <link href="{{ asset('/images/logo.png') }}" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
        <link href="{{ asset('/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('/css/argon.css?v=1.0.0') }}" rel="stylesheet">
        <!-- Toastr CSS -->
        <link type="text/css" href="{{ asset('/css/toastr.min.css') }}" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth

        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <script src="{{ asset('/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

        @stack('js')

        <!-- Argon JS -->
        <script src="{{ asset('/js/argon.js?v=1.0.0') }}"></script>
        <!-- Toastr JS -->
        <script src="{{ asset('/js/toastr.min.js') }}"></script>

        @toastr_render
    </body>
</html>
