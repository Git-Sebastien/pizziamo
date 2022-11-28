<span class="mt-2 fade" id="pizza">Nos pizzas</span>
<section class="menu">
    @foreach ($categories as $category) 
    <h4 class="text-center title-category fade" id="pizza-{{Str::substr($category->category_name,4,8) }}">{{ $category->category_name }}</h4>
    <article class="pizza-{{Str::substr($category->category_name,4,8) }}">
        <ul>
            @foreach ($pizzas as $pizza)
                @if ($pizza->fk_category_id === $category->id)
                <li class="fade from-top" id="pizza-list">
                   <p id="pizza-title" class="card-title">{{ $pizza->pizza_name }} <i></i></p> <span class="price">{{ $pizza->pizza_price.',00' }}€</span>
                   <p class="ingredient-details">
                        @foreach ($pizza->ingredients as $ingredient)
                           {{ $ingredient->ingredient_name }},
                        @endforeach
                    </p>
                </li>
                @endif
            @endforeach
        </ul>
    </article>
    @endforeach
    <span id="desserts" class="fade">Nos desserts</span>
    <article class="desserts">
        <ul>
        @foreach ($desserts as $dessert)
            <li class="fade from-top" id="pizza-list">
                <p id="pizza-title" class="card-title">{{ $dessert->dessert_name }} <i></i></p>
                @if (Str::length($dessert->dessert_price) > 2)
                    <span class="price">{{ $dessert->dessert_price.'0' }}€</span>  
                @else
                    <span class="price">{{ $dessert->dessert_price.',00' }}€</span>
                @endif 
                <p class="ingredient-details">
                    {{ $dessert->dessert_composition }}
                </p>
            </li>
            @endforeach
        </ul>
    </article>
    <span id="boissons" class="fade from-left">Nos boissons</span>
    <article class="boissons" >
        @foreach ($drink_types as $drink_type)
        <h4 class="text-center title-category  fade from-right">{{ $drink_type->type }}</h4>
            <ul>
                @foreach ($drinks as $drink)
                    @if ($drink->fk_drink_type_id === $drink_type->id)
                    <li class="fade from-top">
                       <p class="card-title">{{ $drink->drink_name }}  {{ $drink->drink_volume }}</p>
                        @if (Str::length($drink->drink_price) > 2)
                            <span class="price-drink">{{ $drink->drink_price.'0' }}€</span>  
                        @else
                        <span class="price-drink">{{ $drink->drink_price.',00' }}€</span>
                        @endif 
                        </li>
                    @endif
                @endforeach
            </ul>
        @endforeach
    </article>
</section>