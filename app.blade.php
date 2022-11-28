<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="noindex, nofollow" />
        <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
        <meta name="description" content="Bienvenue chez Pizziamo, votre nouvelle pizzaria à La ravoire vous propose un large choix de produit frais et une carte de pizza italienne cuite aux feux à boix. Décrouvrez aussi un large choix de dessert et apéritifs le tous fais avec humour dans la joie et la bonne humeur !">

        <title>@yield('title')</title>

        <!-- Fonts -->
        @stack('head')
        <!-- CSS only -->
        <link rel="stylesheet" type="text/css" href="{{asset("vendor/cookie-consent/css/cookie-consent.css")}}">
        <!-- Scripts -->
        <!-- JavaScript Bundle with Popper -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased main-site">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            <!-- Page Content -->
            <main>
            @yield('home')
            </main>
        </div>
    </body>
</html>
