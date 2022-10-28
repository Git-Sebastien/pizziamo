<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DessertIngredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'dessert_ingredient_name',
        'fk_dessert_id'
    ];
}
