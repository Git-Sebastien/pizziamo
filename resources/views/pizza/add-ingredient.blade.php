@extends('layouts.dashboard')

@section('title','Ajouter un ingrédient')

@section('add-ingredient')

<form action="{{ route('ingredient.add') }}" method="POST">
    @csrf
    <label for="ingredienet_name">Nom de l'ingrédient</label>
    <input type="text" name="ingredient_name" id="ingredient-name">
    <label for="ingredient type">Type d'ingredient</label>
    <select name="ingredient_type" id="">
        <option value="">Chosir une catégorie</option>
        @foreach ($ingredient_types  as $types)
            <option value="{{ $types->id }}">{{ $types->ingredient_type }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
    
@endsection