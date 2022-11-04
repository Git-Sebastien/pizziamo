<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use App\Models\Pizza;
use App\Models\Category;
use App\Models\DrinkType;

class HomeController extends Controller
{
    public function index()
    { 
        $pizzas = Pizza::with(['ingredients'])->where('is_deleted','=',0)->get();
        $categories = Category::all();
        $drinks = Drink::all();
        $drink_types = DrinkType::all();
        return view('home.index',compact('pizzas','categories','drinks','drink_types'));
    }
}
