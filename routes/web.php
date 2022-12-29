<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\Pizza\PizzaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('cookie-consent')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
});

Route::get('/mention-legales', function () {
    return view('home.mentions');
})->name('mentions');


Route::middleware('token.validator')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');

    // Route::post('/pizzas', [DashboardController::class, 'pizzas']);  Test fetch

    //Get routes ----------------------------------------

    Route::get('/deleted', [DashboardController::class, 'dashboard'])->name('item.deleted');

    Route::get('/effacer-ingredients', [DashboardController::class, 'deleteIngredient'])->name('ingredients.delete-permanently');

    Route::get('/ajouter-pizza', [PizzaController::class, 'pizzas'])->name('pizza.add');

    Route::get('/ajouter-dessert', [DashboardController::class, 'desserts'])->name('ajouter.dessert');

    Route::get('editer-plats/{id}', [DashboardController::class, 'editDish'])->name('dish.edit');

    Route::get('/ajouter-ingredient', [DashboardController::class, 'ingredient'])->name('ajouter.ingredient');

    Route::get('/editer-pizza/{id}', [PizzaController::class, 'editPizza'])->name('pizza.edit');

    Route::get('/ajouter-boison', [DashboardController::class, 'drinks'])->name('ajouter.drink');

    Route::get('editer-boisson/{id}', [DashboardController::class, 'editDrink'])->name('drink.edit');

    Route::get('/ajouter-plats', [DashboardController::class, 'dish'])->name('ajouter.dish');

    Route::get('/edit-dessert/{id}', [DashboardController::class, 'editDessert'])->name('dessert.edit');

    // Post routes ----------------------------------------

    Route::post('/pizza-create-with-checkbox', [PizzaController::class, 'createPizzaWithCheckbox'])->name('pizza.create-checkbox');

    Route::post('/update-drink/{id}', [DashboardController::class, 'updateDrink'])->name('drink.update');

    Route::post('/ajouter-plats', [DashboardController::class, 'addDish'])->name('dish.add');

    Route::post('/add-drink', [DashboardController::class, 'addDrink'])->name('drink.add');

    Route::post('/add-dessert', [DashboardController::class, 'addDessert'])->name('dessert.add');

    Route::post('delete-ingredient/{id}/{table}', [DashboardController::class, 'deletePermanently'])->name('ingredient.delete-permanently');

    Route::post('/editer-plats/{id}', [DashboardController::class, 'updateDish'])->name('dish.update');

    Route::post('/add-ingredient', [DashboardController::class, 'addIngredient'])->name('ingredient.add');

    Route::post('/pizza-add/{id}/{table}', [DashboardController::class, 'deletePermanently'])->name('pizza.delete-permanently');

    Route::post('/pizza-create', [PizzaController::class, 'createPizza'])->name('pizza.create');

    Route::post('/delete-ingredient/{id}/{ingredient}', [PizzaController::class, 'deleteIngredient'])->name('ingredient.delete');

    Route::post('/update-dessert/{id}', [DashboardController::class, 'updateDessert'])->name('dessert.update');

    Route::post('/add-ingredient/{id}', [PizzaController::class, 'pizzaEdit'])->name('edit.pizza');
});

Route::get('administration/{token}', [DashboardController::class, 'index'])->name('dashboard.app');

// Match routes ----------------------------------------

// Route::match(['post', 'get'], '/fetch-data', [IngredientController::class, 'fetchData'])->name('ingredient.fetch');

Route::match(['post', 'get'], '/delete-item/{id}/{keep_or_delete}/{item}', [DashboardController::class, 'deleteItem'])->name('item.delete');

Route::match(['post', 'get'], '/delete-permanently/{id}/{table}', [DashboardController::class, 'deletePermanently'])->name('deletePermanently');



require __DIR__ . '/auth.php';