@extends('layouts.dashboard')

@section('title','Modifier un dessert')

@section('edit-dessert')
<section class="row main-content">
    <x-layout>
        <article class="col-sm-8 pizzas">
            <h1>Modifier un dessert</h1>
            <form action="{{ route('dessert.update',$desserts->id) }}" method="post" class="d-flex flex-column">
                @csrf
                <label for="dessert_name">Nom du dessert</label>
                <input type="text" name="dessert_name" id="dessert_name" value="{{ $desserts->dessert_name }}">
                <label for="composition">Composition</label>
                <textarea name="dessert_composition" id="composition" cols="30" rows="10" required>{{ $desserts->dessert_composition }}</textarea>
                <label for="dessert_price">Prix</label>
                <input type="text" name="dessert_price" id="dessert_price" value="{{ $desserts->dessert_price }}"> €
                <button type="submit" class="btn btn-success btn-sm">Valider les modifications</button>
            </form>
            <hr>
        </article>
    </x-layout>
</section>
@endsection