@extends('layouts.dashboard')

@section('title','Element du menu supprimé')

@section('deleted-item')
<section class="row main-content">
    <x-layout>
        <article class="col-sm-8 pizzas">
            <h1>Liste des elements qui ne sont plus au menu</h1>
            <h2>Les pizzas</h2>
                <ul>
                    @foreach ($pizzas as $pizza)
                        <li class="col-lg-4 col-md-12 col-sm-12 mt-4 pizza-list">
                            <p class="card-title pizza-title">{{ $pizza->pizza_name }}</p> <span class="price">{{ $pizza->pizza_price.',00' }}€</span>
                            <p class="ingredient-details">
                                @foreach ($pizza->ingredients as $ingredient)
                                {{ $ingredient->ingredient_name}}<br>
                                @endforeach
                                <div class="btn-action">
                                    <a href="{{ route('item.delete', ["id" => $pizza->id ?? "","keep_or_delete" => 0,"item" => 'Pizza']) }}" class="btn btn-warning btn-sm">
                                        Ajouter au menu
                                    </a>
                                    <form action="{{ route('pizza.delete-permanently', ["id" => $pizza->id ?? "","table" =>"pizzas" ]) }}" method="post" class="d-inline">@csrf
                                        <button type="submit" class="card-link btn btn-danger btn-sm" value="{{ $pizza->pizza_name }}"> {{ __('Supprimer définitivement')  }}</button>
                                    </form>
                                </div>
                            </p>
                        </li>
                    @endforeach
                </ul>
                <hr>
            <h2>Les boissons</h2>
            <ul>
                @foreach ($drinks as $drink)
                    <li class="col-lg-3 col-md-6 col-sm-12 mt-4">
                        <p class="card-title mb-3">{{ $drink->drink_name }}</p>
                        <p class="price">{{ $drink->drink_price .'€'}}</p>
                        <span class="d-flex">
                            <a href="{{ route('item.delete', ["id" => $drink->id ?? "","keep_or_delete" => 0,"item" => 'Drink']) }}" class="btn btn-warning btn-sm">
                                Ajouter au menu
                            </a>
                            <form action="{{ route('deletePermanently', ["id" => $drink->id ?? "","table" => "drinks" ]) }}" method="post" class="d-inline">@csrf
                                <button type="submit" class="card-link btn btn-danger btn-sm" value="{{ $drink->ingredient_name }}"> {{ __('Supprimer définitivement')  }}</button>
                            </form>
                        </span>
                    </li>
                @endforeach
            </ul>
            <hr>
            <h2>Les desserts</h2>
            <ul class="list-group ">
                @foreach ($desserts as $dessert )
                    <li class="col-lg-4 col-md-6 col-sm-12 mt-4 ">
                        <p class="card-title">{{ $dessert->dessert_name }}</p>
                        <p class="price">{{ $dessert->dessert_price .'€'}}</p>
                        <span class="d-flex">
                            <a href="{{ route('item.delete', ["id" => $dessert->id ?? "","keep_or_delete" => 0,"item" => 'Dessert']) }}" class="btn btn-warning btn-sm">
                                Ajouter au menu
                            </a>
                            <form action="{{ route('deletePermanently', ["id" => $dessert->id ?? "","table" => "desserts" ]) }}" method="post" class="d-inline">@csrf
                                <button type="submit" class="card-link btn btn-danger btn-sm" value="{{ $dessert->dessert_name }}"> {{ __('Supprimer définitivement')  }}</button>
                            </form>
                        </span>
                    </li>
                @endforeach
            </ul>
            <hr>
            <h2>Les ingrédients</h2>
                @foreach ($ingredients as $ingredient )
                    <li class="col-lg-4 col-md-6 col-sm-12 mt-4 ">
                        <p class="card-title">{{ $ingredient->ingredient_name }}</p>
                        <span class="d-flex">
                            <a href="{{ route('item.delete', ["id" => $ingredient->id ?? "","keep_or_delete" => 0,"item" => 'Ingredient']) }}" class="btn btn-warning btn-sm">
                                Ajouter au menu
                            </a>
                            <form action="{{ route('deletePermanently', ["id" => $ingredient->id ?? "","table" => "ingredients" ]) }}" method="post" class="d-inline">@csrf
                                <button type="submit" class="card-link btn btn-danger btn-sm" value="{{ $ingredient->ingredient_name }}"> {{ __('Supprimer définitivement')  }}</button>
                            </form>
                        </span>
                    </li>
                @endforeach
        </article>
    </x-layout>
</section>
@endsection