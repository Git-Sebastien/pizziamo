<aside class="col-sm-4" id="aside">
    <h3 class="text-decoration-underline"><a href="{{ route('dashboard.index') }}">Tableau de bord</a></h3>
    <nav class="main-nav" id="main-nav">
        <h3>Utilisateur</h3>
        <span><b>{{ Str::ucfirst(Auth::user()->identifiant) }}</b></span>
        @if (Auth::check())
        <form action="{{ route('logout') }}" method="post" class="d-inline">
            @csrf-<button type="submit" class="btn btn-sm text-danger">Deconnection</button>
        </form>
        @endif
        <a href="{{ route('register') }}" class="d-block">Créer un nouvel utilisateur</a>
        <ul>
            <h3>Pizza</h3>
            <li><a href="{{ route('pizza.add') }}">Ajouter une pizza</a></li>
            <li><a href="{{ route('ajouter.ingredient') }}">Ajouter un ingredient</a></li>
            <li><a href="{{ route('ingredients.delete-permanently') }}">Suprimer un ingrédient</a></li>
            <li> <a href="{{ route('item.deleted') }}">Les éléments non disponible</a></li>
        </ul>
        <ul>
            <h3>Dessert</h3>
            <li><a href="{{ route('ajouter.dessert') }}">{{ __('Ajouter un dessert') }}</a></li>
        </ul>
        <ul>
            <h3>Boissons</h3>
            <li><a href="{{ route('ajouter.drink') }}">Ajouter une boisson</a></li>
        </ul>
        <ul>
            <h3>Plats maisons</h3>
            <li><a href="{{ route('ajouter.dish') }}">Ajouter un plat</a></li>
        </ul>
        <h3>Allez a</h3>
        <ul class="nav-dashboard">
            <li><a href="#pizzas">Pizza</a></li>
            <li><a href="#plats-maisons">Plat maison</a></li>
            <li><a href="#boisson">Boissons</a></li>
            <li><a href="#dessert">Dessert</a></li>
        </ul>
    </nav>
</aside>