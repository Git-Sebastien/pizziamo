@extends('layouts.app')

@section('title','Pizziamo da Gabriele - Pizzeria italiennes a La Ravoire!')
@section('home')
@if (session()->has('register'))
    <div class="alert alert-warning fade-update">
        {{ session('register') }}
    </div>            
@endif
@include('home.banner')
@include('home.presentation')
@include('home.menu')
@include('home.localisation')
@endsection

