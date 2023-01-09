@extends('layouts.dashboard')

@section('title','Ajouter un ingrédient')

@section('add-ingredient')
<section class="row main-content">
    <x-layout>
        <article class="col-sm-8 pizzas">
            <h1>Ajouter un ingrédient</h1>
            <form action="{{ route('ingredient.add') }}" method="POST" class="form-dashboard">
                @csrf
                <label for="ingredient_name">Nom de l'ingrédient</label>
                <input type="text" name="ingredient_name" id="ingredient_name" required>
                <label for="ingredient_type">Type d'ingredient</label>
                <select name="ingredient_type" id="ingredient_type" required>
                    <option value="">Chosir une catégorie</option>
                    @foreach ($ingredient_types as $types)
                    <option value="{{ $types->id }}">{{ $types->ingredient_type }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-success btn-sm">Ajouter</button>
            </form>
        </article>
    </x-layout>
</section>

@endsection