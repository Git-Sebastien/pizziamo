@extends('layouts.dashboard')

@section('title','Modifier une boisson')

@section('edit-drink')
<section class="row main-content">
    <x-layout>
        <article class="col-sm-8 pizzas">   
            <h1>Modifier une boisson</h1>
            <form action="{{ route('drink.update',$drink->id) }}" method="post" class="form-dashboard">
                @csrf
                <label for="name">Nom de la boisson</label>
                <input type="text" name="drink_name" id="" value="{{ $drink->drink_name }}">
                <label for="volume">Volume</label>
                <select name="drink_volume" id="">
                    <option value="{{ $drink->drink_volume }}">{{ $drink->drink_volume }}</option>
                    <option value="50cl">50cl</option>
                    <option value="75cl">75cl</option>
                    <option value="1l">1l</option>
                    <option value="1,5l">1,5l</option>
                </select>
                <label for="name">Prix</label>
                <input type="text" name="drink_price" id="" value="{{ $drink->drink_price }}"> €
                <button type="submit" class="btn btn-success">Valider les modifications</button>
            </form>
            <hr>
        </article>
    </x-layout>
</section>
@endsection