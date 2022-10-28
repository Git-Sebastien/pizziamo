@extends('layouts.dashboard')

@section('edit-pizza')

    @foreach($pizza_ingredients as $pizza_info)
        @if ($pizza_info->id == $pizza->id )
        @php $pizza_id = isset($pizza->id) ? $pizza->id : "" @endphp
            <h1>{{ $pizza_info->pizza_name }}</h1>
            <p class="d-inline">Prix : </p><input type="text" name="pizza_price" id="" value="{{ $pizza_info->pizza_price }}">
            <ul class="list-group mt-5">
                @foreach ($pizza->ingredients as $ingredient)
                    <li class="list-group-item">{{ $ingredient->ingredient_name }}<br>
                    <form action="{{ route('ingredient.delete',['id'=>$pizza->id,'ingredient'=> $ingredient->pivot->ingredient_id ]) }}" method="post" class="d-inline">@csrf  
                    <button type="submit" class="card-link btn btn-danger btn-sm d-inline">{{ __('Supprimer') }}</button>
                </form></li>
                @endforeach
            </ul>
        @endif
        <input type="hidden" name="{{ $pizza->id }}">
    @endforeach
            
    <form action="{{ route('ingredient.add') }}" method="post"><br><br><br><br>
        @csrf
        <label for="pizza-name" class="text-center"><strong>Ajouter un ingredient</strong></label><br><br><br><br>
        <div class="wrapper ingredient-list">
            @foreach ($ingredient_types as $ingredient_type)
            <div class="vegetable p-3 border border-dark">
                <h3>{{ $ingredient_type->ingredient_type }}</h3>
                <ul>
                    @foreach ($ingredients as $ingredient)
                    @if ($ingredient->fk_ingredient_type_id == $ingredient_type->id )
                        <input type="checkbox" name="ingredients_id[]" id="" value="{{ $ingredient->id }}"> {{ $ingredient->ingredient_name }}<br>
                        <input type="hidden" name="pizza_id" value="{{ $pizza->id }}">
                    @endif
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
        <button type="submit">Ajouter les ingrédients</button>
    </form>

    <a href="{{ route('pizza.add') }}">Retour</a>
@endsection