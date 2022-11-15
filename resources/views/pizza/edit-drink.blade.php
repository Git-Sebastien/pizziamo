@extends('layouts.dashboard')


@section('title','Edite une boisson')
@section('edit-drink')
    <form action="{{ route('drink.update',$drink->id) }}" method="post">
        @csrf
        <label for="name">Nom de la boisson</label>
        <input type="text" name="drink_name" id="" value="{{ $drink->drink_name }}">
        <label for="name">Prix</label>
        <input type="text" name="drink_price" id="" value="{{ $drink->drink_price }}">
        <label for="name">Volume</label>
        <input type="text" name="drink_volume" id="" value="{{ $drink->drink_volume }}">
        <button type="submit">Valider les modifications</button>
    </form>      
@endsection