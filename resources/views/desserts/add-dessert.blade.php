@extends('layouts.dashboard')

@section('title','Ajouter un dessert')

@section('add-dessert')
<section class="row main-content">
    <x-layout>
        <article class="col-sm-8 pizzas">
            <h1>Ajouter un dessert</h1>
            <form action="{{ route('dessert.add') }}" method="post" class="form-dashboard">
                @csrf
                <label for="dessert_name">Nom du dessert</label>
                <input type="text" name="dessert_name" id="dessert_name" required>
                <label for="dessert_composition">Composition</label>
                <textarea name="dessert_composition" id="dessert_composition" required></textarea>
                <label for="dessert_price">Prix</label>
                <input type="text" name="dessert_price" id="dessert_price" required>
                <button type="submit" class="btn btn-success btn-sm">Ajouter</button>
            </form>
            <hr>
        </article>
    </x-layout>
</section>
@endsection