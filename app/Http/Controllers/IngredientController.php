<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngredientController extends Controller
{
    public function fetchData(Request $request)
    {
        $ingredient_name = $request->ingredient_name;

        $ingre = DB::table('ingredients')
        ->where('ingredient_name','like','%'.$ingredient_name.'%')
        ->select('ingredient_name','ingredients.id')
        ->get();
        echo json_encode($ingre);
    }
}
