<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Drink;
use App\Models\Pizza;
use App\Models\Dessert;
use App\Models\DrinkType;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Http\Traits\Utilities;
use App\Models\IngredientType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    use Utilities;
    public function dashboard()
    {
        $categories = DB::table('categories')
        ->select()
        ->get();
        $all_pizza = DB::table('pizzas')
        ->select('id')
        ->get();
        $ingredient_types = IngredientType::all();
        $ingredients = Ingredient::all();
        $drinks = Drink::all();
        $drink_types = DrinkType::all();
        $desserts = Dessert::all();
        $pizzas = Pizza::with(['ingredients'])->where('is_deleted','=',0)->get();

   
        return view('dashboard.index',compact('categories','ingredient_types','ingredients','pizzas','drinks','drink_types','desserts'));
    }

    public function ingredient()
    {
        $ingredient_types =  IngredientType::all();
        return view('pizza.add-ingredient',compact('ingredient_types'));
    }

    public function addIngredient(Request $request)
    {
        Ingredient::create([
            'ingredient_name' => $request->input('ingredient_name'),
            'fk_ingredient_type_id' => $request->input('ingredient_type')
        ]);
    }

    public function desserts()
    {
        return  view('pizza.add-dessert');
    }

    public function addDessert(Request $request)
    {
        Dessert::create([
            'dessert_name' => $request->input('dessert_name'),
            'dessert_price' => (float) $request->input('dessert_price'),
            'dessert_composition' => $request->input('dessert_composition')
        ]);
    }

    public function drinks()
    {
        $drink_types = DrinkType::all();

        return view('pizza.add-drink',compact('drink_types'));
    }

    public function addDrink()
    {
        Drink::create([
            'drink_name',
            'drink_volume',
            'fk_drink_type_id'
        ]);
    }

    public function editDrink($id)
    {
        $drink = Drink::findOrFail($id);
        return view('pizza.edit-drink',compact('drink'));
    }

    public function updateDrink($id,Request $request)
    {
        $drink = Drink::findOrFail($id);

    }
}
