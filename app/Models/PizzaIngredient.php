<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PizzaIngredient extends Pivot
{
    use HasFactory;
    protected $table = 'pizza_ingredients';

    protected $fillable = [
        'pizza_id',
        'ingredient_id'
    ];

    public $timestamps = false;
}
