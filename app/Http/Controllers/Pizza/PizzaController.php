<?php

namespace App\Http\Controllers\Pizza;

use App\Models\Pizza;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Models\IngredientType;
use App\Models\PizzaIngredient;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PizzaController extends Controller
{

    public $pizza;

    public function addPizza()
    {
        $categories = DB::table('categories')
        ->select()
        ->get();
        $all_pizza = DB::table('pizzas')
        ->select('id')
        ->get();
        $ingredient_types = IngredientType::all();
        $ingredients = Ingredient::all();

        $pizzas = Pizza::with(['ingredients'])->where('is_deleted','=',0)->get();
   
        return view('pizza.add-pizza',compact('categories','ingredient_types','ingredients','pizzas'));
    }
       

    public function createPizza(Request $request)
    {
        $price = $request->input('pizza-price');
        Pizza::create([
            'pizza_name' => $request->input('pizza-name'),
            'pizza_price' =>  (float) $price,
            'pizza_composition' => $request->input('composition'),
            'fk_category_id' => (int) $request->input('category-name')
        ]);

       return redirect('/');
    }

    public function createPizzaWithCheckbox(Request $request)
    {
        $new_pizza = Pizza::create([
            'pizza_name' => $request->input('pizza-name'),
            'pizza_price' =>  (float) $request->input('pizza-price'),
            'fk_category_id' => (int) $request->input('category-name')
        ]);

        foreach($request->input('ingredients') as $ingredient){
            PizzaIngredient::create([
                'pizza_id' =>  $new_pizza->id,
                'ingredient_id'=> $ingredient
            ]);
        }

        return redirect($request->session()->previousUrl());

    }

    public function deletePizza($id, Request $request)
    {
        $pizza = Pizza::find($id);
        $pizza->is_deleted = 1;
        $pizza->save();

        return redirect($request->session()->previousUrl());
    }

    public function editPizza(Request $request,$id)
    {
        $pizza = Pizza::find($id);
        $pizza_ingredients = Pizza::with(['ingredients'])->get();
        $categories = DB::table('categories')
        ->select()
        ->get();
        $all_pizza = DB::table('pizzas')
        ->select('id')
        ->get();
        $ingredient_types = IngredientType::all();
        $ingredients = Ingredient::all();

        $pizzas = Pizza::with(['ingredients'])->get();

        return view('pizza.edit-pizza',compact('pizza','pizza_ingredients','categories','ingredient_types','ingredients'));
    }

    public function deleteIngredient(Request $request,$id,$ingredient)
    { 
            DB::table('pizza_ingredients')
            ->where('pizza_id','=',$id)
            ->where('ingredient_id','=',$ingredient)
            ->delete();
       

       return redirect($request->session()->previousUrl());
    }

    public function addIngredient(Request $request)
    {
        foreach($request->input('ingredients_id') as $ingredient_id)
        PizzaIngredient::create([
            'pizza_id' => $request->input('pizza_id'),
            'ingredient_id' => $ingredient_id
        ]);

        return redirect($request->session()->previousUrl());
    }

   
}
