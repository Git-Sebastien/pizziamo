<?php

namespace App\Http\Controllers\Pizza;

use App\Models\Pizza;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Models\IngredientType;
use App\Models\PizzaIngredient;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Traits\Utilities;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PizzaController extends Controller
{
    use Utilities;
    public $pizza;

    /**
     * addPizza
     *
     * @return void
     */
    public function pizzas()
    {
        $all_models = $this->sortModel(
            [
                Ingredient::class,
                IngredientType::class,
                Category::class
            ]
        );

        $array = $this->sortArrayOfModel($all_models);
        $pizzas = $this->sortModelWithRelation(Pizza::class, 'ingredients');

        return view(
            'pizza.add-pizza',
            [
                'ingredient_types' => $array['ingredientTypes'],
                'ingredients' => $array['ingredients'],
                'categories' => $array['categories'],
            ],
            compact('pizzas')
        );
    }

    /**
     * createPizzaWithCheckbox
     *
     * @param  mixed $request
     * @return void
     */
    public function createPizzaWithCheckbox(Request $request): RedirectResponse
    {
        $new_pizza = Pizza::create([
            'pizza_name' => $request->input('pizza-name'),
            'pizza_price' =>  (float) $request->input('pizza-price'),
            'fk_category_id' => (int) $request->input('category-name')
        ]);

        foreach ($request->input('ingredients') as $ingredient) {
            PizzaIngredient::create([
                'pizza_id' =>  $new_pizza->id,
                'ingredient_id' => $ingredient
            ]);
        }

        return redirect('/dashboard')->with('create', 'La pizza ' . $request->input('pizza-name') . ' a été crée avec succés');
    }


    /**
     * editPizza
     * 
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function editPizza(Request $request, int $id): View
    {
        $pizza = Pizza::find($id);
        $all_models = $this->sortModel(
            [
                Category::class,
                Ingredient::class,
                IngredientType::class
            ]
        );

        $array = $this->sortArrayOfModel($all_models);

        $pizza_ingredients = $this->sortModelWithRelation(Pizza::class, 'ingredients');

        return view(
            'pizza.edit-pizza',
            [
                'ingredient_types' => $array['ingredientTypes'],
                'ingredients' => $array['ingredients'],
                'categories' => $array['categories'],
            ],
            compact('pizza', 'pizza_ingredients')
        );
    }

    /**
     * deleteIngredient
     * Delete ingredient
     * @param  mixed $id
     * @param  mixed $ingredient
     * @return void
     */
    public function deleteIngredient(int $id, int $ingredient): RedirectResponse
    {
        DB::table('pizza_ingredients')
            ->where('pizza_id', '=', $id)
            ->where('ingredient_id', '=', $ingredient)
            ->delete();

        return back()->with('delete', 'L\'ingredient a été supprimé avec succés');
    }

    /**
     * pizzaEdit
     * Edit the pizza
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function pizzaEdit(Request $request, int $id): RedirectResponse
    {
        $pizza_price = Pizza::find($id);;
        $request->input('pizza_price');
        if ($request->input('pizza_price')) {
            $old_price = $pizza_price->pizza_price;
            $pizza_price->pizza_price = $request->input('pizza_price');
            $pizza_price->save();

            redirect('/dashboard')->with('update', 'Le prix de la pizza ' . $pizza_price->pizza_name . ' a bien été changé de ' . $old_price . '€ à ' . $pizza_price->pizza_price . '€');
        }
        if ($request->input('ingredients_id')) {
            foreach ($request->input('ingredients_id') as $ingredient_id) {
                PizzaIngredient::create([
                    'pizza_id' => $request->input('pizza_id'),
                    'ingredient_id' => $ingredient_id
                ]);
            }

            return redirect('/dashboard')->with('update', 'Les nouveaux ingrédients on bien été rajouté sur la pizza ' . $pizza_price->pizza_name . '.');
        }
        return redirect('/dashboard');
    }
}