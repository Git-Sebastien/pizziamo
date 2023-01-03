<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Bienvenue chez Pizziamo da Gabriele, votre nouvelle pizzaria italienne à la ravoire vous propose un large choix de produit frais et une carte de pizza italienne cuite au four a bois. Décrouvrez aussi un large choix de dessert ainsi que des vins venant tout droit d'italie !">

    <title>@yield('title')</title>

    <!-- Fonts -->
    @stack('head')
    <!-- CSS only -->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset("vendor/cookie-consent/css/cookie-consent.css")}}"> --}}
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <!-- JavaScript Bundle with Popper -->
    <script src="{{ asset('js/app.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased main-site">
    <main class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <!-- Page Content -->
        @yield('home')
    </main>
</body>

</html>