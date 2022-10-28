@extends('layouts.dashboard')

@section('title','Ajouter une boisson')

@section('add-drink')

<form action="{{ route('drink.add') }}" method="post">
<label for="drink_name">Nom de la boisson</label><br>
<input type="text" name="drink_name" id=""><br>
<label for="volume">Contenance</label><br>
<select name="drink_volume" id=""><br>
    <option value="33cl">33cl</option>
    <option value="50cl">50cl</option>
    <option value="75cl">75cl</option>
    <option value="1l">1l</option>
    <option value="1,5l">1,5l</option>
</select><br>
<label for="drink_type">Type de boisson</label><br>
<select name="drink_type" id=""><br>
    <option value="">Choisir un type</option>
    @foreach ($drink_types as $drink_type)
    <option value="{{ $drink_type->id }}">{{ $drink_type->type }}</option>        
    @endforeach
    <option value=""></option>
</select><br>
<label for="price">Prix : </label><br>
<input type="text" name="drink_price" id="">
</form>
    
@endsection

