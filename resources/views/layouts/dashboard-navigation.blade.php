<header class="p-3 bg-info">
    <span>{{ Auth::user()->identifiant }}</span>
    @if (Auth::check())
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Deconnection</button>
        </form>
    @endif
    <div class="burger d-md-none" id="burger">
        <span></span>
    </div>
</header>