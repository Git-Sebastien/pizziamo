@extends('layouts.dashboard')

@section('title','Ajouter une boisson')

@section('add-dish')
<section class="row main-content">
    <x-layout>
        <article class="col-sm-8 pizzas">
            <h1>Ajouter un plats</h1>
            <form action="{{ route('dish.add') }}" method="post" class="form-dashboard">
                @csrf
                <label for="dish_name">Nom du plat</label>
                <input type="text" name="dish_name" id="" required>
                <label for="dish_name">Prix</label>
                <input type="text" name="dish_price" id="" required>
                <button type="submit" class="btn btn-success btn-sm">Ajouter</button>
            </form>
            <hr>
        </article>
    </x-layout>
</section>
@endsection