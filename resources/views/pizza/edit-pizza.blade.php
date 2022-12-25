@extends('layouts.dashboard')

@section('edit-pizza')
@if (session()->has('delete'))
    <div class="alert alert-success">
        {{ session('delete') }}
    </div>    
@endif
<section class="row main-content">
    <x-layout>
        <article class="col-sm-8 pizzas">
            @foreach($pizza_ingredients as $pizza_info)
            @if ($pizza_info->id == $pizza->id )
            @php $pizza_id = isset($pizza->id) ? $pizza->id : "" @endphp
            <h1>{{ $pizza_info->pizza_name }}</h1>
            <ul class="list-group mt-5 d-block">
                <form action="{{ route('edit.pizza',['id'=>$pizza->id]) }}" method="post">
                    @csrf
                    <p class="d-inline">Prix : </p>
                    <input type="text" name="pizza_price" id="" class="mb-4" value="{{ $pizza_info->pizza_price }}"> €
                    <button class="btn btn-primary">Changer le prix</button>
                </form>
                @foreach ($pizza->ingredients as $ingredient)
                <li class="list-group-item mb-3">{{ $ingredient->ingredient_name }}
                    <form action="{{ route('ingredient.delete',['id'=>$pizza->id,'ingredient'=> $ingredient->pivot->ingredient_id ]) }}" method="post" class="d-inline">@csrf
                        <button type="submit" class="card-link btn btn-danger btn-sm d-inline">{{ __('Supprimer') }}</button>
                    </form>
                </li>
                @endforeach
            </ul>
            @endif
            <input type="hidden" name="{{ $pizza->id }}">
            @endforeach
            <form action="{{ route('edit.pizza',$pizza->id) }} " method="post">
                @csrf
                <label for="pizza-name" class="text-center"><strong>Ajouter un ingredient</strong></label>
                <div class="wrapper ingredient-list">
                    @foreach ($ingredient_types as $ingredient_type)
                        <div class="vegetable p-3 border border-dark">
                            <h3>{{ $ingredient_type->ingredient_type }}</h3>
                            <ul class="d-block">
                                @foreach ($ingredients as $ingredient)
                                    @if ($ingredient->fk_ingredient_type_id == $ingredient_type->id )
                                    <li class="list-group-item list-checkbox">
                                        <input type="checkbox" name="ingredients_id[]" id="" value="{{ $ingredient->id }}"> {{ $ingredient->ingredient_name }}
                                        <input type="hidden" name="pizza_id" value="{{ $pizza->id }}">
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-success btn-sm">Ajouter les ingrédients</button>
            </form>

            <a href="{{ route('pizza.add') }}">Retour</a>
        </article>
    </x-layout>
</section>
@endsection