<?php

namespace App\Models;

use App\Models\IngredientType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'ingredient_name',
        'fk_ingredient_type_id',
        'updated_at',
        'created_at'
    ];

    public $timestamps = false;

    public function ingredientType()
    {
        return $this->belongsToMany(IngredientType::class);
    }

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class,'pizza_ingredients');
    }
    
}
