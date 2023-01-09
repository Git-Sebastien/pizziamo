@extends('layouts.dashboard')

@section('title','Ajouter une boisson')

@section('edit-dish')
<section class="row main-content">
    <x-layout>
        <article class="col-sm-8 pizzas">
            <h1>Modifier un plat</h1>
            <form action="{{ route('dish.update',$dish->id) }}" method="post" class="form-dashboard">
                @csrf
                <label for="dish_name">Nom du plat</label>
                <input type="text" name="dish_name" id="dish_name" value="{{ $dish->dish_name }}">
                <label for="dish_price">Prix</label>
                <input type="text" name="dish_price" id="dish_price" value="{{ $dish->dish_price }}"> €
                <button type="submit" class="btn btn-success btn-sm">Valider les modifications</button>
            </form>
            <hr>
        </article>
    </x-layout>
</section>
@endsection