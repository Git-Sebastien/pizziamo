@extends('layouts.dashboard')

@section('title','Modifier un dessert')

@section('edit-dessert')
<section class="row main-content">
    <x-layout>
        <article class="col-sm-8 pizzas">
            <h1>Modifier un dessert</h1>
            <form action="{{ route('dessert.update',$desserts->id) }}" method="post" class="d-flex flex-column">
                @csrf
                <label for="name">Nom du dessert</label>
                <input type="text" name="dessert_name" id="" value="{{ $desserts->dessert_name }}">
                <label for="name">Composition</label>
                <textarea name="dessert_composition" id="" cols="30" rows="10" required>{{ $desserts->dessert_composition }}</textarea>
                <label for="name">Prix</label>
                <input type="text" name="dessert_price" id="" value="{{ $desserts->dessert_price }}"> €
                <button type="submit" class="btn btn-success btn-sm">Valider les modifications</button>
            </form>
            <hr>
        </article>
    </x-layout>
</section>
@endsection