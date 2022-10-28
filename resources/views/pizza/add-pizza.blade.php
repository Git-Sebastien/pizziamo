@extends('layouts.dashboard')


@section('add-pizza')
{{-- @foreach($pizzas as $pizza)
    @if ($pizza->is_deleted === 0)
        <h1>{{ $pizza->pizza_name }}</h1>
        @foreach ($pizza->ingredients as $ingredient)
            {{ $ingredient->ingredient_name }}<br>
        @endforeach
    @endif
@endforeach --}}




{{-- 
<div class="add-form d-flex flex-column">
    <form action="{{ route('pizza.create') }}" method="POST">
        @csrf
        <label for="pizza-name">Nom de la pizza</label><br>
        <input type="text" name="pizza-name" id="pizza" class="pizza"><br>
        <label for="composition">Composition</label><br>
        <textarea name="composition" id="" cols="30" rows="10"></textarea><br>
        <label for="pizza-price">Prix</label><br>
        <input type="text" name="pizza-price" id="pizza-price"><br>
        <label for="category">Catégories</label><br>
        <select name="category-name" id="">
                <option value="">Choisir une catégorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
        </select>
        <button type="submit">Valider la pizza</button>
    </form>
</div><br><br><br> --}}

{{-- <option value=""></option>

    <input type="text" name="" id="pizza-ingredient">
    <select name="" id="ingredient-select"></select>
    <div id="select"></div>
    <div id="choosen"></div> --}}

    <form action="{{ route('pizza.create-checkbox') }}" method="post" class="p-5">
        @csrf
        
        <label for="pizza-name" class="pizza-name"><h1 class="text-center"><strong>Nom de la pizza</strong></h1></label><br>
        <input type="text" name="pizza-name" id="pizza" class="pizza-name"><br><br><br>
        <label for="pizza-price" class="d-block"><strong>Prix</strong></label>
        <input type="text" name="pizza-price" id="pizza-price"><br><br>
        <label for="category" class="d-block"><strong>Catégories</strong></label>
        <select name="category-name" id="">
                <option value="">Choisir une catégorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
        </select>
        
        <label for="composition" class="d-block"><h2>Tous les ingrédients</h2></label><br>
        <div class="wrapper row">
            @foreach ($ingredient_types as $ingredient_type)
            <div class="vegetable p-3 border border-dark col-lg-3 col-md-6">
                <h3>{{ $ingredient_type->ingredient_type }}</h3>
                <ul class="list-group">
                    @foreach ($ingredients as $ingredient)
                    @if ($ingredient->fk_ingredient_type_id == $ingredient_type->id )
                    <li class="list-group-item">
                        <input type="checkbox" name="ingredients[]" id="" value="{{ $ingredient->id }}"> {{ $ingredient->ingredient_name }}<br>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-success">Valider la pizza</button>
    </form>
        
@endsection
@push('head')
    <script src="{{ asset('js/fetch-data.js') }}" defer></script>    
@endpush


{{-- TODO Ajouter un champ boolean dans les pizza pour savoir si elles sont activent ou pas et les afficher en conséquences  --}}

{{-- Mettre en place un route vers un controller quui va fetch les data de la database ingredients --}}
{{-- Mettre en place le fetch qui va post et recevoir les data --}}
{{-- Faire une requête sur les ingredients avec un like --}}
{{-- Avec les data récuperer,, les mettre dans un select avec un attribut name et id --}}
{{-- Crée dynamique des petit btn avec la valeur de l'ingredient  et une petite croix pour pouvoir le supprier dynamiquement aussi--}}