<?php

namespace App\Http\Controllers;

use App\Http\Traits\Utilities;
use App\Models\Dish;
use App\Models\Drink;
use App\Models\Pizza;
use App\Models\Dessert;
use App\Models\Category;
use App\Models\DrinkType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use Utilities;

    public function index(Request $request): View
    {
        if ($request->session()->has('personal_token')) {
            $request->session()->pull('personal_token');
            $request->session()->pull('token');
        }
        $pizzas = $this->sortModelWithRelation(Pizza::class, 'ingredients');

        $all_models = $this->sortModel(
            [
                Category::class,
                Drink::class,
                DrinkType::class,
                Dessert::class,
                Dish::class
            ]
        );

        $array = $this->sortArrayOfModel($all_models);

        return view(
            'home.index',
            [
                'categories' => $array['categories'],
                'drinks' => $array['drinks'],
                'dishs' => $array['dishes'],
                'desserts' => $array['desserts'],
                'drink_types' => $array['drinkTypes'],
            ],
            compact('pizzas')
        );
    }
}