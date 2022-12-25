@extends('layouts.dashboard')

@section('title','Effacer un ingrédient')

@section('delete-ingredient')
    <section class="row main-content">
        <x-layout>
            <article class="col-sm-8 pizzas">
                <h1>Effacer un ingrédient</h1>
                <div class="wrapper ingredient-list">
                    @foreach ($ingredient_types as $ingredient_type)
                        <div class="vegetable p-3 border border-dark">
                            <h3>{{ $ingredient_type->ingredient_type }}</h3>
                            <ul class="d-block">
                                @foreach ($ingredients as $ingredient)
                                    @if ($ingredient->fk_ingredient_type_id == $ingredient_type->id )
                                    <li class="list-group-item list-checkbox d-flex justify-content-between">
                                        <span>{{ $ingredient->ingredient_name }}</span>
                                       <a href="{{ route('item.delete',["id" => $ingredient->id,"keep_or_delete" => 1,"item" => "Ingredient"]) }}" class="btn btn-danger">Effacer</a>
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </article>    
        </x-layout>
    </section>
@endsection