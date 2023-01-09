@extends('layouts.dashboard')

@section('title','Ajouter une boisson')

@section('add-drink')
<section class="row main-content">
    <x-layout>
        <article class="col-sm-8 pizzas">
            <h1>Ajouter une boisson</h1>
            <form action="{{ route('drink.add') }}" method="post" class="form-dashboard">
                @csrf
                <label for="drink_name">Nom de la boisson</label>
                <input type="text" name="drink_name" id="drink_name" required>
                <label for="volume">Contenance</label>
                <select name="drink_volume" id="volume" required>
                    <option value="">Choisissez une contenance</option>
                    <option value="33cl">33cl</option>
                    <option value="50cl">50cl</option>
                    <option value="75cl">75cl</option>
                    <option value="1l">1l</option>
                    <option value="1,5l">1,5l</option>
                </select>
                <label for="drink_type">Type de boisson</label>
                <select name="drink_type" id="drink_type" required>
                    <option value="">Choisir un type</option>
                    @foreach ($drink_types as $drink_type)
                    <option value="{{ $drink_type->id }}">{{ $drink_type->type }}</option>
                    @endforeach
                </select>
                <label for="drink_price">Prix : </label>
                <input type="text" name="drink_price" id="drink_price" class="input-price" required>
                <button class="btn btn-success btn-sm">Ajouter</button>
            </form>
            <hr>
        </article>
    </x-layout>
</section>

@endsection