@extends('layouts.dashboard')

@section('title','Administration')

@section('dashboard')

<x-modal></x-modal>

<main>
    <section class="row main-content">
        <x-layout>
            <article class="col-sm-8 pizzas">
                <article class="row col-lg-12">
                    <span id="pizzas"></span>
                    @foreach ($categories as $category)
                    <h4 class="text-center title-category">{{ $category->category_name }}</h4>
                    <ul>
                        @foreach ($pizzas as $pizza)
                            @if ($pizza->fk_category_id === $category->id)
                                <li class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mt-4 pizza-list">
                                    <p class="card-title pizza-title">
                                        {{ $pizza->pizza_name }}
                                    </p> 
                                    <span class="price">{{ $pizza->pizza_price.',00' }}€</span>
                                    <p class="ingredient-details">
                                        @foreach ($pizza->ingredients as $ingredient)
                                            {{ $ingredient->ingredient_name}}
                                        @endforeach
                                        <div class="btn-action">
                                            <a href="{{ route('pizza.edit',$pizza->id ?? "") }}" class="btn btn-warning btn-sm">
                                            Modifier
                                            </a>
                                                <form action="{{ route('item.delete', ["id" => $pizza->id ?? "","keep_or_delete" => 1,"item" => 'Pizza']) }}" method="post" class="d-inline">@csrf
                                                <button type="submit" class="card-link btn btn-danger btn-sm" value="{{ $pizza->pizza_name }}"> {{ __('Supprimer')  }}</button>
                                            </form>
                                        </div>
                                    </p>
                                </li>
                            @endif
                        @endforeach
                        @if ($category->id === 4)
                            <span id="plats-maisons"></span>
                            @foreach ($dishs as $dish)
                                <li class="p-2 mt-3">
                                        <p class="card-title pizza-title">{{ $dish->dish_name }} <i></i></p>
                                    @if (Str::length($dish->dish_price) > 2)
                                        <span class="price">{{ $dish->dish_price.'0' }}€</span>
                                    @else
                                        <span class="price">{{ $dish->dish_price.',00' }}€</span>
                                    @endif 
                                    <div class="btn-action">
                                        <a href="{{ route('dish.edit',$dish->id ?? "") }}" class="btn btn-warning btn-sm">
                                            Modifier
                                        </a>
                                        <form action="{{ route('item.delete',["id" => $dish->id ?? "","keep_or_delete" => 1,"item" => 'Dish']) }}" method="post" class="d-inline">@csrf
                                            <button type="submit" class="card-link btn btn-danger btn-sm">{{ __('Supprimer') }}</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    @endforeach
                </article>
                <hr>
                <article class="row col-lg-12" id="boisson">
                    <h3>Les boissons</h3>
                    @foreach ($drink_types as $type)
                        <h3 class="mt-5">{{ $type->type }}</h3>
                        <ul>
                            @foreach ($drinks as $drink)
                                @if ($drink->fk_drink_type_id === $type->id)
                                <li class="col-lg-3 col-md-6 col-sm-12 mt-4">
                                    <p class="card-title mb-3">{{ $drink->drink_name }}</p>
                                    <p class="price">{{ $drink->drink_price .'€'}}</p>
                                    <span class="d-flex">
                                        <a href="{{ route('drink.edit',$drink->id ?? "") }}" class="btn btn-warning btn-sm">
                                            {{ __('Modifier') }}
                                        </a>
                                        <form action="{{ route('item.delete',["id" => $drink->id ?? "","keep_or_delete" => 1,"item" => "Drink"]) }}" method="post" class="d-inline">@csrf
                                            <button type="submit" class="card-link btn btn-danger btn-sm">
                                                {{ __('Supprimer') }}
                                            </button>
                                        </form>
                                    </span>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    @endforeach
                </article>
                <hr>
                <article class="row col-md-12 col-lg-12" id="dessert">
                    <h2>Liste des desserts au menu</h2>
                    <ul class="list-group ">
                        @foreach ($desserts as $dessert )
                            <li class="col-lg-4 col-md-6 col-sm-12 mt-4 ">
                                <p class="card-title">{{ $dessert->dessert_name }}</p>
                                <p class="price">{{ $dessert->dessert_price .'€'}}</p>
                                <span class="d-flex">
                                    <a href="{{ route('dessert.edit',$dessert->id ?? "") }}" class="btn btn-warning btn-sm">
                                        {{ __('Modifier') }}
                                    </a>
                                    <form action="{{ route('item.delete',["id" => $dessert->id ?? "","keep_or_delete" => 1,"item" => "Dessert"]) }}" method="post" class="d-inline">@csrf
                                        <button type="submit" class="card-link btn btn-danger btn-sm">
                                            {{ __('Supprimer') }}
                                        </button>
                                    </form>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </article>
            </article>
            <hr>
        </x-layout>
    </section>
</main>
@endsection