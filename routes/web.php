<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\Pizza\PizzaController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::middleware('cookie-consent')->group(function(){
    Route::get('/',[HomeController::class,'index'])->name('home.index');
});


Route::middleware('token.validator')->group(function(){
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard.index');

    Route::get('/pizzas',[DashboardController::class,'pizzas']);

    Route::get('/ajouter-pizza',[PizzaController::class,'addPizza'])->name('pizza.add');

    Route::get('/ajouter-dessert',[DashboardController::class,'desserts'])->name('ajouter.dessert');

    Route::post('/pizza-create',[PizzaController::class,'createPizza'])->name('pizza.create');

    Route::get('/ajouter-ingredient',[DashboardController::class,'ingredient'])->name('ajouter.ingredient');

    Route::get('/edit-pizza/{id}',[PIzzaController::class,'editPizza'])->name('pizza.edit');

    Route::get('/ajouter-boison',[DashboardController::class,'drinks'])->name('ajouter.drink');

    Route::get('edit-drink/{id}',[DashboardController::class,'editDrink'])->name('drink.edit');

    Route::post('/update-drink/{id}',[DashboardController::class,'updateDrink'])->name('drink.update');

    Route::post('/pizza-create-with-checkbox',[PizzaController::class,'createPizzaWithCheckbox'])->name('pizza.create-checkbox');
    
    Route::post('/add-drink',[DashboardController::class,'addDrink'])->name('drink.add');

    Route::post('/add-dessert',[DashboardController::class,'addDessert'])->name('dessert.add');

    Route::post('/add-ingredient',[DashboardController::class,'addIngredient'])->name('ingredient.add');

    Route::post('/delete-pizza/{id}',[PizzaController::class,'deletePizza'])->name('pizza.delete');

    Route::post('/delete-ingredient/{id}/{ingredient}',[PIzzaController::class,'deleteIngredient'])->name('ingredient.delete');

    Route::match(['post','get'],'/fetch-data',[IngredientController::class,'fetchData'])->name('ingredient.fetch');

    Route::post('/add-ingredient',[PizzaController::class,'addIngredient'])->name('ingredient.add');

});

Route::get('administration/{token}',[DashboardController::class,'index'])->name('dashboard.app');

require __DIR__.'/auth.php';