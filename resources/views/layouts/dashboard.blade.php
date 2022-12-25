<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow" />

    <title>@yield('title')</title>

    <!-- Fonts -->
    @stack('head')
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@php
$array_session = ['update','delete','create','add'];
@endphp
@foreach ($array_session as $message)
@if (session()->has($message))
<div class="alert alert-success fade-update">
    {{ session($message) }}
</div>
@endif
@endforeach
@if (session()->has('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<body class="dashboard-body">
    @yield('dashboard')
    @yield('add-pizza')
    @yield('add-ingredient')
    @yield('add-dessert')
    @yield('edit-pizza')
    @yield('add-drink')
    @yield('edit-ingredient')
    @yield('edit-drink')
    @yield('edit-dessert')
    @yield('edit-drink')
    @yield('deleted-item')
    @yield('edit-dish')
    @yield('add-dish')
    @yield('delete-ingredient')
</body>

</html>