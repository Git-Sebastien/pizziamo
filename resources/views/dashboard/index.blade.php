@extends('layouts.dashboard')

@section('title','Administration')

@section('dashboard')
    
<div class="row p-2 dashboard">
    <h2>Liste des pizzas au menu</h2>
    <nav class="main-nav col-3">
        <ul class="list-group mt-4">
            <h2>Pizza</h2>
            <li class="list-group-item"><a href="{{ route('pizza.add') }}">Ajouter une pizza</a></li>
            <li class="list-group-item"><a href="{{ route('ajouter.ingredient') }}">Ajouter un ingredient</a></li>
            <li class="list-group-item">Les pizzas non disponible</li>
        </ul>
        <ul class="list-group">
            <h2>Dessert</h2>
            <li class="list-group-item"><a href="{{ route('ajouter.dessert') }}">{{ __('Ajouter un dessert') }}</a></li>
        </ul>
        <ul class="list-group">
            <h2>Boissons</h2>
            <li class="list-group-item"><a href="{{ route('ajouter.drink') }}">Ajouter une boisson</a></li>
        </ul>
    </nav>
   
    <section id="recap_all" class="col-md-4 p-3 recap-all">
        <article class="pizza-recap col-sm-12 col-md-12 col-lg-5 p-2">
             <div class="blanches">
                    <h2 class="mb-5">Les blanches</h2>
                    <ul class="list-group">
                        @foreach ($pizzas as $pizza)
                            @if ($pizza->fk_category_id == 1)
                                <li class="list-group-item">
                                    <h5 class="mb-3">{{ $pizza->pizza_name }}</h5>
                                    <span class="d-flex justify-content-end">
                                        <a href="{{ route('pizza.edit',$pizza->id ?? "") }}" class="btn btn-outline-warning btn-sm">
                                            Modifier
                                        </a>
                                        <form action="{{ route('pizza.delete',$pizza->id ?? "") }}" method="post" class="d-inline">@csrf  
                                            <button type="submit" class="card-link btn btn-outline-danger btn-sm">{{ __('Supprimer') }}</button>
                                        </form> 
                                    </span>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
        </article>
            <article class="col-sm-12 col-md-12 col-lg-5 p-2">
                <div class="tomates">
                    <h2 class="mb-5">Les tomates</h2>
                    <ul class="list-group">
                        @foreach ($pizzas as $pizza)
                            @if ($pizza->fk_category_id == 2)
                                <li class="list-group-item">
                                    <h5 class="mb-3">{{ $pizza->pizza_name }}</h5>
                                    <span class="d-flex justify-content-end">
                                        <a href="{{ route('pizza.edit',$pizza->id ?? "") }}" class="btn btn-outline-warning btn-sm">
                                            Modifier
                                        </a>
                                        <form action="{{ route('pizza.delete',$pizza->id ?? "") }}" method="post" class="d-inline">
                                            @csrf  
                                            <button type="submit" class="card-link btn btn-outline-danger btn-sm">{{ __('Supprimer') }}</button>
                                        </form> 
                                    </span>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            
                
                {{-- <ul class="list-group mt-4">
                    @foreach($pizzas as $pizza)
                    @if ($pizza->is_deleted === 0)
                        <li class="list-group-item col-md-9 mt-4">
                            <h5>{{ $pizza->pizza_name }}</h5>
                            <span class="d-flex justify-content-end">
                                <a href="{{ route('pizza.edit',$pizza->id ?? "") }}" class="btn btn-outline-warning btn-sm">Modifier
                                </a>
                                <form action="{{ route('pizza.delete',$pizza->id ?? "") }}" method="post" class="d-inline">@csrf  
                                    <button type="submit" class="card-link btn btn-outline-danger btn-sm">{{ __('Supprimer') }}</button>
                                </form> 
                            </span>
                        </li>
                    @endif
                @endforeach
                </ul> --}}
            </article>
            {{-- <article class="dessert-recap col-md-5 col-lg-5  p-2">
                <ul class="list-group mt-4">
                    <h2>Liste des desserts au menu</h2>
                    <li class="list-group-item col-md-12">Tiramisu - <span> <button class="btn btn-primary btn-sm">Modifier</button> <button class="btn btn-danger btn-sm">Supprimer</button></span></li>
                    <li class="list-group-item col-md-12">pesca - <span> <button class="btn btn-primary btn-sm">Modifier</button> <button class="btn btn-danger btn-sm">Supprimer</button></span></li>
                </ul>
            </article> --}}
        </div>
        <article class="boissons-recap col-md-12 col-lg-12  p-2 mt-2 m-auto">
            <ul class="list-group mt-4 m-auto">
                <h2>Liste des boissons au menu</h2> <br><br><br>
                @foreach ($drink_types as $type)
                    <div class="{{'drink '. Str::replace(" ","-",Str::lower($type->type)) }} col-md-5 col-lg-5 m-auto">
                        <h3 class="mt-5">{{ $type->type }}</h3>
                        @foreach ($drinks as $drink)
                            @if ($drink->fk_drink_type_id === $type->id)
                                <li class="list-group-item">
                                        <p>{{ $drink->drink_name }}</p> <br>
                                        <p>{{ $drink->drink_price .'€'}}</p>  
                                    <span class="d-flex justify-content-end">
                                        <a href="{{ route('pizza.edit',$pizza->id ?? "") }}" class="btn btn-outline-warning btn-sm">
                                            {{ __('Modifier') }}
                                        </a>
                                        <form action="{{ route('pizza.delete',$pizza->id ?? "") }}" method="post" class="d-inline">@csrf  
                                            <button type="submit" class="card-link btn btn-outline-danger btn-sm">
                                                {{ __('Supprimer') }}
                                            </button>
                                        </form>      
                                    </span> 
                                </li>           
                            @endif                        
                        @endforeach 
                    </div>         
                @endforeach
            </ul>
        </article> 
        <article class="dessert-recap col-md-5 col-lg-5  p-2 mt-2 m-auto">
            <ul class="list-group mt-4 m-auto">
                <h2>Liste des desserts au menu</h2>
                @foreach ($desserts as $dessert )
                    <li class="list-group-item">
                        <p>{{ $dessert->dessert_name }}</p>
                        <span class="d-flex justify-content-end">
                            <a href="{{ route('pizza.edit',$pizza->id ?? "") }}" class="btn btn-outline-warning btn-sm">
                                {{ __('Modifier') }}
                            </a>
                            <form action="{{ route('pizza.delete',$pizza->id ?? "") }}" method="post" class="d-inline">@csrf  
                                <button type="submit" class="card-link btn btn-outline-danger btn-sm">
                                    {{ __('Supprimer') }}
                                </button>
                            </form>      
                        </span> 
                    </li>
                @endforeach       
            </ul>
        </article>
    </section>
</div>
@endsection



{{-- TODO Demandera bini pour les ingredients si il sont différtens et surtout sur la provola --}}