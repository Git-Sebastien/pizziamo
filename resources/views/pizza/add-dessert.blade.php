@extends('layouts.dashboard')

@section('title','Ajouter un dessert')
    
@section('add-dessert')

<form action="{{ route('dessert.add') }}" method="post">
    @csrf
    <label for="dessert_name">Nom du dessert</label><br>
    <input type="text" name="dessert_name" id=""><br>
    <label for="dessert_name">Composition</label><br>
    <textarea name="dessert_composition" id=""></textarea><br>
    <label for="dessert_name">Prix</label><br>
    <input type="text" name="dessert_price" id=""><br>  
    <button type="submit" class="btn btn-success">Ajouter</button>
</form>
    
@endsection