@extends('layouts.dashboard')

@section('title','Ajouter une pizza')

@section('add-pizza')
<section class="row main-content">
    <x-layout>
        <article class="col-sm-8 pizzas">
            <h1>Ajouter une pizza</h1>
            <form action="{{ route('pizza.create-checkbox') }}" method="post" class="p-5" id="composition">
                @csrf
                <label for="pizza-name" class="d-block">Nom de la pizza</label>
                <input type="text" name="pizza-name" id="pizza-name" required>
                <label for="pizza-price" class="d-block"><strong>Prix</strong></label>
                <input type="text" name="pizza-price" id="pizza-price" required>€
                <label for="category" class="d-block"><strong>Catégories</strong></label>
                <select name="category-name" class="mb-5"  id="category" required>
                    <option value="">Choisir une catégorie</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                {{--
                <input type="text" id="ingredient-search">
                <select name="" id="ingredient-select">
                <option value=""></option>
                </select><button type="button" class="btn btn-success btn-sm" id="btn-ingredient">Ajouter</button>

                <div id="choosen">

                </div> --}}
                <h2>Tous les ingrédients</h2>
                <div class="wrapper row">
                    @foreach ($ingredient_types as $ingredient_type)
                    <div class="vegetable p-3 border border-dark col-lg-3 col-md-6">
                        <h3>{{ $ingredient_type->ingredient_type }}</h3>
                        <ul class="d-block">
                            @foreach ($ingredients as $ingredient)
                            @if ($ingredient->fk_ingredient_type_id == $ingredient_type->id )
                            <li class="list-group-item list-checkbox">
                                <input type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}"> {{ $ingredient->ingredient_name }}
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-success btn-sm">Valider la pizza</button>
            </form>
            <hr>
        </article>
    </x-layout>
</section>

@endsection
{{-- @push('head')
    <script src="{{ asset('js/fetch-data.js') }}" defer></script>
@endpush --}}