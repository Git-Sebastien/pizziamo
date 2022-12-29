<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\User;
use App\Models\Drink;
use App\Models\Pizza;
use App\Models\Dessert;
use App\Models\DrinkType;
use App\Models\Ingredient;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Traits\Utilities;
use App\Models\Category;
use App\Models\IngredientType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

    use Utilities;

    /**
     * 
     * Register the key into the session
     * @param  mixed $request
     * @param  mixed $token
     * @return void
     */

    public function index(Request $request, $token)
    {
        $users = User::get('personal_token');
        $tokens = [$token];
        $match = false;
        foreach ($users as $user) {
            $request->session()->put(['token' => $token, 'personal_token' => $user->personal_token]);
            foreach ($tokens as $key) {
                if (Hash::check($key, $user->personal_token)) {
                    $match = true;
                    break 2;
                }
            }
        }
        return redirect('login');

        if (!$match) {
            return  redirect('/');
        }
    }

    /**
     * 
     * Return view with all item on the menu
     * @param  mixed $request
     * @return void
     */
    public function dashboard(Request $request)
    {
        if (Str::contains($request->url(), 'deleted')) {
            $pizzas = $this->sortModelWithRelation(Pizza::class, 'ingredients', 1);
            $all_models_deleted = $this->sortModel(
                [
                    Category::class,
                    Drink::class,
                    DrinkType::class,
                    Dessert::class,
                    Dish::class,
                    Ingredient::class
                ],
                1
            );


            $array = $this->sortArrayOfModel($all_models_deleted);

            return view(
                'deleted.item-deleted',
                [
                    'drinks' => $array['drinks'],
                    'categories' => $array['categories'],
                    'dishs' => $array['dishes'],
                    'desserts' => $array['desserts'],
                    'drink_types' => $array['drinkTypes'],
                    'ingredients' => $array['ingredients']
                ],
                compact('pizzas')
            );
        }

        if (Str::contains($request->url(), 'dashboard')) {
            $all_models = $this->sortModel(
                [
                    Category::class,
                    Drink::class,
                    DrinkType::class,
                    Dessert::class,
                    Dish::class
                ]
            );

            $pizzas = $this->sortModelWithRelation(Pizza::class, 'ingredients');
            $array = $this->sortArrayOfModel($all_models);

            return view(
                'dashboard.index',
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

    // Method to get the view element --------------------------------------

    /**
     * 
     * Return view with ingredient
     * @return void
     */
    public function ingredient(): View
    {
        $ingredient_types =  IngredientType::all();
        return view('pizza.add-ingredient', compact('ingredient_types'));
    }

    /**
     * desserts
     *
     * @return void
     */
    public function desserts(): View
    {
        return  view('desserts.add-dessert');
    }

    /**
     * drinks
     *
     * @return void
     */
    public function drinks(): View
    {
        $drink_types = DrinkType::all();

        return view('drinks.add-drink', compact('drink_types'));
    }

    /**
     * dish
     *
     * @return void
     */
    public function dish(): View
    {
        return view('dishs.add-dish');
    }

    // Method to add element --------------------------------------

    /**
     * addIngredient
     *
     * @param  mixed $request
     * @return void
     */
    public function addIngredient(Request $request): RedirectResponse
    {
        Ingredient::create([
            'ingredient_name' => $request->input('ingredient_name'),
            'fk_ingredient_type_id' => $request->input('ingredient_type')
        ]);

        return redirect('/dashboard')->with('update', 'L\'ingrédient ' . $request->input('ingredient_name') . ' a été ajouté avec succés');
    }

    /**
     * addDessert
     *
     * @param  mixed $request
     * @return void
     */
    public function addDessert(Request $request): RedirectResponse
    {
        $dessert = Dessert::create([
            'dessert_name' => $request->input('dessert_name'),
            'dessert_price' => (float) $request->input('dessert_price'),
            'dessert_composition' => $request->input('dessert_composition')
        ]);

        return redirect('dashboard')->with('create', 'Le dessert ' . $dessert->dessert_name . ' a été créer avec succés');
    }

    /**
     * addDrink
     *
     * @param  mixed $request
     * @return void
     */
    public function addDrink(Request $request): RedirectResponse
    {
        $drink = Drink::create([
            'drink_name' => $request->input('drink_name'),
            'drink_volume' => $request->input('drink_volume'),
            'drink_price' => $request->input('drink_price'),
            'fk_drink_type_id' => $request->input('drink_type')
        ]);

        return redirect('dashboard')->with('create', 'La boisson ' . $drink->drink_name . ' a été créer avec succés');
    }

    /**
     * addDish
     *
     * @param  mixed $request
     * @return void
     */
    public function addDish(Request $request): RedirectResponse
    {
        $dish = Dish::create([
            'dish_name' => $request->input('dish_name'),
            'dish_price' => $request->input('dish_price')
        ]);

        return redirect('dashboard')->with('create', 'Le plats ' . $dish->ddish_name . ' a été créer avec succés.');
    }


    // Method to get the view to edit element --------------------------------------

    /**
     * editDessert
     *
     * @param  mixed $id
     * @return void
     */
    public function editDessert(int $id): View
    {
        $desserts = Dessert::findOrFail($id);
        return view('desserts.update-desserts', compact('desserts'));
    }


    /**
     * editDrink
     *
     * @param  mixed $id
     * @return void
     */
    public function editDrink(int $id): View
    {
        $drink = Drink::findOrFail($id);
        $drink_categories = DrinkType::all();
        return view('drinks.update-drink', compact('drink', 'drink_categories'));
    }

    /**
     * editDish
     *
     * @param  mixed $id
     * @return void
     */
    public function editDish(int $id): View
    {
        $dish = Dish::findOrFail($id);
        return view('dishs.update-dish', compact('dish'));
    }

    // Method to update element --------------------------------------

    /**
     * updateDrink
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return void
     */
    public function updateDrink(int $id, Request $request): RedirectResponse
    {
        $drink = Drink::findOrFail($id);
        $drink->drink_name = $request->input('drink_name');
        $drink->drink_price = (float) $request->input('drink_price');
        $drink->drink_volume = $request->input('drink_volume');
        $drink->save();
        return redirect('dashboard')->with('update', 'La boisson ' . $drink->drink_name . ' a été mis a jour avec succés');
    }

    /**
     * updateDessert
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return void
     */
    public function updateDessert(int $id, Request $request): RedirectResponse
    {
        $desserts = Dessert::findOrFail($id);
        $desserts->dessert_name = $request->input('dessert_name');
        $desserts->dessert_composition = $request->input('dessert_composition');
        $desserts->dessert_price = (float) $request->input('dessert_price');
        $desserts->save();

        return redirect('dashboard')->with('update', 'Le dessert ' . $desserts->dessert_name . ' a été mis a jour avec succés');
    }

    /**
     * updateDish
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return void
     */
    public function updateDish(int $id, Request $request): RedirectResponse
    {
        $dish = Dish::findOrFail($id);
        $dish->dish_name = $request->input('dish_name');
        $dish->dish_price = (float) $request->input('dish_price');
        $dish->save();

        return redirect('dashboard')->with('update', 'Le plat ' . $dish->dish_name . ' a été modifié avec succés.');
    }

    // Method to delete element --------------------------------------

    /**
     * deletePermanently
     *
     * @param  mixed $id
     * @return void
     */

    public function deleteIngredient(): View
    {
        $all_models = $this->sortModel(
            [
                Ingredient::class,
                IngredientType::class
            ]
        );

        $array = $this->sortArrayOfModel($all_models);
        return view(
            'pizza.delete-ingredient',
            [
                'ingredients' => $array['ingredients'],
                'ingredient_types' => $array['ingredientTypes']
            ]
        );
    }

    /**
     * deletePermanently
     *
     * @param  mixed $id
     * @param  mixed $table
     * @return RedirectResponse
     */
    public function deletePermanently(int $id, string $table): RedirectResponse
    {
        $table_to_singular = Str::singular($table);
        $format_table_name = $table_to_singular . '_' . 'name';
        $item_name = DB::table($table)->select($format_table_name)->where('id', '=', $id)->get();
        $deleted = DB::table($table)->select('$format_table_name')->where('id', '=', $id)->delete();
        return redirect('dashboard')->with('delete', '' . $item_name[0]->$format_table_name . ' a été supprimer définitivement avec succés');
    }

    /**
     * deleteItem
     *
     * @param  mixed $id
     * @param  mixed $keep_or_delete
     * @param  mixed $model
     * @return void
     */
    public function deleteItem(int $id, int $keep_or_delete, ?string $model): RedirectResponse
    {
        $space = "\\App\\Models\\$model";
        $model_name_format = Str::lcfirst($model);
        $value = $model_name_format . '_' . 'name';
        $model_to_delete = $space::findOrFail($id);
        $model_to_delete->is_deleted = $keep_or_delete;
        $model_to_delete->save();

        if ($keep_or_delete == 0) {
            return redirect('/dashboard')->with('delete', $model_to_delete->$value . ' a été rajouté au menu avec succés');
        }

        return redirect('dashboard')->with('delete', $model_to_delete->$value . ' a été supprimé avec succés');
    }

    // public function pizzas(Request $request)
    // {
    //     $ingredient_fetch = $request->ingredient;

    //     $ingredient = DB::table('ingredients')->where('ingredient_name','LIKE','%'.$ingredient_fetch.'%')->distinct()->get();
    //     echo \json_encode($ingredient);
    // }
}